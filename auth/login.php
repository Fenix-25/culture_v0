<link rel="stylesheet" href="./assets/signin.css">
<main class="form-signin w-100 m-auto">
    <form method="post" action="/">
        <input type="hidden" name="type" value="login">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <br>
        or <a href="/register">Register new account</a>
    </form>
</main>
