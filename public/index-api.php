<?php
require __DIR__ . '/../app/vendor/autoload.php';

use controller\FrontController;

$controller = new FrontController();
$controller->route();
