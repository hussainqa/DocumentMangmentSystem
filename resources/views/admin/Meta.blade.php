@extends('layouts.admin')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">اسم النوع</th>
        <th scope="col"> الحقل 1</th>
        <th scope="col">الحقل 2</th>
        <th scope="col">الحقل 3</th>
        <th scope="col">الحقل 4</th>
        <th scope="col">الحقل 5</th>
        <th scope="col">الحقل 6</th>
        <th scope="col">الحقل 7</th>
        <th scope="col">الحقل 8</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($metas as $meta )
      <tr>
        <th scope="row">{{ $meta->id }}</th>
        <td>{{ $meta->name }}</td>

        <td>{{ $meta->info_1 }}</td>
        <td>{{ $meta->info_2 }}</td>
        <td>{{ $meta->info_3 }}</td>
        <td>{{ $meta->info_4 }}</td>
        <td>{{ $meta->info_5 }}</td>
        <td>{{ $meta->info_6 }}</td>
        <td>{{ $meta->info_7 }}</td>
        <td>{{ $meta->info_8 }}</td>

        <td>
          <a href="{{ route('EditMeta', ['id' => $meta->id]) }}">Edit <i class="bi bi-pencil-square"></i></a>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection
