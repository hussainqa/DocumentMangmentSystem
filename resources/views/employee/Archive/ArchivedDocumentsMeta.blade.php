@extends('layouts.employee')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($documents as $document )
            <div class="col-3 p-3">
            <div class="card" >
                <img src="/storage/{{ $document->path }}" class="card-img-top img-thumbnail"  alt="...">
                <div class="card-body">
                  <h5 class="card-title">عدد الكتاب : {{ $document->document_number }}</h5>
                  <p class="card-text">تاريخ الكتاب : {{ $document->doc_date }}</p>
                  <a href="{{ route('DocumentShow',['type'=>request()->route()->type,'meta'=>request()->route()->meta,'id'=>$document->id ]) }}" class="btn btn-primary">تفاصيل الكتاب</a>
                </div>
              </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection
