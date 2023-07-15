#!/usr/bin/php
<?php

echo "Now, time is ";
if (stripos($argv[1], "date")) {
    echo date("Y/m/d ");
}
echo date("h:i:s") . "\n";