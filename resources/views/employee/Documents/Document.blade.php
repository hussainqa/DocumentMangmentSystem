@extends('layouts.employee')
@section('content')
<div class="container">
    <div class="row py-3 text-center">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              المستند
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="row">
            <div class="col-12">
            <div class="card" >
                <img src="/storage/{{ $document->path }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
            @if ($attachments!=null)
            <h2>ملحقات</h2>
                @foreach ($attachments as $attachment )
                    <div class="col-12">
                        <div class="card">
                            <img src="/storage/{{ $attachment->path }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                @endforeach
            @else

            @endif
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    معلومات الكتاب
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>عدد الكتب</td>
                        <td>{{ $document->document_number }}</td>

                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>تاريخ الكتاب</td>
                        <td>{{ $document->doc_date }}</td>

                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>نوع الكتاب</td>
                        <td>{{ $MetaType->name }}</td>

                      </tr>

                      @for ($i = 1; $i <= 8; $i++)
    @php
        $info = 'info_'.$i;
        $value = $MetaData->pivot->$info;
    @endphp
    @if (!empty($MetaType->$info) && !empty($value))
        <tr>
            <th scope="row">{{ $i + 3 }}</th>
            <td>{{ $MetaType->$info }}</td>
            <td colspan="2">{{ $value }}</td>
        </tr>
    @endif
@endfor

                    </tbody>
                  </table>
                  <div class="row">
                    <div class="col-6">
                        <div class="card">
                        <a class="btn btn-primary" href="{{ route('redirectPage',
                        ['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group'),
                        'type'=>request()->route('type'),
                        'DocumentId'=>$document->id]) }}"> اعادة ارسال</a>
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="card">
                            <a class="btn btn-primary"> ارشفة </a>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection
