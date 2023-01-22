<?php
if (!session_id()) {
    session_start();
}
require_once 'vendor/autoload.php';
require_once 'app/helpers.php';
require_once 'app/createNote.php';
require_once 'app/singleNote.php';
require_once 'app/deleteNote.php';
require_once 'app/registration.php';
require_once 'app/authentication.php';
require_once 'app/selectUserNotes.php';
require_once 'app/profile.php';




