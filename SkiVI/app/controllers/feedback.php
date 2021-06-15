<?php

include_once "../app/models/auth.utils.php";

class Feedback extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        if (get__logged__user() != null)
            $this->view('feedback/index__feedback', ['syntax' => $to__root, 'params' => $data]);
        else
            $this->view('errors/first__login', ['syntax' => $to__root, 'params' => $data]);
    }

    function send_mail(){
        header('Location: index__home.php');
        if(isset($_POST['submit']))
        {
            $to = "skivibagrd@gmail.com";
            $from = "gheorghitard@gmail.com"; // inlocuit cu adresa email a utilizatorului logat
            $name = "Bob"; // inlocuit cu numele utilizatorului
            $subject = "Feedback form " . $name;
            if(isset($_POST["appearance"]))
            {
                $appearance = "Q: How do you feel about the general appearance of the website? \nA: " . $_POST["appearance"] . "\n";
            }
            else
            {
                $appearance = "Q: How do you feel about the general appearance of the website? \nA: Not responded\n";
            }
            if(isset($_POST["presentation"]))
            {
                $presentation = "Q: Do you like the way courses/lessons are presented to you? \nA: " . $_POST["presentation"] . "\n";
            }
            else
            {
                $presentation = "Q: Do you like the way courses/lessons are presented to you? \nA: Not responded\n";
            }
            if(isset($_POST["diversity"]))
            {
                $diversity = "Q: Do you think there is enough diversity in our courses/lessons? \nA: " . $_POST["diversity"] . "\n";
            }
            else
            {
                $diversity = "Q: Do you think there is enough diversity in our courses/lessons? \nA: Not responded\n";
            }
            if($_POST["user_likes"]!="")
            {
                $user_likes = "Q: What do you like about our website? \nA: " . $_POST["user_likes"] . "\n";
            }
            else
            {
                $user_likes = "Q: What do you like about our website? \nA: Not responded\n";
            }
            if($_POST["user_dislikes"]!="")
            {
                $user_dislikes = "Q: What do you dislike about our website? \nA: " . $_POST["user_dislikes"] . "\n";
            }
            else
            {
                $user_dislikes = "Q: What do you dislike about our website? \nA: Not responded\n";
            }
            if($_POST["user_improvements"]!="")
            {
                $user_improvements = "Q: What should we work on to improve your experience while using this website? \nA: " . $_POST["user_improvements"] . "\n";
            }
            else
            {
                $user_improvements = "Q: What should we work on to improve your experience while using this website? \nA: Not responded\n";
            }
            if($_POST["user_personal"]!="")
            {
                $user_personal = "Q: Anything else you would like to share with us? \nA: " . $_POST["user_personal"] . "\n";
            }
            else
            {
                $user_personal = "Q: Anything else you would like to share with us? \nA: Not responded\n";
            }
            $message = $appearance . $presentation . $diversity . $user_likes . $user_dislikes . $user_improvements . $user_personal;
            $headers = array("From: " . $from,
                            "Reply-To: " . $to,
                            "X-Mailer: PHP/" . PHP_VERSION
                            );
            $headers = implode("\r\n", $headers);
            mail($to,$subject,$message,$headers);
            header("Location: ../feedback/thanks");
        }
    }

    function thanks($data)
    {
        $to__root = $data[0];
        unset($data[0]);
        $this->view('feedback/feedback__thanks', ['syntax' => $to__root]);
    }
}
