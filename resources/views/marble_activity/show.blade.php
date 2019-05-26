@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-10">
            <h1>Marble Activities</h1>
        </div>
        <div class="col-2 text-right">
            <a href="{{ route('marble-activity.create') }}" class="btn btn-success">Add Marble Activity</a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th>Child</th>
                <th>Marble</th>
                <th>Marbles</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ Carbon\Carbon::parse($activity->updated_at)->format('M d') }}
                </td>
                <td>
                    <a href="{{ route('child.show', [$activity->child->id]) }}">
                        {{ $activity->child->name }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('marble.show', [$activity->marble->id]) }}">
                        {{ $activity->marble->name }}
                    </a>
                </td>
                <td>
                    {{ $activity->marble->delta }}
                </td>
                <td class="text-right">
                    <a href="{{ route('marble-activity.edit', [$activity->id]) }}" class="btn btn-primary">
                        Edit
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
