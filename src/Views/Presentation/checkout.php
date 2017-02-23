<!doctype html>
<!--src/Views/Presentation/cart.php-->
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
</header>
<section>
    <h2>UW BESTELLING</h2>
    <table>
        <tr>
            <th>Naam</th>
            <th>Maat</th>
            <th>Hoeveelheid</th>
            <th>Prijs</th>
            <th></th>
        </tr>
        <?php foreach ($assigns['orderlines'] as $key=>$item){ ?>
            <tr>
                <td><?php print($item->getName());?></td>
                <td><?php if($item->getSize() != "N"){print($item->getSize());}else{print("/");}?></td>
                <td><?php print($item->getQuantity());?></td>
                <td><?php print($item->getPrice());?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="3">Totaal: </td>
            <td><?php print("€".$assigns['totPrice']);?></td>
        </tr>
    </table>


</section>

</body>
</html>