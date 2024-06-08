<?php

    declare(strict_types = 1);
    
    function is_input_empty(string $userName, string $pwd) : bool {
        if (empty($userName) || empty($pwd)) {
            return true;
        }
        return false;
    }

    function is_userName_wrong(array|bool $result) : bool {
        if (!$result) {
            return true;
        }
        return false;
    }   

    function is_password_wrong(string $pwd,  string $hashedPwd) : bool {
        if (!password_verify($pwd, $hashedPwd)) {
            return true;
        }
        return false;
    } 