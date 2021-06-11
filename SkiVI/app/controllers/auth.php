<?php

include_once "../app/models/auth.utils.php";

class Auth extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);


        if (get__logged__user()) {
            logout();
        }

        $this->view('auth/auth__login', ['syntax' => $to__root, 'params' => $data]);
    }

    public function index__register($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('auth/auth__register', ['syntax' => $to__root, 'params' => $data]);
    }

    public function login($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        include_once $to__root . "app/models/auth.utils.php";

        if (!isset($_POST["username"]) || !isset($_POST["password"])) {
            $this->view('errors/bad__request', ['syntax' => $to__root, 'params' => $data]);
            return;
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = get__user($username, $password);

        if (!$user) {
            echo "Invalid credentials ...";
            header("Location: ../auth/wrong");
            // $this->view('errors/wrong-credentials', $data);
        } else {
            login($user);
            header("Location: ../");
            // $this->view('home/index__home', ['syntax' => $to__root, 'params' => $data]);
        }
    }

    public function register($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        include_once $to__root . "app/models/auth.utils.php";

        if (!isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["name"]) || !isset($_POST["email"])) {
            $this->view('errors/bad__request', ['syntax' => $to__root, 'params' => $data]);
            return;
        }

        $email = $_POST["email"];
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = new User($username, $email, $name, $password);

        $exists = '';

        $exists .= (check__email($user->email)) ? '/email' : '';
        $exists .= (check__username($user->username)) ? '/username' : '';
        // if (check__email($user->email)) {
        //     echo "There is an account associated with your email address!!!";
        //     header("Location: ../auth/email__exists");
        //     return;
        // } else if (check__username($user->username)) {
        //     echo "This username is taken! Try another one.";
        //     header("Location: ../auth/username__exists");
        //     return;
        // } 
        if ($exists != '') {
            header("Location: ../auth/wrong" . $exists);
        } else {
            register__user($user);
            header("Location: ../");
        }
    }

    public function wrong($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        if (!isset($data[1])) {
            // print_r($data);
            $this->view('errors/invalid__credentials', ['syntax' => $to__root]);
        } else {
            // print_r($data);
            $param1 = $data[1];
            if (isset($data[2])) {
                $param2 = $data[2];
                $this->view('errors/exists', ['syntax' => $to__root, 'param1' => $param1, 'param2' => $param2]);
            }
            $this->view('errors/exists', ['syntax' => $to__root, 'param1' => $param1]);
        }
    }
}
