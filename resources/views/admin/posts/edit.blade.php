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

    @extends('layouts.admin-layout')

    @section('naslov')
        <h1><b>Uredi objavu</b></h1>
    @endsection

    @section('content')
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
                            <div class="slika">
                                <img class="" height="400" width="auto" src="/images/{{ $post->picture }}"
                                    alt="">
                            </div>



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
                                {!! Form::submit('Uredi objavu', ['class' => 'btn btn-outline-secondary']) !!}
                            </div>
                            {!! Form::close() !!}

                            <!-- Submit Button-->



                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
    </div>
    </nav>
    <!-- Page Header-->

    <!-- Main Content-->

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
