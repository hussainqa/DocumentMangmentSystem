@extends('layouts.admin')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">اسم الموظف</th>
        <th scope="col"> البريد الألكتروني</th>
        <th scope="col">الرقم</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee )
      <tr>
        <th scope="row">{{ $employee->id }}</th>
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->phone }}</td>

        <td>
          <a href="{{ route('EditEmployee', ['id' => $employee->id]) }}">Edit <i class="bi bi-pencil-square"></i></a>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection
