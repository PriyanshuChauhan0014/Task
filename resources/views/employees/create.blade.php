@extends('layouts.app')

@section('content')
    <h1>Create Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>First Name:</label>
        <input type="text" name="first_name" required>
        
        <label>Last Name:</label>
        <input type="text" name="last_name" required>
        
        <label>Company:</label>
        <select name="company_id" required>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
        
        <label>Email:</label>
        <input type="email" name="email">
        
        <label>Phone:</label>
        <input type="text" name="phone">
        
        <label>Profile Picture:</label>
        <input type="file" name="profile_picture">
        
        <button type="submit">Create Employee</button>
    </form>
@endsection
