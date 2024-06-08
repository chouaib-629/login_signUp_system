<?php
    declare(strict_types = 1);

    function is_input_empty(string $userName, string  $pwd, string $email) : bool {
        if (empty($userName) || empty($pwd) || empty($email)) {
            return true;
        }
        return false;
    }

    function is_email_invalid(string $email) : bool {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    function is_userName_taken(object $pdo, string $userName) : bool {
        if (get_userName($pdo, $userName)) {
            return true;
        }
        return false;
    }
    
    function is_email_registered(object $pdo, string $email) : bool {
        if (get_email($pdo, $email)) {
            return true;
        }
        return false;
    }

    function create_user(object $pdo, string $userName, string $pwd, string $email) : void {
        set_user($pdo, $userName, $pwd, $email);
    }
    
    