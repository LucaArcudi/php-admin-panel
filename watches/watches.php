<?php

function getWatches () {
    $jsonData = file_get_contents(__DIR__.'/../db/db-watches.json');
    $watches = json_decode($jsonData, true);
    return $watches;
}

function getWatchByIndex ($index) {
    $watches = getWatches();
    if (array_key_exists($index, $watches)){
        return $watches[$index];
    }
    return null;
}

function createWatch ($data) {
    $watches = getWatches();
    $watches[] = $data;
    updateJson($watches);
    return $data;
}

function updateWatch ($data, $index) {
    $watch = getWatchByIndex ($index);
    $updatedWatch = array_merge($watch, $data);
    $watches = getWatches();
    $watches[$index] = $updatedWatch;
    updateJson($watches);
}

function deleteWatch ($index) {
    $watches = getWatches();
    array_splice($watches, $index, 1);
    updateJson($watches);
}

function updateJson($watches) {
    file_put_contents(__DIR__.'/../db/db-watches.json', json_encode($watches, JSON_PRETTY_PRINT));
}