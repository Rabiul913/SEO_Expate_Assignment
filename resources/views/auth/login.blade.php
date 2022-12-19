<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="" />
    <meta name="keywords" content="content" />

    <title>Log In | SEO Content</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap Icon CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/icons/favicon.ico') }}" />
  </head>

  <body>
    <main class="section-login">
      <section class="section-login--logo">
        <a href="index.html">
          <img src="{{asset('assets/images/logo.png') }}" alt="logo" class="img-fluid" />
        </a>
      </section>

      <section class="section-login--form">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-5">
              <div class="card">
                <div class="card-title">Sign In</div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('alert'))
                    <div class="alert alert-danger">
                        {{ session()->get('alert') }}
                    </div>
                @endif
                <div class="card-body">
                  <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mt-3">
                      <label for="" class="form-label">Email</label>
                      <input type="email" class="form-control u-box-shadow-1" name="email"/>
                    </div>
                    <div class="mt-3">
                      <label for="" class="form-label">Password</label>
                      <input type="password" class="form-control u-box-shadow-1" name="password"/>
                    </div>
                    <div class="mt-5">
                      <button class="btn btn-green" type="submit">Sign In</button>
                    </div>
                  </form>
                  <div class="links">
                    <p>
                      <a href="signup.html">Need an account?</a>
                      <a href="{{ route('forget_password') }}">Forgot Password?</a>
                    </p>
                  </div>
                  <div class="back-button">
                    <a href="index.html">
                      <i class="bi bi-arrow-left-circle"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
