<html>
<body style="text-align: center;">
    <h1>Password reset</h1>
    <h3>{{ $psw_request_token }}</h3>
    <form method="POST" action="/api/password/request/{{ $psw_request_token }}">
        {{--@csrf--}}

        <label for="password">New password</label>
        <br />
        <input id="password" name="password" type="text">
<br />
<br />
        <label for="password_confirmation">Confirm password</label>
        <br />
        <input id="password_confirmation" name="password_confirmation" type="text">

        <br />
        <br />
        <input type="submit" />
    </form>
</body>
</html>
