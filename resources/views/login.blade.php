<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <!-- Форма для потребителей -->
    <form action="{{ route('consumer.login') }}" method="POST">
        @csrf
        <input type="email" name="cons_email" placeholder="Consumer Email" required autocomplete="off">
        @if ($errors->has('cons_email'))
            <div style="color: red;">{{ $errors->first('cons_email') }}</div>
        @endif
        <input type="password" name="cons_password" placeholder="Consumer Password" required autocomplete="off">
        @if ($errors->has('cons_password'))
            <div style="color: red;">{{ $errors->first('cons_password') }}</div>
        @endif
        <button type="submit">Login as Consumer</button>
    </form>

    <!-- Форма для провайдеров -->
    <form action="{{ route('provider.login') }}" method="POST">
        @csrf
        <input type="email" name="prov_email" placeholder="Provider Email" required autocomplete="off">
        @if ($errors->has('prov_email'))
            <div style="color: red;">{{ $errors->first('prov_email') }}</div>
        @endif
        <input type="password" name="prov_password" placeholder="Provider Password" required autocomplete="off">
        @if ($errors->has('prov_password')) 
    <div style="color: red;">{{ $errors->first('prov_password') }}</div>
@endif
        <button type="submit">Login as Provider</button>
    </form>

    <p>Don't have an account? <a href="{{ route('role.selection') }}">Create an account</a></p>
</body>
</html>