@extends('layouts.employee')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row my-3">
        <div class="col-12 border-bottom-3 shadow">
            @if ($Type=='Export')
            <h2 class="text-center">رفع الكتب الصادرة</h2>

            @elseif ($Type=='Import')
                <h2 class="text-center">رفع الكتب الواردة</h2>
            @endif

        </div>
    </div>
    <div class="row text-center">
        <form method="POST" action="{{ route('Add-Document') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6 card p-3">
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">الجهة المصدرة للكتاب</label>
                            <div class="dropdown card">
                                <button class="form-select text-center dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    الأقسام
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($ExportGroups as $group )
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ExportGroupIds[]" value="{{ $group -> id }}" id="{{ $group -> id }}">
                                        <label class="form-check-label" for="{{ $group -> id }}">
                                            {{ $group -> name }}
                                        </label>

                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">الجهة الوارد لها الكتاب</label>
                            <div class="dropdown card">
                                <button class="form-select text-center dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    الأقسام
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($ImportGroups as $group )
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ImportGroupIds[]" value="{{ $group -> id }}" id="{{ $group -> id }}">
                                        <label class="form-check-label" for="{{ $group -> id }}">
                                            {{ $group -> name }}
                                        </label>

                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">



                                <hr>
                                <div class="dropdown card ">
                                    <button class="form-select text-center dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        الموظفين
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach ($TagedEmployees as $TagedEmployee )
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="TagedEmployeeIds[]" value="{{ $TagedEmployee -> id }}" id="{{ $TagedEmployee -> id }}">
                                            <label class="form-check-label" for="{{ $TagedEmployee -> id }}">
                                                {{ $TagedEmployee->name }}
                                            </label>

                                        </div>
                                        @endforeach
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="TagedEmployeeIds[]" value="0" id="0" checked>
                                            <label class="form-check-label" for="0">
                                                لا يوجد
                                            </label>

                                        </div>
                                    </ul>
                                </div>

                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="doc-date"> تاريخ الكتاب</label>
                                <input type="date" class="form-input" name="DocumentDate" required>
                                <div class="form-text" id="doc-date">تاريخ مستند</div>


                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="doc-number"> عدد الكتاب</label>
                                <input type="text" class="form-control" placeholder="عدد الكتاب" id="DocumentNumber" required name="DocumentNumber">
                                <div class="form-text" id="doc-number"></div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">رفع صورة الكتاب</label>
                                <input class="form-control" type="file" id="formFile" name="DocumentFile" required accept="image/png, image/PNG, image/jpg, image/jpeg" value="" required>
                              </div>
                              <div id="photo-fields">
                              </div>
                                <button type="button"class="btn btn-primary" id="add-photo-button">اضافة مرفق للمستند</button>



                        </div>
                        <div class="col-12" >

                            <div class="mb-3" id="document-attachments">

                            </div>

                        </div>


                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="mb-3 text-center">
                            <label for="employee name" class="form-label text-center">نوع الكتاب</label>

                            <select class="form-select text-center" aria-label="Default select example" name="MetaId" id="meta-select" required>
                              <option selected disabled>الانواع</option>
                              @foreach ($metas as $meta )
                                  <option value="{{ $meta->id }}">{{ $meta->name }}</option>
                              @endforeach

                            </select>

                            <div id="employeename" class="form-text"></div>
                          </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div id="dynamic-content"></div>


                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary">تأكيد</button>

            </div>

            <input type="text" hidden value="{{ $EmployeeGroup }}" name="EmployeeGroup">



        </form>
    </div>
</div>

@endsection
<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="TagedEmployeeIds[]"]');
    const noneCheckbox = document.querySelector('input[type="checkbox"][name="TagedEmployeeIds[]"][value="0"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                noneCheckbox.checked = false;
                noneCheckbox.removeAttribute('disabled');
            } else if (!checkboxes.some(checkbox => checkbox.checked)) {
                noneCheckbox.checked = true;
                noneCheckbox.setAttribute('disabled', true);
            }
        });
    });
    var myObject = {!! json_encode($metas) !!};
    console.log(myObject);

    window.onload = function() {
    var metaSelect = document.getElementById("meta-select");

    metaSelect.addEventListener("change", function() {
      var selectedValue = metaSelect.value;

      for(var i=0;i<myObject.length;i++){
        if(myObject[i].id==selectedValue){
            var selectedmeta=myObject[i];

        }
      }
      console.log(selectedValue);
      console.log(selectedmeta);
      var html='';
      html +='<div class="card-header">'+selectedmeta.name+'</div>'
      html +='<div class="card-body">';
      html+='<div class="row">';
    html+='<input type="hidden" value="'+ selectedmeta.id+'" name="MetaId">';
      html +='';
      for (var i = 1; i <= 8; i++) {
      if (selectedmeta["info_" + i] != null) {
        html += '<div class="row">';
        html += '<div class="col-6">';
        html += '<label class="form-label">' + selectedmeta["info_" + i] + '</label>';
        html += '<input name="info_' + i + '" class="form-control" type="text" placeholder="اكتب هنا..." required value="">';
        html += '</div>';
        html += '</div>';
      }
    }
    html +='</div></div>'
    document.getElementById('dynamic-content').innerHTML = html;
      // log the selected value to the console
      // do something with the selected value here
    });
  };

document.addEventListener("DOMContentLoaded", function() {
    const addButton = document.querySelector("#add-photo-button");
    const photoFields = document.querySelector("#document-attachments");

    addButton.addEventListener("click", function() {
      const fieldWrapper = document.createElement("div"); // create a wrapper element for the field and the remove button
      fieldWrapper.classList.add('card');
      const newlabel=document.createElement("label");
      const removeButton = document.createElement("button");
      removeButton.type = "button";
      removeButton.innerText = "حذف";
      removeButton.classList.add("btn");
      removeButton.classList.add("btn-danger");
      removeButton.classList.add("remove-button"); // add a class to the remove button for easier selection later

      newlabel.classList.add("form-label");
      newlabel.innerText="اضافة مرفق";
      const newField = document.createElement("input");
      newField.type = "file";
      newField.name = "attachments[]";
      newField.accept="image/png, image/PNG, image/jpg, image/jpeg";
      newField.classList.add('form-control');
      newField.required = false;

      fieldWrapper.appendChild(newlabel);
      fieldWrapper.appendChild(newField);
      fieldWrapper.appendChild(document.createElement("br"));
      fieldWrapper.appendChild(removeButton); // add the remove button to the wrapper element
      fieldWrapper.appendChild(document.createElement("hr"));
      photoFields.appendChild(fieldWrapper); // add the wrapper element to the container element

      removeButton.addEventListener("click", function() {
        fieldWrapper.parentNode.removeChild(fieldWrapper); // remove the entire wrapper element when the remove button is clicked
      });
    });
  });
  </script>
