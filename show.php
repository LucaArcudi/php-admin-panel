<!DOCTYPE html>
<?php
    include_once __DIR__ . "./server.php" ;
?>
<?php

    $watch = json_decode($_GET['watch'], true);

    var_dump($watch)

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <h1>Admin Panel</h1>
        </header>
        <main>

        <div class="card text-center">
            <div class="card-header">
                <h2>
                    <?php echo $watch['brand'].' - '.$watch['model'] ; ?>
                </h2>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <?php echo $watch['description']; ?>
                </p>
                <p class="card-text">
                    <?php echo 'Type: '.$watch['type'].' - '.'Strap: '.$watch['strap']; ?>
                </p>
                <p class="card-text">
                    <?php 
                        if ($watch['discount'] !== 0) {
                            echo 'Price: '.$watch['price'].' - '.'Discount: '.$watch['discount'].'&percnt;';
                        } else {
                            echo 'Price: '.$watch['price'].' - '.'Discount: '.$watch['discount'];
                        }
                    ?>
                </p>
                <p class="card-text">
                    <?php
                        $discountedPrice = round($watch['price'] - ($watch['price'] * $watch['discount'] / 100), 2);
                        echo 'Discounted price: '.$discountedPrice;
                    ?>
                </p>
            </div>
            <div class="card-footer text-body-secondary">
                <a href="./index.php" class="btn btn-primary">Index</a>
            </div>
        </div>
        </main>
        <script src="./JS/script.js"></script>
    </body>
</html>