<header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
        <div class="container">
            <a href="{{ route('index') }}" class="navbar-brand">Intel<span class="text-primary">lify.</span></a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarContent">
                <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
                    <li class="nav-item active">
                        <a href="{{ route('index') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" class="nav-link" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Tools</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                style="color: rgba(100, 95, 136, 0.75);">
                                <a class="dropdown-item" href="{{ route('code_generator.index') }}"
                                    style="color: rgba(100, 95, 136, 0.75);">Code Generator</a>
                                <a class="dropdown-item" href="{{ route('code_translator.index') }}"
                                    style="color: rgba(100, 95, 136, 0.75);">Code Translator</a>
                                <a class="dropdown-item" href="{{ route('image_generator.index') }}"
                                    style="color: rgba(100, 95, 136, 0.75);">Image Generator</a>
                                <a class="dropdown-item" href="{{ route('product_name_generator.index') }}"
                                    style="color: rgba(100, 95, 136, 0.75);">Product Name Generator</a>
                                <a class="dropdown-item" href="{{ route('translate.index') }}"
                                    style="color: rgba(100, 95, 136, 0.75);">Translate</a>

                                    
                            </div>
                        </div>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('history.index') }}" class="nav-link">History</a>
                        </li>
                    @endif
                </ul>

                <div class="ml-auto">
                    @if (Route::has('login'))
                        @auth
                            <div class="dropdown">
                                <a class="btn btn-outline rounded-pill dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault();
                    this.closest('form').submit();">Logout</a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline rounded-pill">Login</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
