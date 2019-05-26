@extends('layouts.app')

@section('content')
    <h1>Edit Marble</h1>

    {!! Form::open(['url' => route('marble.update', [$marble->id])]) !!}

    <input type="hidden" name="_method" value="patch">

    @include('components.forms.marble', [
        'name' => $marble->name,
        'delta' => $marble->delta,
    ])

    {!! Form::submit('Update', ['class' => 'form-control btn btn-success']) !!}

    {!! Form::close() !!}
@endsection
