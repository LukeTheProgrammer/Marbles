@extends('layouts.app')

@section('content')
    <h1>Add a Marble</h1>

    {!! Form::open(['url' => route('marble.store')]) !!}

    @include('components.forms.marble', [
        'name' => null,
        'delta' => null,
    ])

    {!! Form::submit('Add', ['class' => 'form-control btn btn-success']) !!}

    {!! Form::close() !!}
@endsection
