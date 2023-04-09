<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Documents page </title>
</head>
<body>
    <nav class="navbar navbar-expand bg-light">
        <div class="container d-flex justify-content-center">
          <h1 class="navbar-brand mx-auto text-center">ادارة النظام</h1>
          <a class="navbar-brand me-auto" href="#">
            <img src="{{ asset('Nahrain1987.jpg') }}" width="60" height="50" alt="">
          </a>
        </div>
      </nav>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-3 bg-light ">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-1  pt-2 text-white min-vh-100">

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center px-4 align-items-sm-start" id="menu">


                    <li>
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown link
                          </a>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle ml-auto">
                            <i class="fs-4 bi-archive"></i> <span class="ms-1 d-none d-sm-inline h6 ">انواع الكتب</span>          <i class="bi bi-arrow-down-square-fill"></i> </a>
                        <ul class="collapse  nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('AddMeta') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">اضافة نوع</span>  </a>
                            </li>
                            <li>
                                <a href="{{ route('Meta') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">تعديل الانواع</span> </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-archive"></i> <span class="ms-1 d-none d-sm-inline h6 ">الموظفين</span> </a>
                        <ul class="collapse  nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('AddEmployee') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">اضافة موظف</span>  </a>
                            </li>
                            <li>
                                <a href="{{ route('Employee') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">تعديل الموظف</span> </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-archive"></i> <span class="ms-1 d-none d-sm-inline h6 ">الاقسام</span> </a>
                        <ul class="collapse  nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('AddGroup') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">اضافة اقسام</span>  </a>
                            </li>
                            <li>
                                <a href="{{ route('Group') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">تعديل الاقسام</span> </a>

                            </li>

                            <li>
                                <a href="{{ route('AddEmployeeGroup') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">اضافة للأقسام</span> </a>

                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-archive"></i> <span class="ms-1 d-none d-sm-inline h6 ">الوثائق</span> </a>
                        <ul class="collapse  nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">صادر</span>  </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">وارد</span> </a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            @yield('content')
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
