<?php

namespace Culture;

if (!session_id()) {
    session_start();
}
require_once 'vendor/autoload.php';
require_once 'app/PDO_Connect.php';

if (!empty($_POST)) {
    Controller::route(Helper::getRequestType());
} else {
    require_once 'views/parts/header.php';
    require_once 'app/Route.php';
    require_once 'views/parts/footer.php';
}