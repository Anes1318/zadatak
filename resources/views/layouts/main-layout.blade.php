<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>



                @if (Auth::check())

                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ route('post.create') }}">Napravi objavu</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ route('post.index') }}">Moje objave</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ route('kontakt') }}">Kontakt</a></li>
                    @if ($ulogovaniuser->admin == true)
                       <li class="nav-item"><a
                                class="nav-link px-lg-3 py-3 py-lg-4"href="{{ route('admin') }}">Admin</a>
                        </li>
                    @endif
                    <li class="user_info nav-item dropdown">
                        <a id="navbarDropdown" class="user_kartica dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown"><img class="user_slika" height="50"
                                width="50"src="/images/profil/{{ $ulogovaniuser->picture ? $ulogovaniuser->picture : 'plejsholder.png' }}"alt="slika">{{ $ulogovaniuser->name }}</a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <div class="odjava_dugme">
                                <form class="" action="{{ route('profil', $ulogovaniuser->slug) }}"
                                    method="get">
                                    @csrf
                                    <button class="odjava_dugme btn btn-secondary" type="submit">Profil</button>
                                </form>
                            </div>
                            <div class="odjava_dugme">
                                <form class="" action="/logout" method="post">
                                    @csrf
                                    <button class="odjava_dugme btn btn-secondary" type="submit">Odjava</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">Prijavi
                            se</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ route('register') }}">Registruj se</a></li>
                @endif

            </ul>
        </div>

    </div>
</nav>
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/c/DarkViperAU" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/_anes05/" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/Anes1318" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://open.spotify.com/user/o9q3wxcdwai0gen1jz25ic1fn" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-spotify fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>

                    </li>
                </ul>
                <div class="small text-center text-muted fst-italic">Anes &copy; 2022</div>
            </div>
        </div>
    </div>
</footer>
