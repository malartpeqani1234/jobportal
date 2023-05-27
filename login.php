<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include './config.php';

if (!empty($_SESSION['id'])) {
    header("Location: ./index.php");
    exit();
}

if (isset($_POST['logInBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        echo "<script>alert('Email is required!')</script>";
    } else if (empty($password)) {
        echo "<script>alert('Password is required!')</script>";
    } else {
        $sql = "SELECT * FROM `users` WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        // if ($row && password_verify($password, $row['password'])) {
        if ($email == $row['email'] && $password == $row['password'] && $row['usertype'] === "user") {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['full-name'] = $row['full-name'];
            $_SESSION['email'] = $row['email'];
            mysqli_stmt_close($stmt);
            header("Location: ./index.php");
            exit();
        } elseif ($email == $row['email'] && $password == $row['password'] && $row['usertype'] === "admin" && $row['id'] == 2) {
            $_SESSION['admin_login'] = true;
            $_SESSION['aid'] = $row['id'];
            mysqli_stmt_close($stmt);
            header("Location: ./admin/index.php");
            exit();
        }
        // } else {
        //     echo "<script>alert('Email or Password is incorrect!')</script>";
        // }

        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/loginregistration.css">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <h1 class="header">Log In</h1>
                <form class="login" method="post" autocomplete="off">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Email" name="email" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password" required>
                    </div>
                    <button class="button login__submit" name="logInBtn">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                    <p class="alreadyLink">Don't have an account? <a href="./registration.php">Register Now</a></p>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>