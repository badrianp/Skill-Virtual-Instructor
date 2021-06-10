<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Virtual Instructor</title>
    <link rel="stylesheet" href="<?= $data['syntax'] ?>css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="<?= $data['syntax'] ?>js/login.js" async></script>
</head>

<body>

    <header class="header">
        <div class="header-div">
            <a class="home-icon" href="<?= $data['syntax'] ?>home">
                <span>Home</span>
            </a>
        </div>
    </header>

    <div class="main-div">

        <form class="credentials-form" id="login-form" name="login-form" method="POST" action="<?= $data['syntax'] ?>auth/login">

            <div class="input-div">

                <label class="input-label" for="login-username">
                    <span>Username/Email:</span>
                    <input type="text" name="username" class="input-area" id="username" required placeholder="username/email">
                </label>

                <label class="input-label" for="login-password">
                    <span>Password:</span>
                    <input type="password" name="password" class="input-area" id="password" required placeholder="password">
                    <i class="far fa-eye-slash" id="login-view-password"></i>
                </label>
            </div>

            <div class="buttons-div">

                <label for="login-form-button">
                    <button class="form-button" id="login-form-button" form="login-form" type="submit">Login</button>
                </label>
                <span>or</span>
                <label for="request-register">
                    <button class="form-button" id="request-register" type="button" onclick=goToRegister(`<?= $data['syntax'] ?>`)>Register Now</button>
                </label>
            </div>
        </form>

    </div>

</body>

</html>