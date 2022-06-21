@extends('layouts.admin-layout')

@section('naslov')
    <h1><b>ADMIN</b></h1>
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
    

@endsection
