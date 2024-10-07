<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer Registration</title>
</head>
<body>
    <h1>Consumer Registration</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('consumer.register') }}" method="POST">
        @csrf
        <label for="cons_fname">First Name</label>
        <input type="text" name="cons_fname" id="cons_fname" required>

        <label for="cons_lastname">Last Name</label>
        <input type="text" name="cons_lastname" id="cons_lastname" required>

        <label for="cons_email">Email</label>
        <input type="email" name="cons_email" id="cons_email" required>

        <label for="cons_password">Password</label>
        <input type="password" name="cons_password" id="cons_password" required>

        <label for="cons_password_confirmation">Confirm Password</label>
        <input type="password" name="cons_password_confirmation" id="cons_password_confirmation" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>