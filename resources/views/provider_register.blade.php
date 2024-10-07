
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Registration</title>
</head>
<body>
    <h1>Provider Registration</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('provider.register') }}" method="POST">
        @csrf
        <label for="prov_fname">First Name</label>
        <input type="text" name="prov_fname" id="prov_fname" required>

        <label for="prov_lastname">Last Name</label>
        <input type="text" name="prov_lastname" id="prov_lastname" required>

        <label for="prov_email">Email</label>
        <input type="email" name="prov_email" id="prov_email" required>

        <label for="prov_password">Password</label>
        <input type="password" name="prov_password" id="prov_password" required>

        <label for="prov_password_confirmation">Confirm Password</label>
        <input type="password" name="prov_password_confirmation" id="prov_password_confirmation" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>