<?php
    session_start();

    $userLogout = $_SESSION['valid_user'];

    $notSet($_SESSION['valid_user']);
    $result = session_destroy();

    header('Location: insert signin page');
    if(!empty($userLogout)) {
        if($result) {
            echo 'You have logged out of 50/50. We hope to see you again';
            header('Location: insert signin page');
        }
        else {
            echo 'Apologies my friendo, we are unable to log you out.';
        }
    }
    else {
        echo 'Huh? Were you logged in?';
        header('Location: insert signin page');
    }
?>