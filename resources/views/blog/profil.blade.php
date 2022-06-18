<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $user->name }}</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->


    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

</head>

<body>


    @extends('layouts.main-layout')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Vas profil</h1>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <img class="slika" height="200" width="auto" src="/images/{{ $user->picture ? $user->picture : 'plejsholder.png' }}"
        alt="">
    <hr>
    <div class="profil_content">
        <p class="profil_ime">Ime: {{$user->name}}</p>
        <p class="profil_email">Email: {{$user->email}}</p>
        <p class="profil_o_meni">O meni: {{$user->about}}</p>
    </div>



    <div class="tabela">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\BlogController@profilupdate', $user->id], 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Ime') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('about', 'O meni') !!}
            {!! Form::textarea('about', null, ['class' => 'form-control', 'rows' => 3]) !!}
        </div>

        <div class="form-group col-5">
            {!! Form::label('picture', 'Slika:') !!}
            {!! Form::file('picture', ['class' => 'form-control-file']) !!}
        </div>
        <br>
        <div class="form-group">
            {!! Form::submit('Uredi profil', ['class' => 'btn btn-secondary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <!-- Footer-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
