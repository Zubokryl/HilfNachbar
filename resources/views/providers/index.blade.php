@extends('layouts.app')

@section('title', 'Providers List')

@section('content')
    <h1>Providers List</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($providers as $provider)
                <tr>
                    <td>{{ $provider->id }}</td>
                    <td>{{ $provider->prov_fname }}</td>
                    <td>{{ $provider->prov_lastname }}</td>
                    <td>{{ $provider->prov_email }}</td>
                    <td>
                        <a href="{{ route('provider.profile.show', ['id' => $provider->id]) }}">View</a>
                        <a href="{{ route('provider.profile.edit', ['id' => $provider->id]) }}">Edit</a>
                        <form action="{{ route('provider.destroy', ['id' => $provider->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this provider?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('provider.register') }}">Register New Provider</a>
@endsection