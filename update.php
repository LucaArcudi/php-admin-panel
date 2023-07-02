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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updateWatch($_POST, $watchIndex);
        header('Location: index.php');
    }

?>


<?php include './partials/create-update-form.php' ?>


<?php include 'partials/footer.php'?>