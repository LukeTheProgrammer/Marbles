@extends('layouts.app')

@section('content')
    @auth
        <h2>You are logged in, yay!</h2>
    @endauth

    @guest
        <h2>You are not logged in.</h2>

        <p>Unfortunately, you can only access this site if you are an authorized user of this site.</p>
    @endguest
@endsection
