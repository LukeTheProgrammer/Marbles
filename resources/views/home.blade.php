@extends('layouts.app')

@section('content')
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
