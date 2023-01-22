<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Note</title>
</head>
<body>
<?php if (!empty($_SESSION['user'])): ?>
    <div class="nav">
        <ul>
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="/createNote">Create note</a>
            </li>
            <li>
                <a href="/profile">Profile</a>
            </li>
            <li>
                <form action="/" method="post">
                    <input type="hidden" name="type" value="logout">
                    <input type="submit" value="Logout">
                </form>
        </ul>
    </div>
<?php endif; ?>
<div class="container">
    <div class="main">

