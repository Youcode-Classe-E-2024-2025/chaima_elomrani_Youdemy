<?php

include_once "config/helper.php";
// include_once "controllers/UserController.php";
include_once "config/connexion.php";
require_once "core/Router.php";

$router = new Router();

$router->action();
$router->view();

