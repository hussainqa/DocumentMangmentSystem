@extends('layouts.admin')

@section('content')
<div class="card text-center">
    <h5 class="card-header"> جميع الموظفين</h5>

<form method="POST" action="{{ route('Edit-Employee',$employee->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="employee name" class="form-label">اسم الموظف</label>
      <input type="text" name="name" class="form-control" value="{{ $employee->name }}" id="Group Name" aria-describedby="اسم الموظف">
      <div id="employeename" class="form-text">اسم الموظف المراد تسجيله</div>
    </div>
    <div class="mb-3">
        <label for="employee name" class="form-label">البريد الألكتروني</label>
        <input type="text" name="email" class="form-control" id="email" value="{{ $employee->email }}" aria-describedby="البريد الألكتروني">
        <div id="employeename" class="form-text">البريد الألكتروني الخاص بالموظف</div>
      </div>

      <div class="mb-3">
        <label for="employee name" class="form-label">رقم الهاتف</label>
        <input type="text" name="phone" class="form-control" id="phone number" value="{{ $employee->phone }}" aria-describedby="البريد الألكتروني">
        <div id="employeename" class="form-text">رقم الهاتف الخاص بالموظف </div>
      </div>


    <button type="submit" class="btn btn-primary">تأكيد</button>
  </form>
</div>
@endsection
