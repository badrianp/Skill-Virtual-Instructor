<?php

class User
{
    public $username, $email, $password, $name;

    public function __construct($username, $email, $name, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }
}
