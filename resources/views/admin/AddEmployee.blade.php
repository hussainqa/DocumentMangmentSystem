@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 card mb-3 p-3">
            <form method="POST" action="{{ route('Add-Employees') }}">
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
                                <input class="form-check-input" type="radio" name="EmployeeGroup[]" value="{{ $group->id }}" id="{{ $group->name }}">
                                <label class="form-check-label" for="{{ $group->name }}">
                                    {{ $group->name }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <button type="submit" class="btn btn-primary " ><a href="{{ route('AddGroup') }}">اضافة قسم او لجنة</a></button>

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
                                <input class="form-check-input" type="radio" name="Role[0]" id="gridRadios1" value="1" >
                                <label class="form-check-label" for="gridRadios1">
                                    رئيسي
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Role[0]" id="gridRadios2" value="0" checked>
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
    <button type="submit" class="btn btn-primary  btn-block">تأكيد</button>


</div>

            </form>


        </div>
        <div class="row">
            <div id='delete-button'>
                <button id="add-code-btn" class="btn btn-info rounded-pill">اضافة موظف <i class="bi bi-plus"></i></button>
                <button id="delete-code-btn" class="btn btn-danger rounded-pill" disabled>حذف موظف <i class="bi bi-trash"></i></button>

                </div>

        </div>
    </div>
</div>
<script>
    const addButton = document.getElementById("add-code-btn");
    const codeContainer = document.getElementById("code-container");
    if (!addButton || !codeContainer) {
      console.error("Error: Unable to find button or container div.");
    }
    var code = `
      <div class="row">
        <div class="mb-3 col-4">
          <label for="employee name" class="form-label">اسم الموظف</label>
          <input type="text" name="name[]" class="form-control" placeholder="الأسم الثلاثي للموظف" id="Group Name" aria-describedby="اسم الموظف">
          <div id="employeename" class="form-text">اسم الموظف المراد تسجيله</div>
        </div>
        <div class="mb-3 col-4">
          <label for="employee name" class="form-label">البريد الألكتروني</label>
          <input type="text" name="email[]" class="form-control" id="Group Name" placeholder="عنوان البريد الألكتروني الرسمي" aria-describedby="البريد الألكتروني">
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
    `;
    //   var button =document.createElement("button");
    //   button.setAttribute('id', 'delete-code-btn');
    //   button.setAttribute('class', 'btn btn-danger rounded-pill');
    //   button.innerHTML = 'حذف موظف<i class="bi bi-trash"></i>';
    //   button.setAttribute('disabled', 'true');
    var button =document.getElementById('delete-code-btn');

// Add the button to the DOM
var container = document.getElementById('delete-button');
const deleteButton=document.getElementById('delete-code-btn');
var i=1;
    document.addEventListener("DOMContentLoaded", function() {


        addButton.addEventListener("click", function() {


            var code = `
      <div class="row">
        <div class="mb-3 col-4">
          <label for="employee name" class="form-label">اسم الموظف</label>
          <input type="text" name="name[]" class="form-control" placeholder="الأسم الثلاثي للموظف" id="Group Name" aria-describedby="اسم الموظف">
          <div id="employeename" class="form-text">اسم الموظف المراد تسجيله</div>
        </div>
        <div class="mb-3 col-4">
          <label for="employee name" class="form-label">البريد الألكتروني</label>
          <input type="text" name="email[]" class="form-control" id="Group Name" placeholder="عنوان البريد الألكتروني الرسمي" aria-describedby="البريد الألكتروني">
          <div id="employeename" class="form-text">البريد الألكتروني الخاص بالموظف</div>
        </div>
        <div class="mb-3 col-4">
          <label for="employee name" class="form-label">صلاحياته داخل هذا القسم</label>
          <fieldset class="row mb-3">
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Role[${i}]" id="gridRadios1" value="1" >
                <label class="form-check-label" for="gridRadios1">
                  رئيسي
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Role[${i}]" id="gridRadios2" value="0" checked>
                <label class="form-check-label" for="gridRadios2">
                  اعتيادي
                </label>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    `;
      console.log('test11');
      button.removeAttribute('disabled');
      codeContainer.innerHTML += code;
     i+=1;
    //   container.appendChild(button);
    });
    deleteButton.addEventListener("click",function(){
        var container = document.getElementById('code-container');

        var lastDiv = container.lastElementChild;
        container.removeChild(lastDiv);
        i=i-1;
    })


    });
  </script>
@endsection
