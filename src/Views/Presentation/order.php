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
        table, tr{
            border: 1px solid black;
        }
    </style>
</head>
<body>
<header>
    <a href="showIndex.php"><img src="../public_html/img/pp_logo_font.png"></a>
    <form action=<?php print($loginLink);?>><input type="submit" value="Afrekenen"></form>
</header>
<section>
    <h1>Bestellen</h1>
        <?php foreach ($catList as $item){ ?>
        <table>
            <tr><th colspan="4"><?php print($item->getCategory());?></th></tr>
            <?php $foodCat = $dishes->getFoodByCatId($item->getId());
            foreach($foodCat as $value) {?>
                <?php if($value->getSize()->getId() == 1):?>
                    <tr>
                        <td>
                        <?php print($value->getName());?>
                        </td>
                        <form action="order.php" method="get">
                        <td>
                            <input type="submit" value="-">
                        </td>
                        <td>
                            <input type="number" value="0" min=0>
                        </td>
                        <td>
                            <input type="submit" value="+">
                        </td>
                        </form>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td>
                        <?php print($value->getName()); print(" [".substr($value->getSize()->getSize(), 0,1)."]");?>
                        </td>
                        <td>
                            <input type="button" value="-">
                        </td>
                        <td>
                            <input type="number" value="0" min=0>
                        </td>
                        <td>
                            <input type="button" value="+">
                        </td>

                    </tr>
                    <tr>
                        <td>

                        </td>
                    </tr>

                    <?php endif; ?>
                <br/>
            <?php } ?>
        </table>
        <?php } ?>
</section>

</body>
</html>