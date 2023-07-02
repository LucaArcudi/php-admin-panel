<?php
    include 'partials/header.php';
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $watch = createWatch($_POST);
        header('Location: index.php');
    }

?>


<?php include './partials/create-update-form.php' ?>


<?php include 'partials/footer.php'?>

