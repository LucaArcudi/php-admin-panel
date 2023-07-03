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

        $isValid = validateWatch($watch, $errors);
        
    }

?>


<?php include_once './partials/create-update-form.php' ?>


<?php include_once 'partials/footer.php'?>

