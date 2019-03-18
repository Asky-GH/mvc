<?php

require 'vendor/autoload.php';
require 'routes.php';

use Core\Router;

session_start();

if (! isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = password_hash(time(), PASSWORD_BCRYPT);
}

Router::dispatch();
