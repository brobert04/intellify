@extends('app.index')
@section('title', 'Intellify - Login')
@section('content')
  <main>
    <div class="page-section mt-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 py-3 wow fadeInUp">
              <h2 class="title-section">Intellify</h2>
              <div class="divider"></div>
              <p>Your AI Companion</p>
          </div>
            <div class="col-lg-6 py-3 wow fadeInUp">
              <div class="subhead">Log in</div>
              <h2 class="title-section">Before using our tools, please log in to your account</h2>
              <div class="divider"></div>
              
              <form action="{{ route('login') }}" method="post" class="mb-3">
                @csrf
                <div class="py-2">
                  <input type="email" class="form-control @error('password') is-invalid @enderror" placeholder="Email" name="email" id="email">
                  @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <div class="py-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password">
                    @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                </div>
                <button type="submit" class="btn btn-primary rounded-pill mt-4">Login</button>
              </form>
              <a href="{{ route('register') }}" class="mt-4" style="margin-top: 10px;">Don't have an account?</a>
              <br>
              <a href="{{ route('password.request') }}" class="mt-4" style="margin-top: 10px;">Forgot your password?</a>
              <p class="subhead mt-3 text-center">Or</p>
                        <a class="btn btn-outline-secondary mt-4" href="{{ route('auth.redirect') }}" role="button"
                            style="text-transform:none; width: 100%; font-weight: bold">
                            <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                            Log in with Google
                        </a>
            </div>
          </div>
        </div> <!-- .container -->
      </div> <!-- .page-section -->
  </main>
@endsection