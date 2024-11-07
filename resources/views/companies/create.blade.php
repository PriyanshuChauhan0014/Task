@extends('layouts.app')

@section('content')
    <h1>Create Company</h1>
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <br>
        
        <label>Email:</label>
        <input type="email" name="email">
        <br>
        <br>
        
        <label>Logo:</label>
        <input type="file" name="logo">
        <br>
        <br>
        
        <label>Website:</label>
        <input type="url" name="website">
        <br>
        <br>
        
        <button type="submit">Create Company</button>
    </form>
@endsection
