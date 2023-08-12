<nav class="navbar navbar-expand-lg navbar-light bg-light px-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/img/logo_flat.png" alt="logo Mayar Listrik"
                style="width:160px;height:50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li> --}}
                @if (Auth::check())

                <li class="nav-item dropdown" id="login">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button">{{
                        \Illuminate\Support\Str::limit(Auth::user()->nama,10) }}</a> {{-- Membatasi panjang karakter
                    pada nama --}}

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        {{-- <li class="active"><a href="#" class="dropdown-item">Profile</a></li> --}}
                        <li class="active"><a href="{{ route('actionlogout') }}" class="dropdown-item">Logout</a>
                        </li>
                    </ul>
                </li>
                @else


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Guest
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>