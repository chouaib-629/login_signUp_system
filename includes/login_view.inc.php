<?php

    declare(strict_types=1);

    function output_userName() : void {

        if (isset($_SESSION['user_id'])) {
            echo $_SESSION['user_userName'];
        } else {
            echo "Unified";
        }
    }

    function check_login_errors() : void {

        if (isset($_SESSION['errors_login'])) {
            $errors = $_SESSION['errors_login'];

            echo '<br>';
            foreach ($errors as $error) {
                echo '<p class="form-errors">' . $error . '</p>';
            }
            unset($_SESSION['errors_login']);
            
        } elseif (isset($_GET['login']) && $_GET['login'] === "success") {

            echo '<br>';
            echo '<p class="form-success"> Login success! </p>'; 
        }
    }