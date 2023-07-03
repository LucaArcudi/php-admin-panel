<?php

function getWatches()
{
    $jsonData = file_get_contents(__DIR__ . '/../db/db-watches.json');
    $watches = json_decode($jsonData, true);
    return $watches;
}

function getWatchByIndex($index)
{
    $watches = getWatches();
    if (array_key_exists($index, $watches)) {
        return $watches[$index];
    }
    return null;
}

function createWatch($data)
{
    $watches = getWatches();
    $data['price'] = floatval($data['price']);
    $data['discount'] = intval($data['discount']);
    $watches[] = $data;
    updateJson($watches);
    return $data;
}

function updateWatch($data, $index)
{
    $watch = getWatchByIndex($index);
    $data['price'] = floatval($data['price']);
    $data['discount'] = intval($data['discount']);
    $updatedWatch = array_merge($watch, $data);
    $watches = getWatches();
    $watches[$index] = $updatedWatch;
    updateJson($watches);
}

function deleteWatch($index)
{
    $watches = getWatches();
    array_splice($watches, $index, 1);
    updateJson($watches);
}

function updateJson($watches)
{
    file_put_contents(__DIR__ . '/../db/db-watches.json', json_encode($watches, JSON_PRETTY_PRINT));
}

function validateWatch($watch, &$errors)
{

    $isValid = true;

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
        $watch = createWatch($_POST);
        header('Location: index.php');
    }

    return $isValid;
}
