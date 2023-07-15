#!/usr/bin/php
<?php

if (stripos($argv[1], "date") && stripos($argv[1], "time")) {
    echo "Now is ";
    echo date("Y/m/d h:i:s") . "\n";
}
else if (stripos($argv[1], "date")) {
    echo "Today is ";
    echo date("Y/m/d") . "\n";
}
else {
    echo "Time is ";
    echo date("h:i:s") . "\n";
}