@extends('layouts.employee')
@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-12 border-bottom-3 shadow">
            <h2 class="text-center">المعلومات الشخصية </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-8 border-3 shadow">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">معلومات الحساب <i class="fs-4 bi-info"></i></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">تعديل  <i class="fs-4 bi-pencil"></i></button>
                </li>

              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-striped text-center ">
                    <thead>

                    </thead>
                    <tbody>
                        <tr>
                            <th>الأسم الثلاثي</th>
                            <td>{{ $employee->name }}</td>
                        </tr>
                        <tr>
                            <th>الحساب</th>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <th>رقم الهاتف</th>
                            <td>{{ $employee->phone }}</td>
                        </tr>

                        <tr>
                            <th>اسم القسم</th>
                            <td>{{ $group->name }}</td>
                        </tr>
                        <tr>
                            <th>المنصب داخل القسم</th>
                            @if ($Role=='1')
                                <td> رئيسي</td>

                            @else
                                <td>اعتيادي</td>
                            @endif

                        </tr>

                    </tbody>
                </table></div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form class="row g-2 needs-validation" id="my-form" method="POST" action="{{ route('changePassword') }}" novalidate>
                        @csrf
                        <div class="col-12">
                          <label for="inputPassword4" class="form-label my-3">الرمز السري القديم</label>
                          <input type="text" class="form-control disabled" name="oldPassword" id="inputPassword4" placeholder="اكتب هنا الرمز القديم" required>
                        </div>

                        <div class="col-6 my-1">
                          <label for="password" class="form-label">الرمز السري الجديد</label>
                          <input type="password" class="form-control" placeholder="ادخل الرمز الجديد" id="password" name="newPassword" minlength="6" required>
                          <div class="invalid-feedback">
                            يجب ان يكون الرمز مكون من 6 اراقام او احرف
                          </div>
                        </div>

                        <div class="col-6">
                          <label for="confirm-password" class="form-label">تأكيد المز السري</label>
                          <input type="password" class="form-control" id="confirm-password" placeholder="اعد كتابة الرمز الجديد" name="confirmPassword" minlength="6" required>
                          <div class="invalid-feedback">
                            غير مطابق
                          </div>
                        </div>

                        <div class="col-12 text-center">
                          <button type="submit" id="submit-btn" class="btn btn-primary" disabled>تأكيد التغيير</button>
                        </div>
                      </form>
                </div>

              </div>

        </div>
        <div class="col-4">
            <div class="card h-100 text-center">
                <i class="bi bi-person-circle card-img-top text-center text-primary" style="font-size: 10em;"></i>

                <div class="card-body">
                  <h5 class="card-title">الأسم </h5>
                  <p class="card-text"></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">{{ $employee->name }}</small>
                </div>
              </div>
            </div>
        </div>

    </div>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
  // Disable the submit button initially
  var submitBtn = document.getElementById("submit-btn");
  submitBtn.disabled = true;

  // When the password or confirm password field changes, check if they match and meet the length requirements
  var passwordField = document.getElementById("password");
  var confirmField = document.getElementById("confirm-password");
  var passwordLength = passwordField.getAttribute("minlength");

  function checkPasswords() {
    var passwordsMatch = passwordField.value === confirmField.value;
    var passwordLengthValid = passwordField.value.length >= passwordLength;

    if (passwordsMatch && passwordLengthValid) {
      // If they match and meet the length requirement, enable the submit button and remove the invalid feedback
      confirmField.classList.remove("is-invalid");
      passwordField.classList.remove("is-invalid");
      submitBtn.disabled = false;
    } else {
      // If they don't match or don't meet the length requirement, disable the submit button and show the invalid feedback
      confirmField.classList.add("is-invalid");
      passwordField.classList.add("is-invalid");
      submitBtn.disabled = true;
    }
  }

  passwordField.addEventListener("keyup", checkPasswords);
  confirmField.addEventListener("keyup", checkPasswords);
});

    </script>
