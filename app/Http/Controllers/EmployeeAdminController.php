<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeAdminController extends Controller
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
    public function showEmployeeForm(string $EmpId,string $group)
    {
        $AdminGroup=group::find($group);
        $Groups=DB::table('group')->select('*')->where('name','=',$AdminGroup->name)->orWhere('parent_group','=',$AdminGroup->name)->get();
        return view('employee.admin.AddEmployee',['Groups'=>$Groups]);
    }
    public function showEmployees(string $EmpId,string $group)
    {
        $EmpGroup=group::find($group);

        $Groups=DB::table('group')->select('id')
        ->where('name','=',$EmpGroup->name)
        ->orWhere('parent_group','=',$EmpGroup->name)
        ->get();

        $id_array = $Groups->pluck('id')->toArray();
    //     $employees = DB::table('employee')
    // ->join('employee_group', 'employee.id', '=', 'employee_group.employee_id')
    // ->join('group', 'employee_group.group_id', '=', 'group.id')
    // ->whereIn('group.id', $id_array)
    // ->select('employee.*')
    // ->distinct()
    // ->get();

    $employees = DB::table('employee')
        ->join('employee_group', 'employee.id', '=', 'employee_group.employee_id')
        ->join('group', 'employee_group.group_id', '=', 'group.id')
        ->whereIn('group.id', $id_array)
        ->select('employee.*', 'group.name as group_name', 'employee_group.Role')
        ->distinct()
        ->get();

    return view('employee.admin.DepartmentEmployees',['employees'=>$employees]);
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
        return redirect()->route('Employees-EA');


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
