@extends('layouts.admin-layout')

@section('naslov')
    <h1> <b>Sve objave</b> </h1>
@endsection

@section('content')
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
            <table style="width: 95%" class="table table-bordered" id="dataTable" cellspacing="0">


                <thead>
                    <tr>

                        <th>Id</th>
                        <th>Profil</th>
                        <th style="width: 30%">Naslov</th>
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
                        <tr style="max-height: max-content;">
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->user->name }}</td>
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
                                <form class="" action="{{ route('postadmin.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Izbrisi</button>
                                </form>
                            </td>
                            <td>
                                <form class="" action="{{ route('postadmin.edit', $post->slug) }}" method="post">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-success" type="submit">Uredi</button>
                                </form>
                            </td>
                            <td>
                                <form class="" action="{{ route('post.show', $post->slug) }}" method="post">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-info " type="submit" name="btn btn-primary">Vidi
                                        više</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            
        </div>
        <div class="paginacija text-xs-center">
                {{ $posts->links() }}

            </div>
    @endif


@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sve objave</title>

    <!-- Font Awesome icons (free version)-->


</head>

<body>


    <!-- Page Header-->
    <header>


    </header>
    <!-- Main Content-->

</body>

</html>
