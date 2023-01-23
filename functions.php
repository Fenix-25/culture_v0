<?php
if (!session_id()) {
    session_start();
}
require_once 'vendor/autoload.php';
require_once 'app/helpers.php';
require_once 'app/createCulture.php';
require_once 'app/createOrder.php';
require_once 'app/deleteCulture.php';
require_once 'app/registration.php';
require_once 'app/authentication.php';
require_once 'app/select.php';
require_once 'app/profile.php';




