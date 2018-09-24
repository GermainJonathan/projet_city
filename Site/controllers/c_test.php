<?php

require_once PATH_MODELS.'testDAO.php';

$test = new testDAO(DEBUG);
$testBDD = $test->testBDD();

echo $testBDD[0][0];
echo $testBDD[0][1];
echo $testBDD[0][2];
