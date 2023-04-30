<?php
include "./config.php";

if (isset($_POST['announceBtn'])) {
    $jobname = $_POST['jobname'];
    $jobDesc = $_POST['jobDesc'];
    $city = $_POST['city'];
    $category = $_POST['category'];
    $schedule = $_POST['schedule'];
    $email = $_POST['email'];
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";

    if (!preg_match($emailValidation, $email)) {
        echo "<script>alert('$email is not valid!');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO `jobs`(`job-name`, `job-description`, `city`, `category`, `schedule`, `email`) VALUES ('$jobname', '$jobDesc', '$city', '$category', '$schedule', '$email')") or die("Query failed: " . mysqli_error($conn));
        header("./index.php");
    }
    header("./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_arrows.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="./css/announcejob.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js" defer></script>
    <script src="./js/announce.js" defer></script>

</head>

<body>

    <div class="container">
        <form class=" bg-white p-3 mt-5 rounded" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Job Name</label>
                    <input type="text" class="form-control" id="jobname" name="jobname">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Job Description</label>
                    <input type="text" class="form-control" id="jobDescription" name="jobDesc">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group p-3">
                    <label for="inputAddress">City</label>
                    <select class="form-select border-1" name="city">
                        <?php
                        $cities = array(
                            'Pristina',
                            'Prizren',
                            'Gjakova',
                            'Mitrovica',
                            'Gjilan',
                            'Ferizaj',
                            'Peja',
                            'Glogovac',
                            'Decan',
                            'Istok',
                            'Klina',
                            'Podujevo',
                            'Leposaviq',
                            'Viti',
                            'Shtime',
                            'Dragash',
                            'Kamenice',
                            'Malisheve',
                            'Rahovec',
                            'Kacanik',
                            'Zubin Potok',
                            'Vushtrri',
                            'Skenderaj',
                            'Novoberde',
                            'Lipjan',
                            'Shterpce',
                            'Obiliq',
                            'Gracanice',
                            'Kline',
                            'Zvecan'
                        );
                        for ($i = 0; $i < count($cities); $i++) {
                            echo '<option value="' . [$i] . '">' . $cities[$i] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group  p-3">
                    <label for="inputEmail4">Category:</label>
                    <select class="form-select border-1" name="category">
                        <?php
                        $result = mysqli_query($conn, "select id, `category-name`, `category-image`, `category-description` from categories") or die("Query failed: " . mysqli_error($conn));
                        while (list($id, $categoryname) = mysqli_fetch_array($result)) {
                            echo "<option value='$id'>$categoryname</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group p-3">
                    <label for="inputEmail4">Schedule:</label>
                    <select class="form-select border-1" name="schedule">
                        <option value="fulltime">Full-Time</option>
                        <option value="parttime">Part-Time</option>
                        <option value="intern">Intern</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Company Email / Your Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" name="announceBtn" class="btn btn-primary">Announce Job</button>
        </form>
    </div>
</body>

</html>