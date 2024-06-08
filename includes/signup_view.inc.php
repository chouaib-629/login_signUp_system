<?php
    declare(strict_types = 1);

    function signup_inputs() : void {    
        if (isset($_SESSION["data_signup"]["userName"]) && !isset($_SESSION["errors_signup"]["userName_taken"])) {

            echo '<input type="text" name="userName" placeholder="User Name" value="' . $_SESSION["data_signup"]["userName"] . '">'; 
        } else {
            echo '<input type="text" name="userName" placeholder="User Name" >'; 
        }

        echo '<input type="password" name="pwd" placeholder="Password">';

        if (isset($_SESSION["data_signup"]["email"]) && !isset($_SESSION["errors_signup"]["email_taken"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) 
        {
            echo '<input type="text" name="email" placeholder="E-mail" value="' . $_SESSION["data_signup"]["email"] . '">'; 
        } else 
        {
            echo '<input type="text" name="email" placeholder="E-mail">'; 
        }
    }

    function check_signup_errors() : void {
        if (isset($_SESSION['errors_signup'])) {

            $errors = $_SESSION['errors_signup'];

            echo "<br>";

            foreach ($errors as $error) {
                echo "<p class='form-errors' style='color: red;'>" . $error . "</p>";
            }

            unset($_SESSION['errors_signup']);
        } elseif (isset($_GET['signup']) && $_GET['signup'] === "success") {

            echo "<br>";
            echo "<p class='form-success' style='color: green;'> Signup Success! </p>";
        }
    }