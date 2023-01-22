<?php require_once 'parts/header.php' ?>
<form action="/" method="post">
    <input type="hidden" name="type" value="register">
    <input type="text" name="name" placeholder="Name"> <br>
    <input type="text" name="surname" placeholder="SurName"> <br>
    <input type="tel" name="phone" placeholder="Phone"> <br>
    <input type="email" name="email" placeholder="Email"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <input type="password" name="confirmPassword" placeholder="Confirm Password"> <br>
    <button type="submit">Register</button>
    <br>
    already have account? <a href="/login">Login</a>
</form>
<?php require_once 'parts/footer.php' ?>