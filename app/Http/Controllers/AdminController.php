<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showEmployeeForm()
    {
        $Groups=group::all();
        return view('admin.AddEmployee',['Groups'=>$Groups]);
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
    public function storeEmployees(Request $request)
    {
        

        $Group=group::find($request->EmployeeGroup[0]);
        $names = $request->input('name');
        $emails = $request->input('email');
        $roles = $request->input('Role');
        foreach ($names as $key => $value) {
            $employee = Employee::create([
                'name'=>$value,
                'email'=>$emails[$key],
            ]);
        $Group->employee()->attach($employee->id,['Role'=>$roles[$key]]);

        }
        return redirect()->route('Employee');


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
