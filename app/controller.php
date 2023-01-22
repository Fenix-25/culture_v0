<?php
match (getRequestType()) {
    //authentication
    'login' => authentication($_POST),
    //registration
    'register' => registration($_POST),
    //profile
    'profileUpdate' => profileUpdate($_POST),
    //create note
    'create' => createNote($_POST),
    //delete note
    'delete' => deleteNote($_POST['noteId']),
    //logout
    'logout' => remUserSes(),
    default => '',
};

//open single note
if (!empty($_GET['id'])) {
    $note = singleNote( $_GET['id']);
    rdrCondition($_SESSION['user']['id'] !== $note['user_id'], '/home');
}
