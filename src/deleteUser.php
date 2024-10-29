<?php
define('BASE_PATH', __DIR__);

require_once BASE_PATH . '/controllers/UserController.php';

$controller = new UserController();
$controller->deleteUser();