@extends('layouts.app')

@section('content')
    <h1>{{ $child->name }} has {{ $child->marbles }} marble(s).</h1>
@endsection
