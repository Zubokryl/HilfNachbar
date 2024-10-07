@extends('layouts.app')

@section('title', 'Consumer Profile')

@section('content')
    <h1>Your Profile (Consumer)</h1>
    <p>First Name: {{ $user->cons_fname }}</p>
    <p>Last Name: {{ $user->cons_lastname }}</p>
    <p>Email: {{ $user->cons_email }}</p>
    <p>Phone: {{ $user->cons_phone ?? 'Not provided' }}</p>

    <a href="{{ route('consumers.profile.edit', ['consumer' => $user->id]) }}">Edit Profile</a>
@endsection