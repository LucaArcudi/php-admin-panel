<?php

include_once __DIR__ . '/read.php';

$newWatch = [];

if (empty($newWatch)) {
    if (!empty($_POST['brand'])) {
        $newWatch['brand'] = $_POST['brand'];
    } else {
        header("Location: create-view.php");
    }
    if (!empty($_POST['model'])) {
        $newWatch['model'] = $_POST['model'];
    } else {
        header("Location: create-view.php");
    }
    if (!empty($_POST['description'])) {
        $newWatch['description'] = $_POST['description'];
    } else {
        header("Location: create-view.php");
    }
    if (!empty($_POST['price'])) {
        $newWatch['price'] = $_POST['price'];
    } else {
        header("Location: create-view.php");
    }
    if (!empty($_POST['discount'])) {
        $newWatch['discount'] = $_POST['discount'];
    } else {
        header("Location: create-view.php");
    }
    if (!empty($_POST['type'])) {
        $newWatch['type'] = $_POST['type'];
    } else {
        header("Location: create-view.php");
    }
    if (!empty($_POST['strap'])) {
        $newWatch['strap'] = $_POST['strap'];
    } else {
        header("Location: create-view.php");
    }
}

$watches[] = $newWatch;
$newWatches = json_encode($watches);
file_put_contents('./db/db-watches.json', $newWatches);
header("Location: index.php");
var_dump($watches);



var_dump(empty($newWatch['brand']));
var_dump(empty($newWatch));
var_dump($newWatch);

var_dump(empty($_POST['brand']));
var_dump(empty($_POST));
var_dump($_POST);


// $newWatch = []; // Initialize an empty array
// var_dump($_POST);
// var_dump(isset($_POST));
// if (!isset($_POST)) {
//     echo 'asd';
//     $newWatch['brand'] = $_POST['brand'];
//     $newWatch['model'] = $_POST['model'];
//     $newWatch['description'] = $_POST['description'];
//     $newWatch['price'] = $_POST['price'];
//     $newWatch['discount'] = $_POST['discount'];
//     $newWatch['type'] = $_POST['type'];
//     $newWatch['strap'] = $_POST['strap'];
// } else {
//     // header("Location: ./create-view.php");
// }

// var_dump($newWatch);
// var_dump(empty($newWatch));


// if (!empty($newWatch)) {
//     $watches[] = $newWatch;
//     var_dump($watches);
// }