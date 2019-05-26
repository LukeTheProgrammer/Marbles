@extends('layouts.app')

@section('content')
    <h1>Add a Marble Activity</h1>

    {!! Form::open(['url' => route('marble-activity.store')]) !!}

    @include('components.forms.marble_activity', [
        'child_options' => $child_options,
        'marble_options' => $marble_options,
        'selected_child' => null,
        'selected_marble' => null,
    ])

    {!! Form::submit('Add', ['class' => 'form-control btn btn-success']) !!}

    {!! Form::close() !!}
@endsection
