<?php
include_once 'partials/header.php';
require_once __DIR__ . '/watches/watches.php';
if (!isset($_GET['index'])) {
    include 'partials/not-found.php';
    exit;
}
$watchIndex = $_GET['index'];
$watch = getWatchByindex($watchIndex);
if (!$watch) {
    include 'partials/not-found.php';
    exit;
}
?>
<main>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h2>
                    <?php echo $watch['brand'] . ' - ' . $watch['model']; ?>
                </h2>
            </div>
            <div class="card-body">
                <p class="card-text">
                    <?php echo $watch['description']; ?>
                </p>
                <p class="card-text">
                    <?php echo 'Type: ' . $watch['type'] . ' - ' . 'Strap: ' . $watch['strap']; ?>
                </p>
                <p class="card-text discount">
                    <?php
                    if ($watch['discount'] !== 0) {
                        echo 'Price: ' . $watch['price'] . ' - ' . 'Discount: ' . $watch['discount'] . '&percnt;';
                    } else {
                        echo 'Price: ' . $watch['price'] . ' - ' . 'Discount: ' . $watch['discount'];
                    }
                    ?>
                </p>
                <p class="card-text">
                    <?php
                    $discountedPrice = round($watch['price'] - ($watch['price'] * $watch['discount'] / 100), 2);
                    echo 'Discounted price: ' . $discountedPrice;
                    ?>
                </p>
            </div>
            <div class="card-footer text-body-secondary">
                <a href="./update.php?index=<?php echo $watchIndex ?>" class="btn btn-outline-warning">Update</a>
                <form class="d-inline" action="delete.php" method="POST">
                    <input type="hidden" name="index" value="<?php echo $watchIndex ?>">
                    <button class='btn btn-outline-danger' onclick="confirmDelete(event)">Delete</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include_once 'partials/footer.php' ?>