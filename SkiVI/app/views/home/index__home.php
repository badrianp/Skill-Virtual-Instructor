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
            <a href="<?= $data['syntax'] ?>home" class="current">Home</a>
            <a href="<?= $data['syntax'] ?>course">Courses</a>
            <a href="<?= $data['syntax'] ?>proposal">Propose a Course</a>
            <a href="<?= $data['syntax'] ?>feedback">Feedback</a>
            <a href="<?= $data['syntax'] ?>login" class="button--login">Log In</a>
            <a href="javascript:void(0);" class="menu--icon" onclick="openNavMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <section class="informations">
            <h1>Welcome to Skill Virtual Instructor!</h1>
            <p>This website's aim is to help you learn diverse niche skills such as origami, resuscitation procedures and even musical instruments.</p>
            <p>We selected a few courses made by trusted professionals, but you could always ask us to add new courses by pressing the "Propose a Course" button in the navigation menu and filling in the form</p>
            <p>Account registration is free, so give us a try! Don't forget to use the Feedback button to tell us how you feel about us!</p>
        </section>
        <section class="courses-gallery">
            <h1>We trust our teachers to give you the best learning experience</h1>
            <p>Each course is made by trusted individuals that prooved to have exensive knowledge about the topic it presents</p>
            <p>Here are some courses we think might interest you</p>
            <div class="gallery">
                <div class="image">
                    <a href="<?= $data['syntax'] ?>course/example">
                        <img src="<?= $data['syntax'] ?>Images/origami.jpg" alt="Origami.jpg">
                    </a>
                    <p class="description">Learn how to make a crane - Origami Lesson
                        <br> Author name
                    </p>
                </div>
                <div class="image">
                    <a href="<?= $data['syntax'] ?>course/example">
                        <img src="<?= $data['syntax'] ?>Images/clavecina.jpg" alt="Harpischord.jpg">
                    </a>
                    <p class="description">Let's play the Harpischord
                        <br> Author name
                    </p>
                </div>
                <div class="image">
                    <a href="<?= $data['syntax'] ?>course/example">
                        <img src="<?= $data['syntax'] ?>Images/cpr.jpg" alt="CPR.jpg">
                    </a>
                    <p class="description">Learn the basics of CPR
                        <br> Author name
                    </p>
                </div>
            </div>
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