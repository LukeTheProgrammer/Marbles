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

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($children as $child)
                <tr>
                    <td>
                        <a href="{{ route('child.show', [$child->id]) }}">
                            {{ $child->name }}
                        </a>
                    </td>
                    <td class="text-right">
                        <a href="{{ route('child.edit', [$child->id]) }}" class="btn btn-primary">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
