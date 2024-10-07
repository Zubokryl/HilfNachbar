@extends('layouts.app')

@section('title', 'Provider Profile')

@section('content')
    <h1>Your Profile (Provider)</h1>
    <p>First Name: {{ $user->prov_fname }}</p>
    <p>Last Name: {{ $user->prov_lastname }}</p>
    <p>Email: {{ $user->prov_email }}</p>
    <p>Phone: {{ $user->prov_phone ?? 'Not provided' }}</p>

    <a href="{{ route('providers.profile.edit', ['provider' => $user->id]) }}">Edit Profile</a>
@endsection