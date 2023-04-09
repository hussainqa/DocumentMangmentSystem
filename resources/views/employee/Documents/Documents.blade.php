@extends('layouts.employee')
@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-12 border-bottom-3 shadow">
            <h2 class="text-center">الوثائق</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($groups as $meta )
        <div class="col-2">
            <div class="card h-100 text-center">
                <i class="bi bi-file-earmark-text-fill card-img-top text-center text-primary" style="font-size: 8em;"></i>
                <div class="card-body">
                  <h5 class="card-title">{{ $meta->name }}</h5>
                  <p class="card-text"></p>
                </div>
                <div class="card m-3">

                    <a  class="btn  btn-primary" href="{{ route('DocumentsGroup',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group'),'type'=>request()->route()->type,'documentgroup'=>$meta->id]) }}">الكتب</a>


                </div>
                <div class="card-footer">
                  <small class="text-muted">عدد الكتب : </small>
                </div>
              </div>
            </div>
        @endforeach

        </div>
</div>
@endsection
