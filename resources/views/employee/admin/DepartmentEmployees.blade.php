@extends('layouts.employee')
@section('content')
<div class="container-fluid">
<div class="card">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الأسم</th>
            <th scope="col">حساب البريد</th>
            <th scope="col">قسم الموظف</th>
            <th scope="col">منصبه داخل</th>
            <th scope="col">حذف</th>
            <th scope="col">تعديل</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee )
            <tr>
                <th scope="row">{{ $employee -> id }} </th>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->group_name }}</td>
                @if ($employee->Role==1)
                <td>رئيسي</td>
                @else
                <td>اعتيادي</td>
                @endif
                <td>
                    <a href="#" ><i class="bi bi-pencil-square"></i></a>
                      </td>
                <td>
                       <a href="#" ><i class="bi bi-trash"></i></a>
                </td>



            </tr>
            @endforeach
          
        </tbody>
      </table>
    </div>
</div>

@endsection
