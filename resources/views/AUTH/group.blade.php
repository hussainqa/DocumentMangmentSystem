
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center"><h3>اختيار القسم </h3></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($groups as $group)
            <div class="col-sm-6">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title">المتابعة بقسم  </h5>
                    <p class="card-text">{{ $group->name }}</p>
                    <a href="{{ route('EmployeeProfile',['group'=>$group->id,'EmpId'=>request()->route('EmpId')]) }}" class="btn btn-primary">الدخول للحساب</a>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
