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
                            <form class="d-inline" action="delete.php" method="POST">
                                <input type="hidden" name="index" value="<?php echo $watchIndex ?>">
                                <button class='btn btn-outline-danger' onclick="confirmDelete(event)">Delete</button>
                            </form>
                        <?php endif; ?>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control <?php echo $errors['brand'] ? 'is-invalid' : '' ?>" id="brand" name="brand" value="<?php echo $watch['brand'] ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['brand'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control <?php echo $errors['model'] ? 'is-invalid' : '' ?>" id="model" name="model" value="<?php echo $watch['model'] ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['model'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label" >Description</label>
                        <textarea class="form-control <?php echo $errors['description'] ? 'is-invalid' : '' ?>" id="description" name="description" rows="4"><?php echo $watch['description'] ?></textarea>
                        <div class="invalid-feedback">
                            <?php echo $errors['description'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control <?php echo $errors['price'] ? 'is-invalid' : '' ?>" id="price" name="price" value="<?php echo $watch['price'] ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['price'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="number" min="0" max="100" class="form-control <?php echo $errors['discount'] ? 'is-invalid' : '' ?>" id="discount" name="discount" value="<?php echo $watch['discount'] ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['discount'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control <?php echo $errors['type'] ? 'is-invalid' : '' ?>" id="type" name="type" value="<?php echo $watch['type'] ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['type'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="strap" class="form-label">Strap</label>
                        <input type="text" class="form-control <?php echo $errors['strap'] ? 'is-invalid' : '' ?>" id="strap" name="strap" value="<?php echo $watch['strap'] ?>">
                        <div class="invalid-feedback">
                            <?php echo $errors['strap'] ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>