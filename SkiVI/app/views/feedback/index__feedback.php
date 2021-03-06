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
            <a href="<?= $data['syntax'] ?>proposal">Propose a Course</a>
            <a href="<?= $data['syntax'] ?>feedback" class="current">Feedback</a>
            <a href="<?= $data['syntax'] ?>auth" class="button--login"><?= (isset($_SESSION['username']) ? ("Log Out") : ("Log In")) ?></a>
            <a href="javascript:void(0);" class="menu--icon" onclick="openNavMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <section class="informations">
            <h1>Hello there!</h1>
            <p>In this page you can give us feedback for our webpage in order to express how you feel about it. If this doesn't feel like enough you can tell us in the last part of the form or directly via email.</p>
            <p>The submit of the feedback might take a while, please be patient.</p>
        </section>
        <div class="feedback">
            <form method="POST" action="feedback/send_mail">
                <p> How do you feel about the general appearance of the website?</p>
                <input type="radio" id="a_dislike" name="appearance" value="dislike"><label for="a_dislike">Dislike</label><br>
                <input type="radio" id="a_partdislike" name="appearance" value="partdislike"><label for="a_partdislike">Partially dislike</label><br>
                <input type="radio" id="a_neutral" name="appearance" value="neutral"><label for="a_neutral">Neutral</label><br>
                <input type="radio" id="a_partlike" name="appearance" value="partlike"><label for="a_partlike">Partially like</label><br>
                <input type="radio" id="a_like" name="appearance" value="like"><label for="a_like">Like</label><br>
                <p> Do you like the way courses/lessons are presented to you?</p>
                <input type="radio" id="p_dislike" name="presentation" value="dislike"><label for="p_dislike">Dislike</label><br>
                <input type="radio" id="p_partdislike" name="presentation" value="partdislike"><label for="p_partdislike">Partially dislike</label><br>
                <input type="radio" id="p_neutral" name="presentation" value="neutral"><label for="p_neutral">Neutral</label><br>
                <input type="radio" id="p_partlike" name="presentation" value="partlike"><label for="p_partlike">Partially like</label><br>
                <input type="radio" id="p_like" name="presentation" value="like"><label for="p_like">Like</label><br>
                <p> Do you think there is enough diversity in our courses/lessons?</p>
                <input type="radio" id="d_disagree" name="diversity" value="disagree"><label for="d_disagree">Disagree</label><br>
                <input type="radio" id="d_partdisagree" name="diversity" value="partdisagree"><label for="d_partdisagree">Partially disagree</label><br>
                <input type="radio" id="d_neutral" name="diversity" value="neutral"><label for="d_neutral">Neutral</label><br>
                <input type="radio" id="d_partagree" name="diversity" value="partagree"><label for="d_partagree">Partially agree</label><br>
                <input type="radio" id="d_agree" name="diversity" value="agree"><label for="d_agree">Agree</label><br>
                <br><br>
                <label for="user_likes"> What do you like about our website?</label><br><br>
                <textarea id="user_likes" name="user_likes" rows="5" cols="50" placeholder="I really liked..."></textarea><br>
                <label for="user_dislikes"> What do you dislike about our website?</label><br><br>
                <textarea id="user_dislikes" name="user_dislikes" rows="5" cols="50" placeholder="I disliked..."></textarea><br>
                <label for="user_improvements"> What should we work on to improve your experience while using this website?</label><br><br>
                <textarea id="user_improvements" name="user_improvements" rows="5" cols="50" placeholder="I think..."></textarea><br>
                <label for="user_personal"> Anything else you would like to share with us?</label><br><br>
                <textarea id="user_personal" name="user_personal" rows="5" cols="50" placeholder="Hello..."></textarea>
                <button type="submit" name="submit">Submit feedback</button>
            </form>
        </div>
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