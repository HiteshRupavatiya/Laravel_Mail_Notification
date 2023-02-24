<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <style>
        tr>td {
            padding: 10px;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>
    <h1 align="center">Register</h1>
    <table align="center" border="1">
        <form action="{{ route('user.register') }}" method="post">
            @csrf
            @if (Session::has('success'))
                <span style="color: green">{{ Session::get('success') }}</span>
            @endif
            <tr>
                <td>
                    <label for="name">User Name : </label>
                </td>
                <td>
                    <input type="text" name="name" id="" autofocus value="{{ old('name') }}"
                        placeholder="Username">
                    @error('name')
                        <br>
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">User Email : </label>
                </td>
                <td>
                    <input type="email" name="email" id="" autofocus value="{{ old('email') }}"
                        placeholder="Email">
                    @error('email')
                        <br>
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password : </label>
                </td>
                <td>
                    <input type="password" name="password" id="" autofocus value="{{ old('password') }}">
                    @error('password')
                        <br>
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="confirm_password">Confirm Password : </label>
                </td>
                <td>
                    <input type="password" name="confirm_password" id="" autofocus
                        value="{{ old('confirm_password') }}">
                    @error('confirm_password')
                        <br>
                        <span>{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Register" autofocus>
                </td>
            </tr>
        </form>
    </table>
</body>

</html>
