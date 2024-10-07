@csrf
<div>
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="{{ $namePrefix }}_fname" value="{{ $user->{$namePrefix.'_fname'} }}" required>
</div>

<div>
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="{{ $namePrefix }}_lastname" value="{{ $user->{$namePrefix.'_lastname'} }}" required>
</div>

<div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="{{ $namePrefix }}_email" value="{{ $user->{$namePrefix.'_email'} }}" required>
</div>

<div>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="{{ $namePrefix }}_phone" value="{{ $user->{$namePrefix.'_phone'} }}">
</div>