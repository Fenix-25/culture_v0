<?php

namespace Culture;

if (!session_id()) {
    session_start();
}
require_once 'vendor/autoload.php';
require_once 'app/PDO_Connect.php';

if (!empty($_POST)) {
    Route::routeRequest(Controller::getRequestType());
} else {
    require_once 'views/parts/header.php';
    require_once 'app/web.php';
    require_once 'views/parts/footer.php';
}