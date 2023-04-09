@extends('layouts.admin')
@section('content')

<div class="card text-center">
    <h5 class="card-header"> لتعديل اسم القسم </h5>

<form method="POST" action="{{ route('Edit-Group',$group->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="group name" class="form-label">اسم القسم</label>
      <input type="text" name="name" class="form-control" value="{{ $group->name }}" id="Group Name" aria-describedby="اسم القسم">
      <div id="groupname" class="form-text">اسم القسم المراد تسجيله </div>
    </div>

    <button type="submit" class="btn btn-primary">تأكيد</button>
  </form>
</div>
@endsection
