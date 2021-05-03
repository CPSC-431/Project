<?php
    require_once('validation.php');
    $_SESSION['info'] = array();

    if (isset($_POST["submit"])) {
        $username = validUser($_POST["username"],"username");
        $password = validUser($_POST["password"], "password");

        login($username, $password);

        // if the user logins successfully, this will start the session
        session_start();
        $_SESSION['real_user'] = $username;  

        // moves to home.php aka the main page
        header('Location: home.php');
    }
?>