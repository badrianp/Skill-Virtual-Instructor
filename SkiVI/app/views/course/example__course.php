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
    <script src="<?= $data['syntax'] ?>js/lesson.js" async></script>
</head>

<body>
    <header>
    </header>

    <?php
    session_start();
    ?>

    <div class="logo">
        Learn easily for your own good
    </div>

    <main>
        <div class="navbar" id="navMenu">
            <a href="<?= $data['syntax'] ?>home">Home</a>
            <a href="<?= $data['syntax'] ?>course" class="current">Courses</a>
            <a href="<?= $data['syntax'] ?>proposal">Propose a Course</a>
            <a href="<?= $data['syntax'] ?>feedback">Feedback</a>
            <a href="<?= $data['syntax'] ?>auth" class="button--login"><?= (isset($_SESSION['username']) ? ("Log Out") : ("Log In")) ?></a>
            <a href="javascript:void(0);" class="menu--icon" onclick="openNavMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <section class="learning">
            <h1>Learn how to make a paper crane - Origami lesson</h1>
            <div class="splash-art">
                <img src="<?= $data['syntax'] ?>Images/origami.jpg" alt="Origami.jpg">
            </div>
            <div class="course-description">
                A simple and easy to follow lesson that will teach you how to create a paper crane using origami, the art of paper folding, which is often associated with Japanese culture.
            </div>
            <div class="course-details">
                <i class="fa fa-clock"><span>30 Min.</span></i>
                <br>
                <i class="fa fa-brain"><span>Begginer</span></i>
                <br>
                <i class="fa fa-puzzle-piece"><span>2 Parts</span></i>
                <br>
                <i class="fa fa-paint-brush"><span>No prior experience needed</span></i>
            </div>
            <h1>Lesson parts:</h1>
            <div class="course-parts">
                <div class="part">
                    <img class="lesson--image" id="lesson_image_1" src="<?= $data['syntax'] ?>Images/origami.jpg" alt="Origami.jpg">
                    <div id="lesson_1" class="modal--part">
                        <span class="close--button">&times;</span>
                        <h1>Aici vor fi poze/informatii/video-uri pentru lectia 1</h1>
                    </div>
                </div>
                <div class="part">
                    <img class="lesson--image" id="lesson_image_2" src="<?= $data['syntax'] ?>Images/Origami2.jpg" alt="Origami2.jpg">
                    <div id="lesson_2" class="modal--part">
                        <span class="close--button">&times;</span>
                        <h1>Aici vor fi poze/informatii/video-uri pentru lectia 2</h1>
                    </div>
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