<form action="/" method="post">
    <input type="hidden" name="type" value="profileUpdate">
    Name: <br>
    <input type="text" value="<?= $_SESSION['user']['name'] ?>" name="name">
    <br>
    Email: <br>
    <input type="email" value="<?= $_SESSION['user']['email'] ?>" name="email">
    <br>
    Your old password: <br>
    <input type="password" name="oldPassword"> <br>
    New password:
    <br>
    <input type="password" name="newPassword"> <br>

    Confirm password:
    <br>
    <input type="password" name="confirmPassword"> <br>

    <button type="submit"> Save</button>

</form>
