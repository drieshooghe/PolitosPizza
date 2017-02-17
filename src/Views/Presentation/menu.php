<!doctype html>
<!--src/Views/Presentation/menu.php-->
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
    <h1>Categorieën</h1>
    <table>
        <?php foreach ($list as $item){ ?>
        <tr>
            <td>
                <a href="ShowDishes.php?dish=<?php print($item->getId())?>"> <?php print($item->getCategory()); ?></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>