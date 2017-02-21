<!doctype html>
<!--src/Views/Presentation/index.php-->
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polito's</title>
</head>
<body>
<header>
    <a href="<?php print($assigns['home']);?>"><img src="<?php print(getPublicPath("/img/pp_logo_font.png"));?>"></a>
    <a href="<?php print($assigns['login']);?>"><?php print($assigns['loginValue']);?></a>
</header>
<h1>Welkom</h1>
<div>
    <h2> Momenteel zijn wij: </h2>
    <img src="<?php print(getPublicPath("/img/").$assigns['status'].".svg");?>"
</div>
<div>
    <h1><a href="<?php print($assigns["menu"]);?>">BESTELLEN</a></h1>
</div>
</body>
</html>