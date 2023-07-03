<?php
    require_once __DIR__.'/watches/watches.php';
    if (!isset($_POST['index'])) {
        include 'partials/not-found.php';
        exit;
    }
    $watchIndex = $_POST['index'];

    deleteWatch($watchIndex);
    header('Location: index.php');
