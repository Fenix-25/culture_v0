<link rel="stylesheet" href="../assets/signin.css">

<form method="post" action="/" class="form-signin">
    <input type="hidden" name="type" value="register">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="d-flex">
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Surname" name="surname">
            <label for="floatingInput">Surname</label>
        </div>
    </div>
    <div class="d-flex">
        <div class="form-floating">
            <input type="tel" class="form-control" id="floatingInput" placeholder="Phone" name="phone">
            <label for="floatingInput">Phone</label>
        </div>
        <div class="form-floating">
            <input type="number" class="form-control" id="floatingInput" placeholder="Square" step="0.01"
                   name="square">
            <label for="floatingInput">Square</label>
        </div>
    </div>
    <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password"
               name="confirmPassword">
        <label for="confirmPassword">Confirm Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign-up</button>
    <br>
    already have account? <a href="/login">Login</a>
</form>
