<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Skoro pa dobar sajt</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="{{ asset('https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/us3ykqq7sb8mvoc0c30d5ymf1im5i3qwj35qxmk1wkn42mpg/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
</head>

<body>
    <!-- Navigation-->

    @extends('layouts.main-layout')
    </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/home-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Uredite objavu</h1>
                        <span class="subheading">Brzo i lako</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="my-5">

                        <img height="200" width="auto" src="/images/{{ $post->picture }}" alt="">
                        <hr>
                        {!! Form::model($post, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminPostsController@update', $post->slug], 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Naslov') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('short_description', 'Kratki opis') !!}
                            {!! Form::textarea('short_description', null, ['class' => 'form-control', 'rows' => 2]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', 'Opis') !!}
                            {!! Form::textarea('content', null, ['id' => 'myeditorinstance', 'class' => 'form-control', 'rows' => 4]) !!}
                        </div>

                        <div class="form-group col-5">
                            {!! Form::label('picture', 'Slika:') !!}
                            {!! Form::file('picture', ['class' => 'form-control-file']) !!}
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::submit('Uredi objavu', ['class' => 'btn btn-secondary']) !!}
                        </div>
                        {!! Form::close() !!}

                        <!-- Submit Button-->



                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="{{ asset('https://cdn.startbootstrap.com/sb-forms-latest.js') }}"></script>
</body>

</html>
