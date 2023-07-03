<?php
    include_once 'partials/header.php';
    require_once __DIR__.'/watches/watches.php';
    $watches = getWatches();
?>
<main>
    <div class="container">
        <div class="mb-3">
            <label for="brandSelect" class="form-label">Select Brand:</label>
            <select id="brandSelect" class="form-select">
                <option value="">All Brands</option>
            </select>
        </div>
        <div class="filters mb-3">
            <label>
                <input type="checkbox" id="withDiscountCheckbox"> Con sconto
            </label>
            <label>
                <input type="checkbox" id="withoutDiscountCheckbox"> Senza sconto
            </label>
        </div>
        <div class="mb-3">
            <label for="priceRangeSelect">Price Range:</label>
            <select id="priceRangeSelect"></select>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Type</th>
                    <th scope="col">Strap</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">
                        <a id="sortDiscountedPrice" class="btn btn-outline-secondary">Discounted price</a>
                    </th>

                    <th scope="col">
                        <a class="btn btn-outline-success" href="./create.php">Add a new watch</a>
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
                            <a class='btn btn-outline-info' href='show.php?index=<?php echo $index ?>'>Show</a>
                            <a class='btn btn-outline-warning' href='update.php?index=<?php echo $index ?>'>Update</a>
                            <form class="d-inline" action="delete.php" method="POST">
                                <input type="hidden" name="index" value="<?php echo $index ?>">
                                <button class='btn btn-outline-danger' onclick="confirmDelete(event)">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<script src="./JS/filtering.js"></script>
<?php include_once 'partials/footer.php' ?>
