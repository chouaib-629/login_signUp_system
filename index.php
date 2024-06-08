<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
    require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login / Sign Up System</title>
</head>
<body>
    <h1>Login / Sign Up System</h1>

    <div class="header">
        <h4>
            <?php
                output_userName();
            ?>
        </h4>
        <?php if (isset($_SESSION['user_id'])) { ?>

            <form class="logout" action="includes/logout.inc.php" method="post">
                <button class="logout-button">Logout</button>
            </form>

        <?php } ?>
    </div>
  
    <div class="container">
        <div class="login">
            <h3>Login</h3>

            <form class="login" action="includes/login.inc.php" method="post">
                <input type="text" name="userName" placeholder="User Name">
                <input type="password" name="pwd" placeholder="Password">
                <button>Login</button>
            </form>

            <?php
                check_login_errors();
            ?>
        </div>

        <div class="signUp">
            <h3>Sign Up</h3>

            <form class="signup" action="includes/signup.inc.php" method="post">
                <?php 
                    signup_inputs();
                ?>
                <button>Sign Up</button> 
            </form>

            <?php
                check_signup_errors();
            ?>
        </div>
    </div>

</body>
</html>