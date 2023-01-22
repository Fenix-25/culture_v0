<?php
require_once 'vendor/autoload.php';
require_once 'app/PDO_Connect.php';
require_once 'functions.php';

if (!empty($_POST)){
    require_once 'app/controller.php';
}else{
    require_once 'parts/header.php';
    require_once 'app/redirect.php';
    require_once 'parts/footer.php';
}