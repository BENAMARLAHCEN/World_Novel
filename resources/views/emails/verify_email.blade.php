<!DOCTYPE html>
<html lang="en">

<body>
    <h1>Hello {{ $user->name }},</h1>

    <p>Thank you for registering on our platform. Please click the button below to activate your account:
    </p>
    <p>
        <a href="{{ route('verify', $user->remember_token) }}">
            {{ route('verify', $user->remember_token) }}
        </a>
    </p>
    <p>Thanks</p>
    {{ config('app.name') }}
</body>

</html>
