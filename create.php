<?php

include_once __DIR__ . '/read.php';

$newWatch = [];

if (empty($newWatch)) {
    if (!empty($_POST['brand'])) {
        $newWatch['brand'] = $_POST['brand'];
    } else {
        header("Location: create-view.php");
        exit;
    }
    if (!empty($_POST['model'])) {
        $newWatch['model'] = $_POST['model'];
    } else {
        header("Location: create-view.php");
        exit;
    }
    if (!empty($_POST['description'])) {
        $newWatch['description'] = $_POST['description'];
    } else {
        header("Location: create-view.php");
        exit;
    }
    if (!empty($_POST['price'])) {
        $newWatch['price'] = $_POST['price'];
    } else {
        header("Location: create-view.php");
        exit;
    }
    if (!empty($_POST['discount'])) {
        $newWatch['discount'] = $_POST['discount'];
    } else {
        header("Location: create-view.php");
        exit;
    }
    if (!empty($_POST['type'])) {
        $newWatch['type'] = $_POST['type'];
    } else {
        header("Location: create-view.php");
        exit;
    }
    if (!empty($_POST['strap'])) {
        $newWatch['strap'] = $_POST['strap'];
    } else {
        header("Location: create-view.php");
        exit;
    }  
}

if (!empty($newWatch)) {
    $watches[] = $newWatch;
    $newWatches = json_encode($watches);
    file_put_contents('./db/db-watches.json', $newWatches);
    header("Location: index.php");
    exit;
}

