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

}

function updateWatch ($data, $id) {
    $watch = getWatchById ($id);
    $updatedWatch = array_merge($watch, $data);
    $watches = getWatches();
    $watches[$id] = $updatedWatch;
    file_put_contents(__DIR__.'/../db/db-watches.json', json_encode($watches, JSON_PRETTY_PRINT));
}

function deleteWatch ($id) {

}