@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10">
        <h1>Marble</h1>
    </div>
    <div class="col-2 text-right">
        <a href="{{ route('marble.create') }}" class="btn btn-success">Add Marble</a>
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Marbles</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <a href="{{ route('marble.show', [$marble->id]) }}">
                    {{ $marble->name }}
                </a>
            </td>
            <td>
                {{ $marble->delta }}
            </td>
            <td class="text-right">
                <a href="{{ route('marble.edit', [$marble->id]) }}" class="btn btn-primary">
                    Edit
                </a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
