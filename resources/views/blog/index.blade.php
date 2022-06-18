<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Los Sajt</title>
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
                        <h1>Dobrodosli na moj personalni sajt</h1>
                        <span class="subheading">Ja sam Anes Cokovic</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    @foreach ($posts as $post)
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('post.show', $post->slug) }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{{ $post->short_description }}</h3>
                            <img height="200" width="auto" src="/images/{{ $post->picture }}" alt="">

                        </a>
                        <p class="post-meta">
                             Postavio <a href="{{route('profil')}}"><b>{{$post->user->name}}</b></a>
                            

                        </p>
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
    @endforeach
    <div class="paginacija">
        {{ $posts->links() }}

    </div>

    <!-- Divider-->
    <!-- Footer-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
