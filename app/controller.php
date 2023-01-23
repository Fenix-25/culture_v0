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
    'delete' => deleteCulture($_POST['noteId']),
    default => '',
};

//open single note
//if (!empty($_GET['id'])) {
//    $note = singleNote( $_GET['id']);
//    rdrCondition($_SESSION['user']['id'] !== $note['user_id'], '/home');
//}
