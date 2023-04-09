@extends('layouts.admin')

@section('content')
<div class="card text-center">
    <h5 class="card-header"> لأضافة قسم جديد</h5>

<form method="POST" action="{{ route('Add-Group') }}">
    @csrf
    <div class="mb-3">
      <label for="group name" class="form-label">اسم القسم</label>
      <input type="text" name="name" class="form-control" id="Group Name" aria-describedby="اسم القسم">
      <div id="groupname" class="form-text">اسم القسم المراد تسجيله </div>
    </div>

    <button type="submit" class="btn btn-primary">تأكيد</button>
  </form>
</div>
@endsection
