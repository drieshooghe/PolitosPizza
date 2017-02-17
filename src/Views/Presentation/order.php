<!doctype html>
<!--src/Views/Presentation/order.php-->
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polito's</title>
    <style>
        table{
            background-color: darkgrey;
            width: 40vw;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
        th{
            background-color: dimgrey;
        }
        tr{
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <h1>Bestellen</h1>

        <?php foreach ($catList as $item){ ?>
        <table>
            <tr>
                <th><?php print($item->getCategory());?></th>
            </tr>
            <?php $foodCat = $dish->getFoodByCatId($item->getId());
            foreach($foodCat as $value) {?>

                <tr>
                    <td>
                        <?php print($value->getName());?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php } ?>
</body>
</html>