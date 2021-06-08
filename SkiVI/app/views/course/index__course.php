<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Virtual Instructor</title>
    <link rel="stylesheet" href="<?= $data['syntax'] ?>css/courses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="logo">
        Learn easily for your own good
    </div>

    <div class="navbar" id="navMenu">
        <a href="<?= $data['syntax'] ?>home">Home</a>
        <a href="<?= $data['syntax'] ?>course" class="current">Courses</a>
        <a href="<?= $data['syntax'] ?>proposal">Propose a Course</a>
        <a href="<?= $data['syntax'] ?>feedback">Feedback</a>
        <a href="<?= $data['syntax'] ?>login" class="button--login">Log In</a>
        <a href="javascript:void(0);" class="menu--icon" onclick="openNavMenu()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="search-bar">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit"><i class="fa fa-search"></i></button>
        <button id="DIY">DIY</button>
        <button id="Educational">Educational</button>
        <button id="Music">Music</button>
        <button id="Medical">Medical</button>
        <button id="Relaxation">Relaxation</button>
    </div>

    <div class="side-div">
        <input class="search-courses" placeholder="search category.." type="search" name="search-courses" id="search-courses">
        <hr class="line-separator">

        <a class="category-button" id="diy"> D I Y </a>
        <a class="category-button" href="<?= $data['syntax'] ?>course/category/instruments" id="instruments">Instruments</a>
        <a class="category-button" href="<?= $data['syntax'] ?>course/category/lifesaving" id="lifesaving">Lifesaving</a>
        <a class="category-button" href="<?= $data['syntax'] ?>course/category/educational" id="educational">Educational</a>
        <a class="category-button" href="<?= $data['syntax'] ?>course/category/relaxation" id="relaxation">Relaxation</a>

        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
        <a class="category-button" href="course/index/">scroll-material</a>
    </div>

    <main>
        <div class="content-div">

            <div class="course-div origami hide" id="origami">
                <h4 class="course-title">Learn how to make a crane - Origami Lesson</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/origami.jpg" alt="Origami.jpg"></a>
                <h4 class="course-author">Michael Scofield</h4>
            </div>

            <div class="course-div hide" id="harpischord">
                <h4 class="course-title">Let's play the Harpischord</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/clavecina.jpg" alt="Harpischord.jpg"></a>
                <h4 class="course-author">Theodor "T-BAG" Bagwell</h4>
            </div>
            <div class="course-div origami hide" id="origami2">
                <h4 class="course-title">Learn how to make a crane - Origami Lesson</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/origami.jpg" alt="Origami.jpg"></a>
                <h4 class="course-author">Michael Scofield</h4>
            </div>

            <div class="course-div hide" id="harpischord2">
                <h4 class="course-title">Let's play the Harpischord</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/clavecina.jpg" alt="Harpischord.jpg"></a>
                <h4 class="course-author">Theodor "T-BAG" Bagwell</h4>
            </div>
            <div class="course-div hide" id="cpr">
                <h4 class="course-title">Learn the basics of CPR</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/cpr.jpg" alt="CPR.jpg"></a>
                <h4 class="course-author">Sara Tancredi</h4>
            </div>
            <div class="course-div hide" id="cpr2">
                <h4 class="course-title">Learn the basics of CPR</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/cpr.jpg" alt="CPR.jpg"></a>
                <h4 class="course-author">Sara Tancredi</h4>
            </div>

            <div class="course-div origami hide" id="origami3">
                <h4 class="course-title">Learn how to make a crane - Origami Lesson</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/origami.jpg" alt="Origami.jpg"></a>
                <h4 class="course-author">Michael Scofield</h4>
            </div>

            <div class="course-div hide" id="harpischord3">
                <h4 class="course-title">Let's play the Harpischord</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/clavecina.jpg" alt="Harpischord.jpg"></a>
                <h4 class="course-author">Theodor "T-BAG" Bagwell</h4>
            </div>
            <div class="course-div origami hide" id="origami4">
                <h4 class="course-title">Learn how to make a crane - Origami Lesson</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/origami.jpg" alt="Origami.jpg"></a>
                <h4 class="course-author">Michael Scofield</h4>
            </div>

            <div class="course-div hide" id="harpischord4">
                <h4 class="course-title">Let's play the Harpischord</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/clavecina.jpg" alt="Harpischord.jpg"></a>
                <h4 class="course-author">Theodor "T-BAG" Bagwell</h4>
            </div>
            <div class="course-div hide" id="cpr3">
                <h4 class="course-title">Learn the basics of CPR</h4>
                <a href="<?= $data['syntax'] ?>course/example"><img class="course-image" src="<?= $data['syntax'] ?>Images/cpr.jpg" alt="CPR.jpg"></a>
                <h4 class="course-author">Sara Tancredi</h4>
            </div>
        </div>

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

    <script src="<?= $data['syntax'] ?>js/navbar.js"></script>
    <script src="<?= $data['syntax'] ?>js/categoryDemo.js"></script>
</body>

</html>