<!doctype html>
<!--src/Views/Presentation/menu.php-->
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polito's</title>
    <style>
        html{
            font-family: Arial;
        }
        section.menu{
            width: 60%;
            float: left;
        }
        section.cart{
            width: 30%;
            float: right;
        }
    </style>
</head>
<body>
    <header>
        <a href="<?php print($assigns['home']);?>"><img src="<?php print(getPublicPath("/img/pp_logo_font.png"));?>"></a>
    </header>
    <section class="menu">
        <h1>CATEGORIEËN</h1>
        <?php foreach ($assigns["entrees"] as $item) {
            print("<h3>".strtoupper($item->getName()->getName())."</h3>");

        } ?>


    </section>
    <section class="cart">
        <h2>UW BESTELLING</h2>
    </section>
</body>
</html>