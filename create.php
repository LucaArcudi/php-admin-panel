<?php
    include_once 'partials/header.php';
    require_once __DIR__.'/watches/watches.php';

    $watch = [
        'brand' => '',
        'model' => '',
        'description' => '',
        'price' => '',
        'discount' => '',
        'type' => '',
        'strap' => '',
    ];

    $errors = [
        'brand' => '',
        'model' => '',
        'description' => '',
        'price' => '',
        'discount' => '',
        'type' => '',
        'strap' => '',
    ];

    $isValid = true;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $watch = array_merge($watch, $_POST);

        if (!$watch['brand']) {
            $isValid = false;
            $errors['brand'] = 'Brand is required.';
        }

        if (!$watch['model']) {
            $isValid = false;
            $errors['model'] = 'Model is required.';
        }

        if (!$watch['description']) {
            $isValid = false;
            $errors['description'] = 'Description is required.';
        }

        if (!$watch['price']) {
            $isValid = false;
            $errors['price'] = 'Price is required.';
        }

        if ($watch['price'] && !preg_match('/^\d+(\.\d{1,2})?$/', $watch['price'])) {
            $isValid = false;
            $errors['price'] = 'Please provide a valid number with up to two decimal places.';
        }        

        if ($watch['discount'] && (!filter_var($watch['discount'], FILTER_VALIDATE_INT) || $watch['discount'] < 0 || $watch['discount'] > 100)) {
            $isValid = false;
            $errors['discount'] = 'Please provide a valid number between 0 and 100.';
        }        

        if (!$watch['type']) {
            $isValid = false;
            $errors['type'] = 'Type is required.';
        }

        if (!$watch['strap']) {
            $isValid = false;
            $errors['strap'] = 'Strap is required.';
        }

        if ($isValid) {
            // $watch['price'] = intval($watch['price']);
            // $watch['discount'] = floatval($watch['price']);            
            $watch = createWatch($_POST);
            header('Location: index.php');
        }
        
    }

?>


<?php include './partials/create-update-form.php' ?>


<?php include 'partials/footer.php'?>

