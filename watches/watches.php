<?php

function getWatches () {
    $jsonData = file_get_contents(__DIR__.'/../db/db-watches.json');
    $watches = json_decode($jsonData, true);
    return $watches;
}

function getWatchById ($id) {
    $watches = getWatches();
    if (array_key_exists($id, $watches)){
        return $watches[$id];
    }
    return null;
}

function createWatch ($data) {
    $watches = getWatches();
    $watches[] = $data;
    updateJson($watches);
    return $data;
}

function updateWatch ($data, $id) {
    $watch = getWatchById ($id);
    $updatedWatch = array_merge($watch, $data);
    $watches = getWatches();
    $watches[$id] = $updatedWatch;
    updateJson($watches);
}

function deleteWatch ($id) {

}

function updateJson($watches) {
    file_put_contents(__DIR__.'/../db/db-watches.json', json_encode($watches, JSON_PRETTY_PRINT));
}