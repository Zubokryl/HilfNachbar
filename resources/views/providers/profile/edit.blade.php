@extends('layouts.app')

@section('title', 'Edit Provider Profile')

@section('content')
    <h1>Edit Your Profile (Provider)</h1>
    
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('provider.profile.update') }}" method="POST">
        @csrf 
        @component('components.form-fields', ['user' => $user, 'namePrefix' => 'prov']) @endcomponent
        <button type="submit">Update Profile</button>
    </form>

    <a href="{{ route('providers.profile.show', ['provider' => $user->id]) }}">Back to Profile</a>
@endsection