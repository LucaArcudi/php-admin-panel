<?php
    include_once 'partials/header.php';
    require_once __DIR__.'/watches/watches.php';
    if (!isset($_GET['index'])) {
        include 'partials/not-found.php';
        exit;
    }
    $watchIndex = $_GET['index'];
    $watch = getWatchByIndex($watchIndex);
    if (!$watch) {
        include 'partials/not-found.php';
        exit;
    }

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

        if ($isValid) {            
            updateWatch($_POST, $watchIndex);
            header('Location: index.php');
        }

    }

?>


<?php include_once './partials/create-update-form.php' ?>


<?php include_once 'partials/footer.php'?>