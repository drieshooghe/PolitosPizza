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
<h1>Gerechten</h1>
<table>
    <?php foreach ($list as $item){ ?>
        <tr>
            <td>
                <?php print($item->getName()); ?>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>