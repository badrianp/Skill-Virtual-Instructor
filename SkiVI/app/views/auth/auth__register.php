<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Virtual Instructor</title>
    <link rel="stylesheet" href="<?= $data['syntax'] ?>css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="<?= $data['syntax'] ?>js/register.js" async></script>

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

        <form class="credentials-form" id="register-form" name="register-form" method="POST" action="<?= $data['syntax'] ?>auth/register">

            <div class="input-div">

                <label class="input-label" for="register-email">
                    <span>Email:</span>
                    <input type="email" name="email" class="input-area" id="register-email" required placeholder="email@example.dd">
                </label>

                <label class="input-label" for="register-full-name">
                    <span>Full Name:</span>
                    <input type="text" name="name" class="input-area" id="register-full-name" required placeholder="John Snow">
                </label>

                <label class="input-label" for="register-username">
                    <span>Username:</span>
                    <input type="text" name="username" class="input-area" id="register-username" required placeholder="userName">
                </label>

                <label class="input-label" for="register-password">
                    <span>Password:</span>
                    <input type="password" name="password" class="input-area" id="register-password" required placeholder="password">
                    <i class="far fa-eye-slash" id="register-view-password"></i>
                </label>
            </div>

            <div class="buttons-div">

                <label for="register-form-button">
                    <button class="form-button" id="register-form-button" form="register-form" type="submit">Register</button>
                </label>
                <span>or</span>
                <label for="request-login">
                    <button class="form-button" id="request-login" type="button" onclick="goToLogin(`<?= $data['syntax'] ?>`)">Login</button>
                </label>
            </div>
        </form>
    </div>

</body>

</html>