#!/usr/bin/php
<?php

$workers = json_decode(file_get_contents("workers.json"));
$keywords_show = stripos($argv[1], "keyword");

echo "It's my workers list:\n";
foreach($workers as $number => $worker) {
    echo "\t" . $number+1 . ". " . $worker->name . "\n";
    if ($keywords_show) {
        foreach($worker->keywords as $number => $keyword)  {
            echo "\t\t" . $number+1 . ". " . $keyword . "\n";
        }
    }
}