<?php

    ini_set('session.use_only_cookies', true);
    ini_set('session.use_strict_mode', true);

    session_set_cookie_params([
        'lifetime' => 1800, // 60s * 30min = 1800s
        'domain' => 'localhost',
        'path' => '/',
        'secure' => true,
        'httponly' => true,
    ]);

    session_start();

    if (isset($_SESSION['user_id'])) {
        
        if (!isset($_SESSION['last_regeneration'])) {
            regenrate_session_id_loggedin();
        } else {
            $interval = 1800;
            if (time() - $_SESSION['last_regeneration'] >= $interval) {
                regenrate_session_id_loggedin(); 
            }
        }
    } else {
        
        if (!isset($_SESSION['last_regeneration'])) {
            regenrate_session_id();
        } else {
            $interval = 1800;
            if (time() - $_SESSION['last_regeneration'] >= $interval) {
                regenrate_session_id(); 
            }
        }
    }

    function regenrate_session_id() {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();  
    }

    function regenrate_session_id_loggedin() {
        session_regenerate_id(true);

        $userID = $_SESSION['user_id'];
        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $userID;
        session_id($sessionID);

        $_SESSION['last_regeneration'] = time();  
    }