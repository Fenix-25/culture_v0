<?php
namespace Culture;
if (!session_id()) {
    session_start();
}
require_once 'vendor/autoload.php';
require_once 'app/PDO_Connect.php';
require_once 'functions.php';

if (!empty($_POST)){
    Controller::route(getRequestType());
}else{
    require_once 'views/parts/header.php';
    controller('Route');
    require_once 'views/parts/footer.php';
}