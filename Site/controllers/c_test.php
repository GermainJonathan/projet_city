<?php

require_once PATH_MODELS.'testDAO.php';

$test = new testDAO(DEBUG);
$testBDD = $test->testBDD();

require_once PATH_VIEWS.'test.php';