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
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('Nahrain1987.jpg') }}" alt="" width="40" height="40" class="d-inline-block align-text-top">
            ادارة الوثائق
          </a>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

          </form>
        </div>
      </nav>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-3 bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-1 pt-2 text-white min-vh-100">

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('EmployeeProfile',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group')]) }}" id="profile" class="nav-link  align-middle m-2 px-3">
                            <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline h6">الحساب الشخصي</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link  px-3 mx-2 align-middle" id="documents">
                            <i class="fs-4 bi-archive"></i> <span class="ms-1 d-none d-sm-inline h6 ">الوثائق</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('Documents',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group'),'type'=>'Export']) }}" class="nav-link px-4"> <span class="d-none d-sm-inline">صادر</span>  </a>
                            </li>
                            <li>
                                <a href="{{ route('Documents',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group'),'type'=>'Import']) }}" class="nav-link px-4"> <span class="d-none d-sm-inline">وارد</span> </a>
                            </li>
                            @if(Session::get('Role')==1)
                            <li>
                                <a href="{{ route('AddDocumentType',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group')]) }}" class="nav-link px-4"> <span class="d-none d-sm-inline">رفع مستند</span> </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @if(Session::get('Role')==1)
                     <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link  px-3 m-2 align-middle" id="employees">
                            <i class="fs-4 bi bi-people"></i> <span class="ms-1 d-none d-sm-inline h6 ">الموظفين</span> </a>
                        <ul class="collapse  nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('AddEmployee-EA',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group')]) }}" class="nav-link px-4"> <span class="d-none d-sm-inline">اضافة موظف</span>  </a>
                            </li>
                            <li>
                                <a href="{{ route('Employees-EA',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group')]) }}" class="nav-link px-4"> <span class="d-none d-sm-inline">تعديل الموظف</span> </a>
                            </li>
                        </ul>
                    </li>


                     @endif
                    {{-- <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-archive"></i> <span class="ms-1 d-none d-sm-inline h6 ">الأرشيف</span>
                            <i class="bi bi-chevron-down "></i>
                        </a>
                        <ul class="collapse  nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('ArchivedDocuments',['type'=>'Export']) }}" class="nav-link px-0"> <span class="d-none d-sm-inline">صادر</span>  </a>
                            </li>
                            <li>
                                <a href="{{ route('ArchivedDocuments',['type'=>'Import']) }}" class="nav-link px-0"> <span class="d-none d-sm-inline">وارد</span> </a>
                            </li>
                            <li>
                                <a href="{{ route('AddArchiveType',['EmpId'=>request()->route('EmpId'),'group'=>request()->route('group')]) }}" class="nav-link px-0"> <span class="d-none d-sm-inline">ارشفة مستند</span> </a>
                            </li>

                        </ul>
                    </li> --}}

                </ul>
                <hr>
                {{-- <div class="dropdown pb-4">
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
                </div> --}}
            </div>
        </div>
        <div class="col py-3">
            @yield('content')
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
          // Add active class to clicked nav-link and match current URL with href
          $('.nav-link').each(function() {
            var href = $(this).attr('href'); // Get href of the nav-link
            var currentUrl = window.location.href; // Get current URL
            console.log(currentUrl);
            var wordToCheck = "Employees";

if (currentUrl.includes(wordToCheck)) {
  console.log("The URL contains the word: " + wordToCheck);
} else {
  console.log("The URL does not contain the word: " + wordToCheck);
}
            if (currentUrl.includes(href)) {
              $(this).addClass('active'); // Add active class to nav-link with matching href
            }
          });

          // Remove active class from other nav-links and add to clicked nav-link
          $('.nav-link').click(function() {
            $('.nav-link').removeClass('active'); // Remove active class from all nav-links
            $(this).addClass('active'); // Add active class to clicked nav-link
          });
        });
        </script>
        <script>
        $(document).ready(function() {
          // Add active class to clicked nav-link
          $('.nav-link').click(function() {
            $('.nav-link').removeClass('active'); // Remove active class from all nav-links
            $(this).addClass('active'); // Add active class to clicked nav-link
          });
        });

        </script>

</body>
</html>
