<?php
    include 'partials/header.php';
    require_once __DIR__.'/watches/watches.php';
    if (!isset($_GET['id'])) {
        include 'partials/not-found.php';
        exit;
    }
    $watchId = $_GET['id'];
    $watch = getWatchById($watchId);
    if (!$watch) {
        include 'partials/not-found.php';
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updateWatch($_POST, $watchId);
        header('Location: index.php');
    }

?>


<?php include './partials/create-update-form.php' ?>


<?php include 'partials/footer.php'?>