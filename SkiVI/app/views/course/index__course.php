<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Virtual Instructor</title>
    <link rel="stylesheet" href="<?= $data['syntax'] ?>css/courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?= $data['syntax'] ?>js/navbar.js" async></script>
    <script src="<?= $data['syntax'] ?>js/courses.js" async></script>
</head>

<body onload="getCourses(`<?= $data['category'] ?>`, `<?= $data['syntax'] ?>`)">

    <div class="logo">
        Learn easily for your own good
    </div>

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

    <div class="search-bar">
        <!-- <input type="text" name="search" placeholder="Search...">
        <button type="submit"><i class="fa fa-search"></i></button> -->
        <button><a href="<?= $data['syntax'] ?>course/index/origami" id="origami">Origami</a></button>
        <button><a href="<?= $data['syntax'] ?>course/index/cpr" id="cpr">CPR</a></button>
        <button><a href="<?= $data['syntax'] ?>course/index/harpiscord" id="harpiscord">Harpiscord</a></button>
        <button><a href="<?= $data['syntax'] ?>course/index/survival" id="survival">Survival</a></button>
    </div>

    <div class="side-div">
        <!-- <input class="search-courses" placeholder="search category.." type="search" name="search-courses" id="search-courses">
        <hr class="line-separator"> -->
        <a class="category-button" href="<?= $data['syntax'] ?>course/index/origami" id="origami">Origami</a>
        <a class="category-button" href="<?= $data['syntax'] ?>course/index/cpr" id="cpr">CPR</a>
        <a class="category-button" href="<?= $data['syntax'] ?>course/index/harpiscord" id="harpiscord">Harpiscord</a>
        <a class="category-button" href="<?= $data['syntax'] ?>course/index/survival" id="survival">Survival</a>
    </div>

    <main>


    </main>


    <div class="contact">
        <p>If you wish to contact us you can do so using our
            <br>Email Adress: email_adress@site.domain
            <br>Phone Number: number
        </p>
    </div>

    <div class="copyright">
        <p>©Copyright: All rights reserved for Gheorghita Razvan-Daniel, Bleoju Adrian</p>
    </div>

</body>

</html>