<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $Group_id=$request->route('group');
        $EmpId=$request->route('EmpId');
       
        if(!((Auth::guard('employee')->id())==$EmpId))
        {
            return redirect('/login');
        }
        $Employee=Employee::find(Auth::guard('employee')->id());
        $members=$Employee->group->toArray();
        foreach($members as $member)
        {
            if(in_array($Group_id,$member))
            {
                return $next($request);
            }

        }
        return redirect('/login');
    }
}
