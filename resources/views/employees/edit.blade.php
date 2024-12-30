@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $employee->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation', $employee->designation) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $employee->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="reporting_to" class="form-label">Reporting To</label>
            <select name="reporting_to" id="reporting_to" class="form-control">
                <option value="">None</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}" @if($emp->id == $employee->reporting_to) selected @endif>
                        {{ $emp->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
