<?php

session_start();

$CONFIG = [
    'servername' => "localhost",
    'username' => "root",
    'password' => '',
    'db' => 'skillvirtualinstructor'
];

$conn = new mysqli($CONFIG["servername"], $CONFIG["username"], $CONFIG["password"], $CONFIG["db"]);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require_once 'User.php';

function get__user($username, $password)
{
    $conn = new mysqli('localhost', 'root', '', 'skillvirtualinstructor');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $queryStmt = $conn->prepare("select * from users where username = ? and password = ?");
    $queryStmt->bind_param('ss', $username, $password);

    $queryStmt->execute();
    $results = $queryStmt->get_result();
    $queryStmt->close();
    $conn->close();

    if ($results->num_rows == 1) {
        $row = $results->fetch_assoc();
        return new User($row['username'], $row['email'], $row['name'], $row['password']);
    }

    return null;
}

function get__logged__user()
{
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        return get__user($_SESSION["username"], $_SESSION["password"]);
    }

    return null;
}

function check__username($username)
{
    $conn = new mysqli('localhost', 'root', '', 'skillvirtualinstructor');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $queryStmt = $conn->prepare("select * from users where username = ?");
    $queryStmt->bind_param('s', $username);

    $queryStmt->execute();
    $results = $queryStmt->get_result();
    $queryStmt->close();
    $conn->close();

    if ($results->num_rows == 1) {
        return true;
    }

    return null;
}

function check__email($email)
{
    $conn = new mysqli('localhost', 'root', '', 'skillvirtualinstructor');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $queryStmt = $conn->prepare("select * from users where email = ?");
    $queryStmt->bind_param('s', $email);

    $queryStmt->execute();
    $results = $queryStmt->get_result();
    $queryStmt->close();
    $conn->close();

    if ($results->num_rows == 1) {
        return true;
    }

    return null;
}

function register__user($user)
{
    $conn = new mysqli('localhost', 'root', '', 'skillvirtualinstructor');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $queryStmt = $conn->prepare("INSERT INTO users (username, email, name, password) VALUES (?, ?, ?, ?)");
    $queryStmt->bind_param('ssss', $user->username, $user->email, $user->name, $user->password);

    $queryStmt->execute();
    $queryStmt->close();
    $conn->close();

    login($user);
}

function login($user)
{
    $_SESSION["username"] = $user->username;
    $_SESSION["password"] = $user->password;
    // echo "username = " . $_SESSION["username"] . " pass = " . $_SESSION["password"];
}

function logout()
{
    $_SESSION["username"] = null;
}
