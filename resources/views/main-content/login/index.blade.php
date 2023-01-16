<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMIK Admin Login</title>
</head>

<body>
    <form method="POST" action="">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <button type="submit">Sign In</button>
        </div>
    </form>
</body>

</html>
