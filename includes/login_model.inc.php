<?php

    declare(strict_types = 1);

    function get_userName(object $pdo, string $userName) : array|false {

        $query = "SELECT * FROM users WHERE userName = :userName;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":userName", $userName);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;

        return $result;
    }