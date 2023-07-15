#!/usr/bin/php
<?php

// find words
$words = $argv;
unset($words[0]);

// get workers list
try {
    $workerList = json_decode(file_get_contents("workers.json"));
}
catch (\Exception $e) {
    echo "Loading workers list failed\n";
    die;
}

// scoring workers
$scores = [];
foreach($workerList as $worker) {
    $score = 0;
    foreach($worker->keywords as $keyword) {
        if(array_search($keyword, $words)) { $score++; }
    }
    $scores[$worker->name] = $score;
}

// find highest score
$highest_name = "";
$highest_score = 0;
foreach($scores as $name => $score) {
    if ($score > $highest_score) {
        $highest_name = $name;
        $highest_score = $score;
    }
    else if ($highest_score != 0 && $score == $highest_score) {
        echo "Please enter a better command\n";
        die;
    }
}

// check command is defined
if ($highest_name === "" && $highest_score === 0) {
    echo "Sorry, cannot do this work\nYou can create or install a worker for this work\n";
    die;
}

// execute worker
$args = join(" ", $words);
system("./workers/$highest_name '$args'");