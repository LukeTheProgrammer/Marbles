@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10">
        <h1>Children</h1>
    </div>
    <div class="col-2 text-right">
        <a href="{{ route('child.create') }}" class="btn btn-success">Add Child</a>
    </div>
</div>

<div class="row">
    @foreach ($children as $child)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('child.show', [$child->id]) }}">
                        <h2>{{ $child->name }}</h2>
                    </a>
                </div>
                <div class="card-body text-center">
                    <h2>{{ $child->marbles }} Marbles</h2>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
