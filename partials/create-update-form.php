<main>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="mb-3">
                    <h3>
                        <?php if (!isset($watchIndex)): ?>
                            <?php echo 'Create a new watch' ?>
                        <?php else: ?>
                            <?php echo 'Update watch' ?>
                            <a class='btn btn-outline-info' href='show.php?index=<?php echo $watchIndex ?>'>Show</a>
                        <?php endif; ?>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $watch['brand'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="model" name="model" value="<?php echo $watch['model'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label" >Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"><?php echo $watch['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $watch['price'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="number" step="0.01" class="form-control" id="discount" name="discount" value="<?php echo $watch['discount'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $watch['type'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="strap" class="form-label">Strap</label>
                        <input type="text" class="form-control" id="strap" name="strap" value="<?php echo $watch['strap'] ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>