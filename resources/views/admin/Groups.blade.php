@extends('layouts.admin')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">اسم القسم</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($groups as $group )
      <tr>
        <th scope="row">{{ $group->id }}</th>
        <td>{{ $group->name }}</td>
        <td>
          <a href="{{ route('EditGroup', ['id' => $group->id]) }}">Edit <i class="bi bi-pencil-square"></i></a>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection
