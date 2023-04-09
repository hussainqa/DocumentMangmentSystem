<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\group;
use App\Models\document;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Block\Document as BlockDocument;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($EmpId,$GroupId,$type)
    {
        $Group=group::find($GroupId);
        $groups=group::where('id','=',$GroupId)->orWhere('parent_group','=',$Group->name)->orWhere('parent_group','=',$Group->parent_group)->orWhere('name','=',$Group->parent_group)->get();

        if($type=='Import')
        {


            return view('employee.Documents.Documents',['groups'=>$groups]);

        }elseif($type=='Export')
        {
            return view('employee.Documents.Documents',['groups'=>$groups]);
        }
    }
    public function index_group($EmpId,$group,$type,$documentgroup)
    {
        if($type=='Export')
        {
            //$DocumentsExported=DB::table('uploader_group AS export_table')

            // $DocumentsExported=DB::table('uploader_group AS export_table')
            // ->select('export_table.document_id','import_table.document_id')
            // ->join('receiver_group AS import_table', 'export_table.document_id', '=', 'import_table.document_id')
            // ->join('document', 'Table1.document_id', '=', 'document.id')
            // ->where('export_table.group_id', '=', $group)
            // ->where('import_table.group_id', '=', $documentgroup)
            // ->get();
            $DocumentsExported=DB::table('document')
            ->select('document.*')
            ->join('uploader_group AS export_table','document.id','=','export_table.document_id')
            ->join('receiver_group AS import_table','document.id','=','import_table.document_id')
            ->where('export_table.group_id', '=', $group)
            ->where('import_table.group_id', '=', $documentgroup)->get();

        }elseif($type=='Import')
        {
            $DocumentsExported=DB::table('document')
            ->select('document.*')
            ->join('uploader_group AS export_table','document.id','=','export_table.document_id')
            ->join('receiver_group AS import_table','document.id','=','import_table.document_id')
            ->where('export_table.group_id', '=', $documentgroup)
            ->where('import_table.group_id', '=', $group)->get();
        }


        return view('employee.Documents.DocumentsGroup',['documents'=>$DocumentsExported]);
    }
    public function index_meta($type,$meta)
    {
        $Employee=Employee::find(Auth::guard('employee')->id());
        $group=$Employee->group()->get()->first();
        $MetaModel=Meta::find($meta);
        if($type=='Export')
        {
            $documents=$group->uploader_document()->get();
            $cleaned_documents=[];
            foreach ($documents as $document)
            {
                if($document->meta()->get()->first()->id==$meta)
                {
                    $cleaned_documents[]=$document;
                }
            }
            return view('employee.Documents.DocumentsMeta',['documents'=>$cleaned_documents]);
        }elseif($type=='Import')
        {
            $documents=$group->receiver_group()->get();
            $cleaned_documents=[];
            foreach($documents as $document)
            {
                if($document->meta()->get()->first()->id==$meta)
                {
                    $cleaned_documents[]=$document;
                }
            }
            return view('employee.Documents.DocumentsMeta',['documents'=>$cleaned_documents]);
        }
        //dd($group->first()->id);

    }

    public function index_adding_documents($EmpId,$GroupId,$Type){

        //dd(request()->route('type'));
        $employee=Employee::find($EmpId);
        $Group=group::find($GroupId);
        $meta=Meta::all();
        $TagedEmployees=$Group->employee()->where('employee.id','!=',$EmpId)->get();



        $Role=DB::table('employee_group')->select('Role')->where('employee_id','=',$employee->id)->where('group_id','=',$Group->id)->get()->first()->Role;
        if($Type=='Export')
        {
            $ExportGroups=collect(group::where('id','=',$GroupId)->get())->merge(group::where('parent_group','=',$Group->name)->get());
            $ImportGroups = collect(group::where('parent_group','=',$Group->parent_group)->get())->merge(collect(group::where('name','=',$Group->parent_group)->get()))->merge(group::where('parent_group','=',$Group->name)->get());

        }elseif($Type=='Import'){

            $ExportGroups=collect(group::where('parent_group','=',$Group->parent_group)->where('name','!=',$Group->name)->get())->merge(collect(group::where('name','=',$Group->parent_group)->get()))->merge(group::where('parent_group','=',$Group->name)->get());
            $ImportGroups=collect(group::where('id','=',$GroupId)->get())->merge(group::where('parent_group','=',$Group->name)->get());;
        }



        //dd(gettype($meta));
        return view('employee.Documents.AddDocuments',[
            'TagedEmployees'=>$TagedEmployees,
            'employee'=>$employee,
            'EmployeeGroup'=>$EmpId,
            'ExportGroups'=>$ExportGroups,
            'ImportGroups'=>$ImportGroups,
            'metas'=>$meta,
            'Type'=>$Type
        ]);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->hasFile('DocumentFile'))
        {   //storing the file in public storage directory(Document)
            $DocumentPath=$request->file('DocumentFile')->store('Document','public');
            //adding the document details in the table
            //dd(!($request['TagedEmployeeIds'][0]=='0'));

            if(($request->file('attachments')!==null))
            {
                $Document=document::create([
                    'path'=>$DocumentPath,
                    'document_number'=>$request['DocumentNumber'],
                    'doc_date'=>$request['DocumentDate'],
                    'is_attachment'=>'has_attachment',

                ]);
            foreach ($request->file('attachments') as $attachment){
                $DocumentPath=$attachment->store('Document','public');
                $Document_attached=document::create([
                    'path'=>$DocumentPath,
                    'document_number'=>$request['DocumentNumber'],
                    'doc_date'=>$Document->doc_date,
                    'is_attachment'=>$Document->id,
                ]);


            }
            }else
            {
                $Document=document::create([
                    'path'=>$DocumentPath,
                    'document_number'=>$request['DocumentNumber'],
                    'doc_date'=>$request['DocumentDate'],
                    'is_attachment'=>'false',


                ]);

            }

            //adding the relations for the document
            $DocumentRelation=document::find($Document->id);
            $DocumentRelation->uploader_group()->attach($request['ExportGroupIds']);
            $DocumentRelation->receiver_group()->attach($request['ImportGroupIds']);
            if(!($request['TagedEmployeeIds'][0]==0)){
                $DocumentRelation->taged_employee()->attach($request['TagedEmployeeIds']);
            }
            $Meta = Meta::find($request['MetaId']);
            $data = [];

            for ($i = 1; $i <= 8; $i++) {
            $fieldName = "info_$i";
            if (isset($request[$fieldName])) {
                $data[$fieldName] = $request[$fieldName];
            } else {
                $data[$fieldName] = null;
            }
            }
            $Meta->document()->attach($Document->id, $data);

            return redirect()->back()->with('status', 'تم رقع المستند بنجاح');
            //return redirect()->route('MetaForm',['id'=>$request['MetaId']])->with(['id'=>$Document->id]);

           // return view('employee.Documents.AddDocumentMeta')


        }
    }
    public function showRedirect($EmpId,$GroupId,$Type,$DocumentId)
    {
        return view('employee.Documents.redirectDocument');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($EmpId,$group,$type,$documentgroup,$documentId)
    {
        $document=Document::find($documentId);
        if($document->is_attachment=='has_attachment')
        {
            $attachments=DB::table('document')->select('*')->where('is_attachment','=',$documentId)->get();
        }else
        {
            $attachments=null;
        }
        $MetaData=$document->meta()->get()->first();

        $MetaType=Meta::find($MetaData->id);
        // dd($attachments);
        return view('employee.Documents.Document',['MetaData'=>$MetaData,'MetaType'=>$MetaType,'document'=>$document,'attachments'=>$attachments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
