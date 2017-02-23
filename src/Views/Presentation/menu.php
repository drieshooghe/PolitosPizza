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
        h5{
            margin-top: 5px;
            margin-bottom: 5px;
        }
        p{
            font-style: italic;
            font-size: 0.8em;
        }
        form{
            font-size:0.8em;
        }
        input[type="number"]{
            width: 3em;
        }
    </style>
</head>
<body>
    <header>
        <a href="<?php print($assigns['home']);?>"><img src="<?php print(getPublicPath("/img/pp_logo_font.png"));?>"></a>
    </header>
    <section class="menu">
        <h1>VOORGERECHTEN</h1>
        <?php foreach ($assigns["entrees"] as $item) {?>
            <h5><?php print(strtoupper($item->getName()));?></h5>
            <p><?php print($item->getDesc());?></p>
            <p>Prijs: €<?php print($item->getPrice()); ?></p>
            <form action="<?php print($assigns['menu']);?>" method="GET">
                <input type="hidden" name="id" value="<?php print($item->getId());?>">
                Aantal: <input type="number" name="quantity" value="Aantal" min=0>
                <input type="submit" value="Toevoegen">
            </form>
        <?php } ?>

        <h1>PIZZA'S</h1>
        <?php foreach ($assigns["pizza"] as $item) {?>
            <h5><?php print(strtoupper($item->getName()));?></h5>
            <p><?php print($item->getDesc());?></p>
            <p>Prijs: €<?php print($item->getPrice()); ?></p>
            <form action="<?php print($assigns['menu']);?>" method="GET">
                <input type="hidden" name="id" value="<?php print($item->getId());?>">
                <select name="sizeId">
                    <option value="2">Small</option>
                    <option value="3">Medium</option>
                    <option value="4">Large</option>
                </select>
                Aantal: <input type="number" name="quantity" value="Aantal" min=0>
                <input type="submit" value="Toevoegen">
            </form>
        <?php } ?>

        <h1>PASTA'S</h1>
        <?php foreach ($assigns["pasta"] as $item) {?>
            <h5><?php print(strtoupper($item->getName()));?></h5>
            <p><?php print($item->getDesc());?></p>
            <p>Prijs: €<?php print($item->getPrice()); ?></p>
            <form action="<?php print($assigns['menu']);?>" method="GET">
                <input type="hidden" name="id" value="<?php print($item->getId());?>">
                Aantal: <input type="number" name="quantity" value="Aantal" min=0>
                <input type="submit" value="Toevoegen">
            </form>
        <?php } ?>

        <h1>DESSERTS</h1>
        <?php foreach ($assigns["dessert"] as $item) {?>
            <h5><?php print(strtoupper($item->getName()));?></h5>
            <p><?php print($item->getDesc());?></p>
            <p>Prijs: €<?php print($item->getPrice()); ?></p>
            <form action="<?php print($assigns['menu']);?>" method="GET">
                <input type="hidden" name="id" value="<?php print($item->getId());?>">
                Aantal: <input type="number" name="quantity" value="Aantal" min=0>
                <input type="submit" value="Toevoegen">
            </form>
        <?php } ?>

        <h1>DRANKEN</h1>
        <?php foreach ($assigns["drinks"] as $item) {?>
            <h5><?php print(strtoupper($item->getName()));?></h5>
            <p><?php print($item->getDesc());?></p>
            <p>Prijs: €<?php print($item->getPrice()); ?></p>
            <form action="<?php print($assigns['menu']);?>" method="GET">
                <input type="hidden" name="id" value="<?php print($item->getId());?>">
                Aantal: <input type="number" name="quantity" value="Aantal" min=0>
                <input type="submit" value="Toevoegen">
            </form>
        <?php } ?>

    </section>

    <section class="cart">
        <h2>UW BESTELLING</h2>
        <table>
            <tr>
                <th>Naam</th>
                <th>Maat</th>
                <th>Hoeveelheid</th>
                <th>Prijs</th>
            </tr>
            <?php foreach ($assigns['orderlines'] as $item){ ?>
                <tr>
                    <td><?php print($item->getName());?></td>
                    <td><?php if($item->getSize() != "N"){print($item->getSize());}else{print("/");}?></td>
                    <td><?php print($item->getQuantity());?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3">Totaal: </td>
                <td>Prijs</td>
            </tr>
        </table>
        <form action="<?php print($assigns['menu']);?>" method="GET">
            <input type="hidden" name="process" value="reset">
            <input type="submit" value="Reset">
        </form>

    </section>
</body>
</html>