
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <title>Login </title>
    </head>
    <body>
        <div class="container my-5 bg-light">
            <div class="row">
              <div class="col-md-6 mx-auto">
                <div class="card p-5 mx-auto shadow-lg">
                  <div class="text-center">
                    <img src="{{ asset('Nahrain1987.jpg') }}" class="img-fluid w-50" alt="Logo">
                  </div>
                  <form class="mt-5" method="POST" action="{{ route('login.custom') }}">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="text-center mt-3">
                      <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>
