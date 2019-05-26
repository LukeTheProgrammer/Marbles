@extends('layouts.app')

@section('content')
    <h1>Edit this Marble Activity</h1>

    {!! Form::open(['url' => route('marble-activity.update', [$activity->id])]) !!}

    <input type="hidden" name="_method" value="patch">

    @include('components.forms.marble_activity', [
        'child_options' => $child_options,
        'marble_options' => $marble_options,
        'selected_child' => $activity->child_id,
        'selected_marble' => $activity->marble_id,
    ])

    {!! Form::submit('Update', ['class' => 'form-control btn btn-success']) !!}

    {!! Form::close() !!}
@endsection
