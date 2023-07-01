<?php

$jsonData = file_get_contents('./db/db-watches.json');

$watches = json_decode($jsonData, true);

