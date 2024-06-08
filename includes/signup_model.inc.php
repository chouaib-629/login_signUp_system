<?php
    declare(strict_types = 1);

    function get_userName(object $pdo, string $userName) : array|false {
        $query = "SELECT userName FROM users WHERE userName = :userName;";

        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':userName', $userName);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        
        return $result;
    }

    function get_email(object $pdo, string $email) : array|false {
        $query = "SELECT email FROM users WHERE email = :email;";

        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        
        return $result;
    }

    function set_user(object $pdo, string $userName, string $pwd, string $email) : void {
        $query = "INSERT INTO users (userName, pwd, email) VALUES (:userName, :pwd, :email);";

        $stmt = $pdo->prepare($query);
        
        $options = [
            'cost' => 10,
        ];

        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':pwd', $hashedPwd);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        
        $stmt = null;
    }