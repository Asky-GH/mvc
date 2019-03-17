<?php

require 'imports.php';
require 'routes.php';

session_start();

if (! isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = password_hash(time(), PASSWORD_BCRYPT);
}

Router::dispatch();
