<?php

namespace App\Http\Controllers;


use App\Models\employee;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\employee_group;
use Illuminate\Routing\Redirector;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_groups($EmpID)
    {
        $employee=employee::find($EmpID);
        $groups=$employee->group;
        return view('AUTH.group',['groups'=>$groups]);
    }
    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        if(Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password])){
            $EmpID=Auth::guard('employee')->id();
            $Employee=employee::find($EmpID);
            $groups=json_decode($Employee->group,true);


            if(count($groups)==1)
            {
                $GroupId=$Employee->group->first()->id;
                $Role=$groups[0]['pivot']['Role'];
                Session::put('Role', $Role);

                return redirect()->route('EmployeeProfile',['group'=>$GroupId,'EmpId'=>$EmpID]);

            }elseif(count($groups)>1)
            {
                return redirect()->route('ChoseGroup',['EmpId'=>$EmpID]);
            }

        }elseif(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin');
        }
        return redirect("login")->withSuccess('Login details are not valid');

    }
    public function index_admin()
    {
        $employees=employee::all();
        return view('admin.Employees',['employees'=>$employees]);
    }
    public function index($EmpId,$GroupId)
    {
        //this function to return the profile of the employee


        $employee=employee::find($EmpId);
        $group=Group::find($GroupId);
        $Role=DB::table('employee_group')->select('Role')->where('employee_id','=',$EmpId)->where('group_id','=',$GroupId)->get()->first()->Role;



        return view('employee.profile',['employee'=>$employee,'group'=>$group,'Role'=>$Role]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
      return employee::create([
        'name' => $data['name'],
        'email' => $data['email'],

      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:employee,email',
        ]);
        $data=$request->all();
        $this->create($data);
        return redirect()->route('AddEmployee');

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
        $employee=employee::find($id);
        return view('admin.EditEmployee',['employee'=>$employee]);
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
        $employee=employee::find($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:employee,email',
            'phone'=>'required',
        ]);
        $employee->name=$request['name'];
        $employee->email=$request['email'];
        $employee->phone=$request['phone'];
        $employee->save();
        return redirect()->route('Employee');


    }
    public function resetPassword(Request $request)
{
    // validate form input

    $validatedData = $request->validate([
        'oldPassword' => 'required',
        'newPassword' => 'required|min:6',
        'confirmPassword' => 'required|same:newPassword',
    ]);

    // attempt to change password for authenticated employee
    $employee = employee::find(Auth::guard('employee')->id());

    if (Hash::check($validatedData['oldPassword'], $employee->password)) {
        $employee->password = Hash::make($validatedData['newPassword']);
        $employee->save();
        return redirect()->route('EmployeeProfile')->with('success', 'تم تغيير الرمز السري بنجاح');
    } else {
        return back()->withErrors(['oldPassword' => 'الرمز السري القديم غير صحيح']);
    }
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
