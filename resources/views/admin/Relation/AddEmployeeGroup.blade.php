@extends('layouts.admin')
@section('content')
<div class="card ">
    <h5 class="card-header text-center"> لأضافة قسم جديد</h5>

<form method="POST" action="{{ route('Add-EmployeeGroup') }}">
    @csrf
    <div class="row">
        <div class="col-6">
    <div class="mb-3 text-center">
      <label for="employee name" class="form-label text-center">اسم القسم </label>

      <select class="form-select text-center" aria-label="Default select example" name="group">
        <option selected disabled>الأقسام</option>
        @foreach ($groups as $group )
            <option value="{{ $group->id }}">{{ $group->name }}</option>
        @endforeach

      </select>

      <div id="employeename" class="form-text">اسم القسم المراد اضافة الموظفين له</div>
    </div>
    </div>
    </div>
    <div class="mb-3">
        <label for="employee name" class="form-label">اسماء الموظفين</label>
        <div class="form-check text-left">
        @foreach ($employees as $employee )
        <input type="checkbox" class="form-check-input" name="employees[]" value="{{ $employee -> id }}">
        <label class="">{{ $employee -> name }}</label>
        @foreach ($employee->group as $group1)
            {{ $group1->name }},
        @endforeach
<br>
        @endforeach
        </div>
        <div id="employeename" class="form-text">الموظفين المراد اضافتهم للقسم</div>
      </div>


    <button type="submit" class="btn btn-primary">تأكيد</button>
  </form>
</div>
@endsection
