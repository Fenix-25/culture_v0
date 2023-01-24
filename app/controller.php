<?php
match (getRequestType()) {
    //authentication
    'login' => authentication($_POST),
    //registration
    'register' => registration($_POST),
    //logout
    'logout' => remUserSes(),
    'profileUpdate' => profileUpdate($_POST),
    'createCulture' => createCulture($_POST),
    'createOrder' => createOrder($_POST),
    'deleteCulture' => deleteCulture($_POST['cultureId']),
    'deleteUser' => deleteUser($_POST['userId']),
    'deleteSquare' => deleteSquare($_POST),
    default =>  ""
};