<?php
include './config.php';
if (!empty($_SESSION['id'])) {
    header("Location: ./index.php");
}

if (isset($_POST['logInBtn'])) {
    $NameEmail = $_POST['NameEmail'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE `full-name` = '$NameEmail' OR email = '$NameEmail'");
    $row = mysqli_fetch_assoc($result);

    // Admin Log In
    if ($row['usertype'] === 'admin') {
        $_SESSION['adminLogin'] = true;
        $_SESSION['uid'] = $row['id'];
        header("Location: ./admin/index.php");
    } else {
        echo "<script>alert('Fullname or Email doesn't exist!')</script>";
    }

    // User Log In
    if ($row['usertype'] == "user") {
        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row["full-name"];
        header("Location: ./index.php");
    } else {
        echo "<script> alert('Fullname/Email or Password is incorrect!'); </script>";
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
                        <input type="text" class="login__input" placeholder="Full Name / Email" name="NameEmail" required>
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