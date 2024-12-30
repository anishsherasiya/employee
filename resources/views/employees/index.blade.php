@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee List</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">Add New Employee</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Designation</th>
                <th>Email</th>
                <th>Reporting To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->reportingTo ? $employee->reportingTo->name : 'None' }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
