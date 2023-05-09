<header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="{{ route('index') }}" class="navbar-brand">Intel<span class="text-primary">lify.</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item active">
              <a href="{{ route('index') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a href="#" class="nav-link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tools</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="color: rgba(100, 95, 136, 0.75);">
                      <a class="dropdown-item" href="{{ route('code_generator.index') }}" style="color: rgba(100, 95, 136, 0.75);">Code Generator</a>
                      <a class="dropdown-item" href="#" style="color: rgba(100, 95, 136, 0.75);">Code Translator</a>
                      <a class="dropdown-item" href="#" style="color: rgba(100, 95, 136, 0.75);">Image Generator</a>
                      <a class="dropdown-item" href="#" style="color: rgba(100, 95, 136, 0.75);">Translator</a>
                      <a class="dropdown-item" href="#" style="color: rgba(100, 95, 136, 0.75);">Business Helper</a>
                    </div>
                  </div>
            </li>
            @if(Auth::check())
            <li class="nav-item">
              <a href="{{ route('history.index') }}" class="nav-link">History</a>
            </li>
            @endif
            <li class="nav-item">
              <a href="blog.html" class="nav-link">News</a>
            </li>
          </ul>

          <div class="ml-auto">
            @if (Route::has('login'))
                @auth
                <a href="#" class="btn btn-outline rounded-pill">{{ auth()->user()->name }}</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline rounded-pill">Login</a>
            @endauth
            @endif
          </div>
        </div>
      </div>
    </nav>   
</header>