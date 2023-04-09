<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meta=Meta::all();
        return view('admin.Meta',['metas'=>$meta]);
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
    public function store_meta(Request $request)
    {
        $Meta=Meta::find($request['MetaId']);
        $data = [
            'info_1' => $request['info_1'],
            'info_2' => $request['info_2'],
            'info_3' => $request['info_3'],
            'info_4' => $request['info_4'],
            'info_5' => $request['info_5'],
            'info_6' => $request['info_6'],
            'info_7' => $request['info_7'],
            'info_8' => $request['info_8'],


        ];
        $Meta->document()->attach($request['DocumentId'],$data);
        return redirect()->route('AddDocument');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'info1'=>'required',
        ]);
        $data=$request->all();
        //dd($data['info1']);
        meta::create([
            'name'=>$data['name'],
            'info_1'=>$data['info1'],
            'info_2'=>$data['info2'],
            'info_3'=>$data['info3'],
            'info_4'=>$data['info4'],
            'info_5'=>$data['info5'],
            'info_6'=>$data['info6'],
            'info_7'=>$data['info7'],
            'info_8'=>$data['info8'],

        ]);
        return redirect()->route('AddMeta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meta=Meta::find($id);
        return view('employee.Documents.AddDocumentMeta',['meta'=>$meta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meta=Meta::find($id);
        return view('admin.EditMeta',['meta'=>$meta]);
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
        $meta=Meta::find($id);
        $request->validate([
            'name'=>'required',
            'info1'=>'required',
        ]);
        $meta->name=$request['name'];
        $meta->info_1=$request['info1'];
        $meta->info_2=$request['info2'];
        $meta->info_3=$request['info3'];
        $meta->info_4=$request['info4'];
        $meta->info_5=$request['info5'];
        $meta->info_6=$request['info6'];
        $meta->info_7=$request['info7'];
        $meta->info_8=$request['info8'];
        $meta->save();
        return redirect()->route('Meta');
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
