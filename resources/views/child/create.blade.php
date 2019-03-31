@extends('layouts.app')

@section('content')
    <h1>Add a Child</h1>

    {!! Form::open(['url' => route('child.store')]) !!}

    @include('components.forms.child')

    {!! Form::submit('Add', ['class' => 'form-control btn btn-success']) !!}

    {!! Form::close() !!}
@endsection
