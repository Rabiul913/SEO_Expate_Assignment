@extends('layouts.auth')

@section('content')
<section class="section-login--form">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-5">
              <div class="card">
                <div class="card-title">Sign In</div>
                <div class="card-body">
                  <form action="">
                    <div class="mt-3">
                      <label for="" class="form-label">Email</label>
                      <input
                        type="email"
                        class="form-control u-box-shadow-1"
                        name=""
                      />
                    </div>
                    <div class="mt-3">
                      <label for="" class="form-label">Password</label>
                      <input
                        type="password"
                        class="form-control u-box-shadow-1"
                        name=""
                      />
                    </div>
                    <div class="mt-5">
                      <div class="btn btn-green">Sign In</div>
                    </div>
                  </form>
                  <div class="links">
                    <p>
                      <a href="signup.html">Need an account?</a>
                      <a href="forgot-password.html">Forgot Password?</a>
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
@endsection