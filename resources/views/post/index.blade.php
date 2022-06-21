<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Moje objave</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
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
                        <h1>Moje objave</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    @if (session('post-edited-message'))
        <div class="sesija_message alert alert-success">
            {{ Session::get('post-edited-message') }}
        </div>
    @elseif(session('post-deleted-message'))
        <div class="sesija_message alert alert-danger">
            {{ Session::get('post-deleted-message') }}
        </div>
    @endif
    @if ($posts)
        <div class="tabela">
            <table style="width: 80%" class="table table-bordered" id="dataTable" cellspacing="0">


                <thead>
                    <tr>


                        <th style="width: 30%">Ime</th>
                        <th style="width: 11%">Slika</th>
                        <th style="width: 30%">Kratki Opis</th>
                        <th style="width: 30%">Opis</th>
                        <th style="width: 11%">Datum pravljenja</th>
                        <th style="width: 11%">Datum uredjivanja</th>
                        <th style="width: 5%">Izbrisi</th>
                        <th style="width: 5%">Uredi</th>
                        <th style="width: 5%">Vise</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        @if ($post->user_id == $ulogovaniuser->id)
                            <tr>

                                <td>{{ substr($post->title, 0, 13) . '...' }}</td>
                                <td><img height="100" width="auto"
                                        src="/images/{{ $post->picture ? $post->picture : 'plejsholder.png' }}"
                                        alt=""></td>
                                <td>{{ $post->short_description }}</td>
                                <td>
                                    @php
                                        echo substr($post->content, 0, 13) . '...';
                                        
                                    @endphp
                                </td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                                <td>
                                    <form class="" action="{{ route('post.destroy', $post->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Izbrisi</button>
                                    </form>
                                </td>
                                <td>
                                    <form class="" action="{{ route('post.edit', $post->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-success" type="submit">Uredi</button>
                                    </form>
                                </td>
                                <td>
                                    <form class="" action="{{ route('post.show', $post->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-info " type="submit" name="btn btn-primary">Vidi više</button>
                                    </form>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="paginacija text-xs-center">
            {{ $posts->links() }}

        </div>

    @endif


    <!-- Divider-->

    <div class="container px-4 px-lg-5">
        <div class="row gx-6 gx-lg-7 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

            </div>
        </div>
    </div>
    <!-- Footer-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
