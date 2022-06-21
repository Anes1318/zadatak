@extends('layouts.admin-layout')

@section('naslov')
    <h1> <b>Svi profili</b> </h1>
@endsection

@section('content')
    @if (session('user-deleted-message'))
        <div class="sesija_message alert alert-danger">
            {{ Session::get('user-deleted-message') }}
        </div>
    @endif
    @if ($users)
        <div class="tabela">
            <table style="width: 95%" class="table table-bordered" id="dataTable" cellspacing="0">


                <thead>
                    <tr>

                        <th>Id</th>
                        <th style="width: 10%">Ime</th>
                        <th style="width: 11%">Email</th>
                        <th style="width: 11%">Slika</th>
                        <th style="width: 5%">Admin status</th>
                        <th style="width: 25%">O meni</th>
                        <th style="width: 11%">Datum kreiranja</th>
                        <th style="width: 11%">Datum uredjivanja</th>
                        <th style="width: 5%">Izbrisi</th>
                        <th style="width: 7.5%">Vise</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->id !== $ulogovaniuser->id)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><img height="100" width="auto"
                                        src="/images/profil/{{ $user->picture ? $user->picture : 'plejsholder.png' }}"
                                        alt="">
                                </td>
                                <td>{{ $user->admin ? 'Admin' : 'Nije Admin' }}
                                
                                </td>
                                <td>
                                    @php
                                        echo substr($user->about, 0, 23) . '...';
                                    @endphp
                                </td>

                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td>
                                    <form class="" action="{{ route('useradmin.destroy', $user->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Izbrisi</button>
                                    </form>
                                </td>

                                <td>
                                    <form class="" action="{{ route('profil', $user->slug) }}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-info " type="submit" name="btn btn-primary">Vidi
                                            više</button>
                                    </form>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
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
    <title>Svi profili</title>

    <!-- Font Awesome icons (free version)-->


</head>

<body>


    <!-- Page Header-->
    <header>


    </header>
    <!-- Main Content-->

</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Los Sajt</title>

    <!-- Font Awesome icons (free version)-->
    
  

</head>

<body>

    @extends('layouts.admin-layout')
    


    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Svi profili</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    @if (session('user-deleted-message'))
        <div class="sesija_message alert alert-danger">
            {{ Session::get('user-deleted-message') }}
        </div>
    @endif
    @if ($users)
        <div class="tabela">
            <table style="width: 80%" class="table table-bordered" id="dataTable" cellspacing="0">


                <thead>
                    <tr>

                        <th>Id</th>
                        <th>Ime</th>
                        <th style="width: 11%">Email</th>
                        <th style="width: 11%">Slika</th>
                        <th style="width: 5%">Admin status</th>
                        <th style="width: 11%">O meni</th>
                        <th style="width: 11%">Datum kreiranja</th>
                        <th style="width: 11%">Datum uredjivanja</th>
                        <th style="width: 5%">Izbrisi</th>
                        <th style="width: 5%">Vise</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->id !== $ulogovaniuser->id)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><img height="100" width="auto"
                                        src="/images/profil/{{ $user->picture ? $user->picture : 'plejsholder.png' }}"
                                        alt="">
                                </td>
                                <td>{{ $user->admin ? 'Admin' : 'Nije Admin' }}</td>
                                <td>
                                    @php
                                        echo substr($user->about, 0, 23) . '...';
                                    @endphp
                                </td>

                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td>
                                    <form class="" action="{{ route('useradmin.destroy', $user->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Izbrisi</button>
                                    </form>
                                </td>

                                <td>
                                    <form class="" action="{{ route('profil', $user->slug) }}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-info " type="submit" name="btn btn-primary">Vidi
                                            vise</button>
                                    </form>

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
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

</html> --}}
