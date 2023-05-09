@extends('app.index')
@section('title', 'Intellify - Complete Registration')
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
                    <div class="subhead">Complete your profile</div>
                    <h2 class="title-section">Enter your credentials in order to complete your account</h2>
                    <div class="divider"></div>

                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="py-2">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Full name" value={{ $user->getName() }} name="name" id="name" required>
                            @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <div class="py-2">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value={{ $user->getEmail() }} name="email" id="email" required>
                            @error('email') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <div class="py-2">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password" required>
                            @error('password') <span class="text-danger small">{{$message}}</span>@enderror
                        </div>
                        <div class="py-2">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill mt-4">Register</button>
                    </form>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
</main>
@endsection