@extends('layouts.app')

@section('content')
    <h1>Edit this Child</h1>

    {!! Form::open(['url' => route('child.update', [$child->id])]) !!}

    @include('components.forms.child', [
        'child' => $child,
    ])

    {!! Form::submit('Update', ['class' => 'form-control btn btn-success']) !!}

    {!! Form::close() !!}
@endsection
