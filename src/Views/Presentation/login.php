<!doctype html>
<!--src/Views/Presentation/login.php-->
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polito's</title>
</head>
<body>
<div>
    <h3>Log in:</h3>
    <form action="loginCheck.php" method="POST">
        Username: <input type="text" name="user" required="required"><br/><br/>
        Password: <input type="password" name="pwd" required="required"><br/><br/>
        <input type="submit" value="Login">
    </form>
</div>
<div>
    <h3>Registreer:</h3>
    <form action="register.php">
        <input type="submit" value="Registreer">
    </form>
</div>
</body>
</html>