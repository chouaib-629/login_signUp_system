<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userName = $_POST['userName'];
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];

        try {
            require_once 'dbHandler.inc.php';
            require_once 'signup_model.inc.php';
            require_once 'signup_contr.inc.php';
            // error handler
            $errors = [];
            
            if (is_input_empty($userName, $pwd, $email)) {
                $errors['empty_input'] = 'Fill in all the fields!';
            }
            
            if (is_email_invalid($email)) {
                $errors['invalid_email'] = 'Invalid email!'; 
            }
            
            if (is_userName_taken($pdo, $userName)) {
                $errors['userName_taken'] = 'Username already taken!';
            }
            
            if (is_email_registered($pdo, $email)) {
                $errors['email_taken'] = 'Email already registered!';
            }

            require_once 'config_session.inc.php';

            if ($errors) {
                $_SESSION['errors_signup'] = $errors;
                
                $signupData = [
                    'userName' => $userName,
                    'email' => $email,
                ];
                $_SESSION['data_signup'] = $signupData;

                header("Location: ../index.php");
                die();
            }

            create_user($pdo, $userName, $pwd, $email);

            header("Location: ../index.php?signup=success");

            $pdo = null;
            die();

        } catch (PDOException $error) {
            die("Query failed: " . $error->getMessage());
        }

    } else {
        header("Location: ../index.php");
        die();
    }