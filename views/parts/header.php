<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Culture App</title>
</head>
<body>
<?php use Culture\Controller;

if (!empty($_SESSION['user'])): ?>
<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-end justify-content-lg-end">
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small align-items-center">
                    <?php if (!$_SESSION['user']['isAdmin']): ?>
                        <li>
                            <a href="/home"
                               class="nav-link <?= Controller::getUrl() == 'home' ? "text-secondary" : "text-white" ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-house d-block mx-auto mb-1" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                                </svg>
                                Home
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="/dashboard"
                               class="nav-link <?= Controller::getUrl() == 'dashboard' ? "text-secondary" : "text-white" ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-speedometer2 d-block mx-auto mb-1" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                    <path fill-rule="evenodd"
                                          d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="/fertilize"
                               class="nav-link <?= Controller::getUrl() == 'fertilize' ? "text-secondary" : "text-white" ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-bag d-block mx-auto mb-1" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                </svg>
                                Fertilize
                            </a>
                        </li>
                        <li>
                            <a href="/orders"
                               class="nav-link <?= Controller::getUrl() == 'orders' ? "text-secondary" : "text-white" ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-table d-block mx-auto mb-1" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                </svg>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="/allData"
                               class="nav-link <?= Controller::getUrl() == 'allData' ? "text-secondary" : "text-white" ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-grid d-block mx-auto mb-1" viewBox="0 0 16 16">
                                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                                </svg>
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="/customers"
                               class="nav-link <?= Controller::getUrl() == 'customers' ? "text-secondary" : "text-white" ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-person-circle d-block mx-auto mb-1" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd"
                                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                Customers
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="dropdown text-end">
                        <a href="#" class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                           aria-expanded="true">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                 class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" data-popper-placement="bottom-start"
                            style="position: absolute; inset: 0 auto auto 0; margin: 0; transform: translate(0px, 34px);">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/" method="post">
                                    <input type="hidden" name="type" value="logout">
                                    <input class="dropdown-item" type="submit" value="Sign out">
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (empty($_SESSION['user'])): ?>
        <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-end">
                <div class="text-end">
                    <?php if (Controller::getUrl() == "login" xor empty($_SESSION['user'])): ?>
                        <a href="/login" class="btn btn-light text-dark me-2">Login</a>
                    <?php endif; ?>
                    <?php if (Controller::getUrl() == "register" xor empty($_SESSION['user'])): ?>
                        <a href="/register" class="btn btn-primary">Sign-up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</header>
<div class="container-fluid">
    <div class="row">
        <?php if (!empty($_SESSION['user'])): ?>
        <?php if ($_SESSION['user']['isAdmin']): ?>
        <?php require_once 'views/parts/nav.php' ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php endif; ?>
            <?php else: ?>
            <main class="col-md-12">
                <?php endif; ?>


