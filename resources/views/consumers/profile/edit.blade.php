@extends('layouts.app')

@section('title', 'Edit Consumer Profile')

@section('content')
    <h1>Edit Your Profile (Consumer)</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf 
        @component('components.form-fields', ['user' => $user, 'namePrefix' => 'cons']) @endcomponent
        <button type="submit">Update Profile</button>
    </form>

    <a href="{{ route('consumer.profile.show', ['consumer' => Auth::guard('consumer')->user()->id]) }}">Back to Profile</a>
@endsection