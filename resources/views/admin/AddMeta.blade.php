@extends('layouts.admin')

@section('content')
<div class="card text-center">
    <h5 class="card-header"> لأضافة نوع جديد</h5>

<form method="POST" action="{{ route('Add-Meta') }}">
    @csrf
    <div class="mb-3">
      <label for="group name" class="form-label">اسم النوع</label>
      <input type="text" name="name" class="form-control" id="meta Name" aria-describedby="اسم نوع">
      <div id="metaname" class="form-text">اسم النوع المراد اضافته</div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
            <label for="group name" class="form-label">الحقل الأول</label>
            <input type="text" name="info1" class="form-control" id="meta Name" aria-describedby="الحقل الأول">
            <div id="metaname" class="form-text"></div>
          </div>
        </div>
        <div class="col-6">
              <div class="mb-3">
            <label for="group name" class="form-label">الحقل الثاني</label>
            <input type="text" name="info2" class="form-control" id="meta Name" aria-describedby="الحقل الثاني">
            <div id="metaname" class="form-text"></div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
            <label for="group name" class="form-label">الحقل الثالث</label>
            <input type="text" name="info3" class="form-control" id="meta Name" aria-describedby="الحقل الثالث">
            <div id="metaname" class="form-text"></div>
          </div>
        </div>
        <div class="col-6">
              <div class="mb-3">
            <label for="group name" class="form-label">الحقل الرابع</label>
            <input type="text" name="info4" class="form-control" id="meta Name" aria-describedby="الحقل الرابع">
            <div id="metaname" class="form-text"></div>
          </div>
        </div>
    </div>    <div class="row">
        <div class="col-6">
            <div class="mb-3">
            <label for="group name" class="form-label">الحقل الخامس</label>
            <input type="text" name="info5" class="form-control" id="meta Name" aria-describedby="الحقل الخامس">
            <div id="metaname" class="form-text"></div>
          </div>
        </div>
        <div class="col-6">
              <div class="mb-3">
            <label for="group name" class="form-label">الحقل السادس</label>
            <input type="text" name="info6" class="form-control" id="meta Name" aria-describedby="الحقل السادس">
            <div id="metaname" class="form-text"></div>
          </div>
        </div>
    </div>    <div class="row">
        <div class="col-6">
            <div class="mb-3">
            <label for="group name" class="form-label">الحقل السابع</label>
            <input type="text" name="info7" class="form-control" id="meta Name" aria-describedby="الحقل السابع">
            <div id="metaname" class="form-text"></div>
          </div>
        </div>
        <div class="col-6">
              <div class="mb-3">
            <label for="group name" class="form-label">الحقل الثامن</label>
            <input type="text" name="info8" class="form-control" id="meta Name" aria-describedby="الحقل الثامن">
            <div id="metaname" class="form-text"></div>
          </div>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">تأكيد</button>
  </form>
</div>
@endsection
