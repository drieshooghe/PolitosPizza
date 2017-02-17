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
<a href="showIndex.php"><img src="../public_html/img/pp_logo_font.png"></a>
<div>
    <h3>Ik heb een account:</h3>
    <?php if(!empty($error) && $error == true) print("
    <p>e-mail en/of wachtwoord zijn niet correct, gelieve opnieuw te proberen</p>
    ") ?>
    <form action="loginCheck.php?src=<?php print($src);?>" method="POST">
        Email: <input type="text" name="email" value="<?php print($custEmail);?>" required="required"><br/><br/>
        Password: <input type="password" name="pwd" required="required"><br/><br/>
        <input type="submit" value="Login">
    </form>
</div>
<div>
    <h3>Ik heb geen account:</h3>
    <form action="registerScreen.php" method="post">
        <input type="submit" value="Registreer">
    </form>
</div>
</body>
</html>