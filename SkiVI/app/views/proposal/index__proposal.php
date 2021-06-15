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
            <h1>Hello there!</h1>
            <p>In this page you can propose a course to be added in our application by completing the following form.</p>
            <p>In order to make the process of adding your courses and lessons easier, please attach a PDF, MP4 or any other type of file that could help us decide if your proposal is worth adding to our application</p>
        </section>
        <div class="proposal">
            <form method="POST" action="proposal/send_proposal_mail" enctype="multipart/form-data">
                <label for="author_name"> * Tell us your name</label><br>
                <input type="text" id="author_name" name="author_name" placeholder="Your name" required><br>
                <label for="author_email"> * Please add an email with which we could contact you</label><br>
                <input type="email" id="author_email" name="author_email" placeholder="email@domain" required>
                <p> * Choose if you wish to propose a full course or a single lesson</p>
                <br>
                <input type="radio" id="course" name="type" value="Course" required><label for="course">Course</label><br>
                <input type="radio" id="lesson" name="type" value="Lesson"><label for="lesson">Lesson</label><br><br>
                <label for="proposal_name"> * Tell us the name of your proposal</label><br>
                <input type="text" id="proposal_name" name="proposal_name" placeholder="Proposal name" required><br>
                <label for="labels"> * Add some labels for your proposal</label><br>
                <input type="text" id="labels" name="labels" placeholder="Educational, DIY, ..." required><br>
                <label for="splash_art"> * Choose the splash_art picture for your proposal</label><br>
                <input type="file" id="splash_art" name="splash_art" accept="image/png, image/jpeg" required><br>
                <label for="annex"> Add something to help us decide if your proposal is worthy to be added to our application</label>
                <input type="file" id="annex" name="annex" required><br>
                <label for="description"> * Add a short description about your proposal</label><br><br>
                <textarea id="description" name="description" rows="5" cols="50" placeholder="Add description..." required></textarea>
                <button type="submit" name="submit">Submit proposal</button>
            </form>
        </div>
        <div class="contact">
            <p>If you wish to contact us you can do so using our
                <br>Email Adress: email_adress@site.domain
                <br>Phone Number: number
            </p>
        </div>
        <div class="copyright">
            <p>Copyright: All rights reserved for Gheorghita Razvan_Daniel, Bleoju Adrian</p>
        </div>
    </main>

    <footer>
    </footer>
</body>

</html>