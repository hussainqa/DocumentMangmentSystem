@extends('layouts.employee')
@section('content')
    <div class="container">
        <div class="row py-3">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-title"><h3 > اختيار نوع الكتاب </h3></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">صادر</h5>
                  <p class="card-text">الكتب الصادرة من القسم</p>
                  <a href="{{ route('AddDocument',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group'),'type'=>'Export']) }}" class="btn btn-primary">استمارة الرفع </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">وارد</h5>
                  <p class="card-text">الكتب الواردة الى القسم</p>

                  <a href="{{ route('AddDocument',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group'),'type'=>'Import']) }}" class="btn btn-primary">استمارة الرفع </a>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
