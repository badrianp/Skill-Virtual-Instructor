<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Virtual Instructor</title>
    <link rel="stylesheet" href="<?= $data['syntax'] ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="<?= $data['syntax'] ?>js/navbar.js" async></script>

</head>

<body>
    <header>
    </header>



    <div class="logo">
        Learn easily for your own good
    </div>

    <main>
        <div class="navbar" id="navMenu">
            <a href="<?= $data['syntax'] ?>home">Home</a>
            <a href="<?= $data['syntax'] ?>course">Courses</a>
            <a href="<?= $data['syntax'] ?>proposal" class="current">Propose a Course</a>
            <a href="<?= $data['syntax'] ?>feedback">Feedback</a>
            <a href="<?= $data['syntax'] ?>auth" class="button--login"><?= (isset($_SESSION['username']) ? ("Log Out") : ("Log In")) ?></a>
            <a href="javascript:void(0);" class="menu--icon" onclick="openNavMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <section class="informations">
            <h1>There was a problem while trying to upload your attachments in your proposal. Please try again later.</h1>
            <p>If this problem persists, please contact us directily via email.</p>
        </section>
        <div class="contact">
            <p>If you wish to contact us you can do so using our
                <br>Email Adress: email_adress@site.domain
                <br>Phone Number: number
            </p>
        </div>
        <div class="copyright">
            <p>Copyright: All rights reserved for Gheorghita Razvan-Daniel, Bleoju Adrian</p>
        </div>
    </main>

    <footer>
    </footer>
</body>

</html>