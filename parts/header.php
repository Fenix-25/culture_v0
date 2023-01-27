<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="../assets/style.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Culture App</title>
</head>
<body>
<?php if (!empty($_SESSION['user'])): ?>
    <div class="nav">
        <ul>
            <li>
                <?php if ($_SESSION['user']['isAdmin']): ?>
                    <a href="admin">Home</a>
                <?php else: ?>
                    <a href="home">Home</a>
                <?php endif; ?>
            </li>
            <?php if ($_SESSION['user']['isAdmin']): ?>
                <li>
                    <a href="/createCulture">Create culture</a>
                </li>
                <li>
                    <a href="/createOrder">Create order</a>
                </li>
            <?php endif; ?>
            <!--            <li>-->
            <!--                <a href="/allData">All data</a>-->
            <!--            </li>-->
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
<div class="container-fluid">

