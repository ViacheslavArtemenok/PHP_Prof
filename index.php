<?php
include_once "Intelgood.php";
include_once "Singlegood.php";
include_once "Weightgood.php";
include_once "TestSingleton.php";
$showI = new Intelgood('Цифровой товар', '100', '10', '1');
$showS = new Singlegood('Штучный товар', '100', '10', '1');
$showW = new Weightgood('Весовой товар', '100', '10', '6'); ?>
<p><?= $showI->finalPrice(); ?></p>
<p><?= $showS->finalPrice(); ?></p>
<p><?= $showW->finalPrice(); ?></p>
<p><?= DB::getObject(DB::$obj)->select(); ?></p>