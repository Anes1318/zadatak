<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $user->name }}</title>
    
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->


    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

</head>

<body>


    @extends('layouts.main-layout')
    <!-- Page Header-->


    @if (Auth::check())
        @if ($ulogovaniuser->id == $user->id)
            <h1 class="vas_profil">Vaš profil</h1>
            <img class="vasa_profil_slika" height="200" width="auto"
                src="/images/profil/{{ $user->picture ? $user->picture : 'plejsholder.png' }}" alt="">
        @else
            <img class="profil_slika" height="200" width="auto"
                src="/images/profil/{{ $user->picture ? $user->picture : 'plejsholder.png' }}" alt="">
        @endif
    @else
        <img class="profil_slika" height="200" width="auto"
            src="/images/profil/{{ $user->picture ? $user->picture : 'plejsholder.png' }}" alt="">
    @endif

    @if (session('user-updated-message'))
        <div class="sesija_message alert alert-success">
            {{ Session::get('user-updated-message') }}
        </div>
    @endif

    <hr>
    <div class="profil_content">
        <p class="profil_ime"> Ime: {{ $user->name }}</p>
        <p class="profil_email">Email: {{ $user->email }}</p>
        <p class="profil_o_meni">O meni: {!! $user->about !!}</p>
        @if (Auth::check())
            @if ($ulogovaniuser->id == $user->id)
                <form class="" action="{{ route('profiledit', $user->slug) }}" method="post">
                    @csrf
                    @method('GET')
                    <button class="btn btn-secondary" type="submit">Uredi Profil</button>
                </form>
            @endif
        @endif


    </div>





    <!-- Footer-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
