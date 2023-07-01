<!DOCTYPE html>
<?php
    include_once __DIR__ . "./server.php" ;
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
            <table class="table">
                <thead>
                    <tr>
                        <?php 
                            foreach ($watches[0] as $key => $value) {
                                echo "<th scope='col'>" . ucfirst($key) . "</th>";
                            } 
                        ?>
                        <th scope="col">Discounted price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($watches as $watch) {
                            echo "<tr>";
                            foreach ($watch as $key => $value) {
                                if ($key === 'description') {
                                    $value = strlen($value) > 20 ? substr($value, 0, 20) . "..." : $value;
                                }

                                if ($key === 'discount' && $value !== 0) {
                                    $value .= '&percnt;'; 
                                }
                                echo "<td>$value</td>";
                            }
                            
                            $discountedPrice = round($watch['price'] - ($watch['price'] * $watch['discount'] / 100), 2);
                            echo "<td>$discountedPrice</td>";

                            echo "<td>";
                            echo "<a href=\"./show.php?watch=" . urlencode(json_encode($watch)) . "\">show</a>";
                            echo "</td>";
                            
                            echo "</tr>";
                        }
                    ?>
                    
                </tbody>
            </table>
        </main>


        <script src="./JS/script.js"></script>
    </body>
</html>