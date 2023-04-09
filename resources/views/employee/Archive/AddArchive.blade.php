@extends('layouts.employee')
@section('content')
<div class="row my-3">
    <div class="col-12 border-bottom-3 shadow">
        <h2 class="text-center">استمارة رفع المستند</h2>
    </div>
</div>
<form method="POST" action="{{ route('Add-Archive') }}" enctype="multipart/form-data">
@csrf

<div class="row my-3">
    <div class="col-6 card">
        <div class="mb-3">
            <input  type="text" name="GroupId" value="{{ $GroupModel->id }}" hidden>

            @if ( request()->route('type') =='Import' )
            <label for="group-name" class="form-label">القسم المرسل للكتاب</label>
            <br>


            <input type="text" name="type" value="Import" hidden>
            <div class="dropdown">
                <button class="btn btn-lg btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    الأقسام
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($groups as $group )
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ExportGroupIds[]" value="{{ $group -> id }}" id="{{ $group -> id }}">
                        <label class="form-check-label" for="option3">
                            {{ $group -> name }}
                        </label>

                    </div>
                    @endforeach
                </ul>
            </div>
            <div id="group-name" class="form-text">الاقسام المرسلة للكتاب</div>
          </div>
          <hr class="hr">


        <div class="mb-3">
            <label for="group-name" class="form-label">القسم المستلم  للكتاب</label>
            <br>
            <div class="dropdown ">
                <button class="btn btn-lg btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    الأقسام
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ImportGroupIds[]" value="{{ $GroupModel->id }}" id="{{ $GroupModel->id }}" hidden checked>

                        <input class="form-check-input" type="checkbox" name="ImportGroupIds[]" value="{{ $GroupModel->id }}" id="{{ $GroupModel->id }}" disabled checked>
                        <label class="form=check-label" for="{{ $GroupModel->id }}">
                            {{ $GroupModel->name }}
                        </label>
                    </div>
                    @foreach ($groups as $group )
                    <div class="form-check">

                        <input class="form-check-input" type="checkbox" name="ImportGroupIds[]" value="{{ $group -> id }}" id="{{ $group -> id }}" disabled>
                        <label class="form-check-label" for="{{ $group->id }}">
                            {{ $group -> name }}
                        </label>

                    </div>
                    @endforeach
                </ul>

            </div>

            <div id="group-name" class="form-text">الاقسام المستلمة للكتاب</div>
          </div>
          @elseif (request()->route('type') =='Export')
          <input type="text" name="type" value="Export" hidden>
          <label for="group-name" class="form-label">القسم المرسل للكتاب</label>
          <br>



          <div class="dropdown">
              <button class="btn btn-lg btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  الأقسام
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ExportGroupIds[]" value="{{ $GroupModel->id }}" id="{{ $GroupModel->id }}" hidden checked>

                    <input class="form-check-input" type="checkbox" name="ExportGroupIds[]" value="{{ $GroupModel->id }}" id="{{ $GroupModel->id }}" disabled checked>
                    <label class="form=check-label" for="{{ $GroupModel->id }}">
                        {{ $GroupModel->name }}
                    </label>
                </div>
                  @foreach ($groups as $group )
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="ExportGroupIds[]" value="{{ $group -> id }}" id="{{ $group -> id }} " disabled>
                      <label class="form-check-label" for="option3">
                          {{ $group -> name }}
                      </label>

                  </div>
                  @endforeach
              </ul>
          </div>
          <div id="group-name" class="form-text">الاقسام المرسلة للكتاب</div>
        </div>
        <hr class="hr">


      <div class="mb-3">
          <label for="group-name" class="form-label">القسم المستلم  للكتاب</label>
          <br>
          <div class="dropdown ">
              <button class="btn btn-lg btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  الأقسام
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                  @foreach ($groups as $group )
                  <div class="form-check">

                      <input class="form-check-input" type="checkbox" name="ImportGroupIds[]" value="{{ $group -> id }}" id="{{ $group -> id }}" >
                      <label class="form-check-label" for="{{ $group->id }}">
                          {{ $group -> name }}
                      </label>

                  </div>
                  @endforeach
              </ul>

          </div>

          <div id="group-name" class="form-text">الاقسام المستلمة للكتاب</div>
        </div>

          @endif
          <hr class="hr">
          <div class="mb-3">
            <label class="form-label" for="doc-date"> تاريخ الكتاب</label>
            <input type="date" class="form-input" name="Date" required>
            <div class="form-text" id="doc-date">تاريخ مستند</div>


        </div>

    </div>

    <div class="col-6 card">
        <div class="mb-3 ">
            <label for="employee name" class="form-label ">نوع الكتاب</label>

            <select class="form-select  text-center" aria-label="Default select example" name="MetaId" required>
              <option selected disabled>الانواع</option>
              @foreach ($metas as $meta )
                  <option value="{{ $meta->id }}">{{ $meta->name }}</option>
              @endforeach

            </select>

            <div id="employeename" class="form-text"></div>

          </div>

        <hr class="hr" />
        <div class="mb-3">
            <label class="form-label" for="doc-number"> عدد الكتاب</label>
            <input type="text" class="form-control" placeholder="عدد الكتاب" id="doc-number" required name="Number">
            <div class="form-text" id="doc-number"></div>

        </div>
        <hr class="hr" />
        <div class="mb-3">
            <label for="formFile" class="form-label">رفع صورة الكتاب</label>
            <input class="form-control" type="file" id="formFile" name="Document" required accept="image/png, image/PNG, image/jpg, image/jpeg" value="" required>
          </div>
    </div>
</div>
<div class="row">
    <div class="col-12 card">
        <button type="submit" class="btn btn-lg btn-primary">تأكيد</button>

    </div>
</div>
</form>

@endsection
