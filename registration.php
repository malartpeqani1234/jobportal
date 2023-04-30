<?php
require './config.php';
if (!empty($_SESSION['id'])) {
    header("Location: index.php");
}
if (isset($_POST["registerBtn"])) {
    $fullname = $_POST["full-name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $characterSafety = "/^[a-zA-Z ]+$/";
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";



    if (!preg_match($emailValidation, $email)) {
        echo "<script>alert('$email is not valid!');</script>";
    } else if (strlen($password) < 6) {
        echo "<script>alert('Password must be 6 characters or more');</script>";
    } else if ($password == $fullname) {
        echo "<script>alert('Password cannot be the same as your fullname!');</script>";
    } else {
        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE `full-name` = '$fullname' OR email = '$email'");

        if (mysqli_num_rows($duplicate) > 0) {
            echo "<script> alert('Username or Email already exists!'); </script>";
        } else {
            // $encPassword = md5($password);
            $query = "INSERT INTO `users`(`full-name`, `email`, `password`)
                VALUES ('$fullname','$email','$password')";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration Succesful!'); </script>";
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row["full-name"];
            header("Location: index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/loginregistration.css">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <h1 class="header">Register</h1>
                <form class="login" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Full Name" name="full-name" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-inbox"></i>
                        <input type="text" class="login__input" placeholder="Email" name="email" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password" required>
                    </div>
                    <button class="button login__submit" name="registerBtn">
                        <span class="button__text">Register Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                    <p class="alreadyLink">Already have an account? <a href="./login.php">Log In</a></p>
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