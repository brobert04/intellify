@extends('app.index')
@section('title', 'Intellify - Register')
@section('content')
<main>
    <div class="page-section mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <h2 class="title-section">Get in Touch</h2>
                    <div class="divider"></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Laborum ratione autem quidem
                        veritatis!</p>

                    <ul class="contact-list">
                        <li>
                            <div class="icon"><span class="mai-map"></span></div>
                            <div class="content">123 Fake Street, New York, USA</div>
                        </li>
                        <li>
                            <div class="icon"><span class="mai-mail"></span></div>
                            <div class="content"><a href="#">info@digigram.com</a></div>
                        </li>
                        <li>
                            <div class="icon"><span class="mai-phone-portrait"></span></div>
                            <div class="content"><a href="#">+00 1122 3344 55</a></div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <div class="subhead">Register</div>
                    <h2 class="title-section">To use our AI tools, you should create an account </h2>
                    <div class="divider"></div>

                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="py-2">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" name="name" id="name" required>
                            @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <div class="py-2">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" required>
                            @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <div class="py-2">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" required>
                            @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <div class="py-2">
                            <input type="password" class="form-control @error('name') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill mt-4">Register</button>
                    </form>
                    <p class="subhead mt-3 text-center">Or</p>
                    <a class="btn btn-outline-secondary mt-4" href="{{ route('auth.redirect') }}" role="button"
                        style="text-transform:none; width: 100%; font-weight: bold">
                        <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                        Sign up with Google
                    </a>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
</main>
@endsection