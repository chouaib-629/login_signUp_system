<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userName = $_POST['userName'];
        $pwd = $_POST['pwd'];

        try {
            require_once 'dbHandler.inc.php';
            require_once 'login_model.inc.php';
            require_once 'login_contr.inc.php';
            // error handler
            $errors = [];
            
            if (is_input_empty($userName, $pwd)) {
                $errors['empty_input'] = 'Fill in all the fields!';
            }
            
            $result = get_userName($pdo, $userName);
            
            if (is_userName_wrong($result)) {
                $errors['login_incorrect'] = "Incorrect login info!";
            }

            if (!is_userName_wrong($result) && is_password_wrong($pwd, $result['pwd'])) {
                $errors['login_incorrect'] = "Incorrect login info!";
            }
            
            require_once 'config_session.inc.php';

            if ($errors) {
                $_SESSION['errors_login'] = $errors;
                
                header("Location: ../index.php");
                die();
            }
            $newSessionID = session_create_id();
            $sessionID = $newSessionID . "_" . $result['user_id'];
            session_id($sessionID);
            
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['user_userName'] = htmlspecialchars($result['userName']);
            $_SESSION['last_regeneration'] = time();  
            
            header("Location: ../index.php?login=success");

            $pdo = null;
            die();
            
        } catch (PDOException $error) {

            die("Query failed: " . $error->getMessage());
        }
    } else {

        header("Location: ../index.php");
        die();
    }