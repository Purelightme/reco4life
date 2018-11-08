<?php

require_once __DIR__ .'/../src/Reco4life.php';

$reco = new Purelightme\Reco4life('','');

$reco->batchItemSwitch(['token' => 1],['token' => 1],['token' => 1]);