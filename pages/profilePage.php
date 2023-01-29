<form action="/" method="post" class="form-control-plaintext">
    <input type="hidden" name="type" value="profileUpdate">
    <div class="row">
        <label>Name:
            <input class="form-control-plaintext" type="text" readonly value="<?= $_SESSION['user']['name'] ?>"
                   name="name">
        </label>
    </div>
    <div class="row">
        <label>Email:
            <input class="form-control-plaintext" type="email" readonly value="<?= $_SESSION['user']['email'] ?>"
                   name="email">
        </label>
    </div>
    <div class="row">
        <label>Your old password:
            <input type="password" name="oldPassword">
        </label>
    </div>
    <div class="row">
        <label>New password:
            <input type="password" name="newPassword">
        </label>
    </div>
    <div class="row">
        <label>Confirm password:
            <input type="password" name="confirmPassword">
        </label>
    </div>

    <button class="btn btn-primary" type="submit"> Save</button>

</form>
