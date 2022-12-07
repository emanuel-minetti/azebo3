<?php
require __DIR__ . '/../app/vendor/autoload.php';
use controller\IndexController;
$controller = new IndexController();
$controller->indexAction();
