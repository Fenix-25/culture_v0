<?php require_once './parts/header.php' ?>
<form action="/" method="post">
    <input type="hidden" name="type" value="login">
    <input type="text" name="email" placeholder="Email"> <br>
    <input type="password" name="password" placeholder="password"> <br>
    <button type="submit">Login</button>
    <br>
    or <a href="/register">Register new account</a>
</form>
<?php require_once './parts/footer.php' ?>