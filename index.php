<?php
    include 'partials/header.php';
    require_once __DIR__.'/watches/watches.php';
    $watches = getWatches();
?>
<main>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Type</th>
                    <th scope="col">Strap</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Discounted price</th>
                    <th scope="col">
                        <a class="btn btn-success" href="./create.php">Add a new watch</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($watches as $index => $watch): ?>
                    <tr data-index='<?php echo $index?>'>
                        <td><?php echo $watch['brand'] ?></td>
                        <td><?php echo $watch['model'] ?></td>
                        <td><?php echo $watch['type'] ?></td>
                        <td><?php echo $watch['strap'] ?></td>
                        <td><?php echo '&euro;'.$watch['price'] ?></td>
                        <td>
                            <?php
                                if ($watch['discount'] !== 0) {
                                    echo $watch['discount'].'&percnt;';
                                } else {
                                    echo $watch['discount'];
                                } 
                            ?>
                        </td>
                        
                        <td>
                            <?php
                            $discountedPrice = round($watch['price'] - ($watch['price'] * $watch['discount'] / 100), 2);
                            echo '&euro;'.$discountedPrice; 
                            ?>
                        </td>
                        <td>
                            <a class='btn btn-outline-info' href='show.php?id=<?php echo $index ?>'>show</a>
                            <a class='btn btn-outline-warning' href='update.php?id=<?php echo $index ?>'>edit</a>
                            <a class='btn btn-outline-danger' href='show.php?id=<?php echo $index ?>'>delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include 'partials/footer.php' ?>
