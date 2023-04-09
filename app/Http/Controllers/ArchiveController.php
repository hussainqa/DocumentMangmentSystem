<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\group;
use App\Models\document;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_type()
    {
        return view('employee.Archive.AddArchiveType');
    }
    public function index($type)
    {
        if($type=='Import')
        {
            $EmployeeId=Auth::guard('employee')->id();
            $meta=Meta::all();
            return view('employee.Archive.ArchivedDocuments',['metas'=>$meta]);

        }elseif($type=='Export')
        {
            $EmployeeId=Auth::guard('employee')->id();
            $meta=Meta::all();
            return view('employee.Archive.ArchivedDocuments',['metas'=>$meta]);
        }
    }
    public function index_meta($type,$meta)
    {
        $Employee=Employee::find(Auth::guard('employee')->id());
        $group=$Employee->group()->get()->first();
        $MetaModel=Meta::find($meta);
        $DocumentsArchived=$group->document_archived()->get();
        //dd($DocumentsArchived);
        $test=DB::table('archived_group')->select('*')->where('import_export',$type)->where('document_id',14)->where('group_id',$group->id)->get();
        //dd($test[0]);
        //dd(DB::table('archived_group')->select('*')->where('import_export',$type)->where('document_id',14)->where('group_id',$group->id)->get());
        $DocumentsCleaned=[];
        //dd(DB::table('archived_group')->select('*')->where('import_export',$type)->where('document_id',10)->get());
        $archived_group=DB::table('archived_group');
        $documentMetaTable = DB::table('document_meta');
        $documentMetaTable->join('archived_group', 'archived_group.document_id', '=', 'document_meta.document_id');
        $documentMetaTable->where('archived_group.document_id', 10)
        ->where('document_meta.meta_id', $meta)
        ->where('archived_group.import_export', $type)->get();
        //dd($DocumentsArchived->first()->meta()->get()->first()->id);


        foreach($DocumentsArchived as $document)
        {

        if(!(DB::table('archived_group')->select('*')->where('import_export',$type)->where('document_id',$document->id)->where('group_id',$group->id)->get())->first()==[])
        {
            $doc=DB::table('archived_group')->select('*')->where('import_export',$type)->where('document_id',$document->id)->where('group_id',$group->id)->get()->first();
            $doc1=DB::table('document_meta')->select('*')->where('document_id',$doc->document_id)->where('meta_id',$meta)->get();
            if(!($doc1->first()==[]))
            {
                $DocumentsCleaned[]=$doc1->first();
                //dd('empty');
            }
        }
        }
        $DocumentModel=[];
        foreach($DocumentsCleaned as $document)
        {
            $DocumentModel[]=document::find($document->document_id);
        }

        return view('employee.Documents.DocumentsMeta',['documents'=>$DocumentModel]);

        //dd($DocumentModel);
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
        if($request->hasFile('Document'))
        {   //storing the file in public storage directory(Document)
            //dd($request['ImportGroupIds']);
            $DocumentPath=$request->file('Document')->store('Document','public');
            //adding the document details in the table
            $Document=document::create([
                'path'=>$DocumentPath,
                'document_number'=>$request['Number'],
                'doc_date'=>$request['Date'],

            ]);

            $DocumentRelation=document::find($Document->id);

            $DocumentRelation->group_archived()->attach($request['GroupId']);
            $data=[

            ];

            $DocumentRelation->ExIm_group()->attach($request['ImportGroupIds'],['import_export'=>'Import']);
            $DocumentRelation->ExIm_group()->attach($request['ExportGroupIds'],['import_export'=>'Export']);


            return redirect()->route('MetaForm',['id'=>$request['MetaId']])->with(['id'=>$Document->id]);

           // return view('employee.Documents.AddDocumentMeta')


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_form($id)
    {
        $groups=group::all();
        $meta=Meta::all();
        $employee=Employee::find(Auth::guard('employee')->id());
        $group=$employee->group()->get();
        if($id=='Export')
        {

            return view('employee.Archive.AddArchive',['GroupModel'=>$group->first(),'groups'=>$groups,'metas'=>$meta]);


        }elseif($id=='Import')
        {
            return view('employee.Archive.AddArchive',['GroupModel'=>$group->first(),'groups'=>$groups,'metas'=>$meta]);
        }else
        {
            return view('employee.Archive.AddArchiveType');
        }
    }
    public function show($id)
    {

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
