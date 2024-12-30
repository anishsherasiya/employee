@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Leave Requests</h1>
    <a href="{{ route('leaves.create') }}" class="btn btn-success mb-3">Add New Leave</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->id }}</td>
                <td>{{ $leave->employee->name }}</td>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->reason }}</td>
                <td>
                    <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
