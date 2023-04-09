@extends('layouts.employee')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('Add-Employee-EA') }}">
                @csrf
                <div class="row mb-4">
                    <div class="col-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        القسم المراد اضافة الموظفين له
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($Groups as $group )
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="EmployeeGroup[]" value="{{ $group->id }}" id="{{ $group->name }} "required>
                                <label class="form-check-label" for="{{ $group->name }}">
                                    {{ $group->name }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <button type="submit" class="btn btn-primary ">اضافة قسم او لجنة</button>

            </div>
            </div>
            <hr>
<div class="row ">
            <div class="mb-3 col-4">
                <label for="employee name" class="form-label">اسم الموظف</label>
                <input type="text" name="name[]" class="form-control"  placeholder="الأسم الثلاثي للموظف" id="Group Name" aria-describedby="اسم الموظف">
                <div id="employeename" class="form-text">اسم الموظف المراد تسجيله</div>
              </div>
              <div class="mb-3 col-4">
                  <label for="employee name" class="form-label">البريد الألكتروني</label>
                  <input type="text" name="email[]" class="form-control" id="Group Name"  placeholder="عنوان البريد الألكتروني الرسمي" aria-describedby="البريد الألكتروني">
                  <div id="employeename" class="form-text">البريد الألكتروني الخاص بالموظف</div>
                </div>
                <div class="mb-3 col-4">
                    <label for="employee name" class="form-label">صلاحياته داخل هذا القسم</label>
                    <fieldset class="row mb-3">

                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Role[]" id="gridRadios1" value="1" >
                                <label class="form-check-label" for="gridRadios1">
                                    رئيسي
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Role[]" id="gridRadios2" value="0" checked>
                                <label class="form-check-label" for="gridRadios2">
                                    اعتيادي
                                </label>
                            </div>
                        </div>
                    </fieldset>

                  </div>

</div>
<div id="code-container"></div>
{{-- <div class="row"><div id="code-container"></div></div> --}}
<div class="row">
    <div class="col-4">
        <button type="submit" class="btn btn-primary">تأكيد</button>
    </div>
    <div class="col-4 card">
        <button id="add-code-btn" class="btn btn-info">اضافة موظف اخر </button>
    </div>
</div>

            </form>


        </div>
    </div>
</div>

<script>
    const addButton = document.getElementById("add-code-btn");
    const codeContainer = document.getElementById("code-container");
    if (!addButton || !codeContainer) {
      console.error("Error: Unable to find button or container div.");
    }
    const code = `
      <div class="row">
        <div class="mb-3 col-4">
          <label for="employee name" class="form-label">اسم الموظف</label>
          <input type="text" name="name" class="form-control" placeholder="الأسم الثلاثي للموظف" id="Group Name" aria-describedby="اسم الموظف">
          <div id="employeename" class="form-text">اسم الموظف المراد تسجيله</div>
        </div>
        <div class="mb-3 col-4">
          <label for="employee name" class="form-label">البريد الألكتروني</label>
          <input type="text" name="email" class="form-control" id="Group Name" placeholder="عنوان البريد الألكتروني الرسمي" aria-describedby="البريد الألكتروني">
          <div id="employeename" class="form-text">البريد الألكتروني الخاص بالموظف</div>
        </div>
        <div class="mb-3 col-4">
          <label for="employee name" class="form-label">صلاحياته داخل هذا القسم</label>
          <fieldset class="row mb-3">
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Role" id="gridRadios1" value="1" >
                <label class="form-check-label" for="gridRadios1">
                  رئيسي
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Role" id="gridRadios2" value="0" checked>
                <label class="form-check-label" for="gridRadios2">
                  اعتيادي
                </label>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    `;


    document.addEventListener("DOMContentLoaded", function() {


        addButton.addEventListener("click", function() {
      console.log('test11');
      codeContainer.innerHTML += code;
    });

    });
  </script>

@endsection
