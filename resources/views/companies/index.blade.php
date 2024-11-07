@extends('layouts.app')

@section('content')
    <h1>Companies</h1>
    <a href="{{ route('companies.create') }}">Create New Company</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td><img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100"></td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $companies->links() }}
@endsection

