<?php
require '../../config.php';
if (!empty($_SESSION['id'])) {
    header("Location: ../../index.php");
}
if (isset($_POST["addCategoryBtn"])) {
    $categoryName = $_POST["categoryname"];

    $categoryImg = $_FILES["categoryimage"]["name"];
    $categoryImg_tmp = $_FILES['categoryimage']["tmp_name"];

    $categoryDescription = $_POST["categorydesc"];

    $duplicate = mysqli_query($conn, "SELECT * FROM categories WHERE `category-name` = '$categoryName'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Category already exists!'); </script>";
    } else {
        // $encPassword = md5($password);
        move_uploaded_file($categoryImg_tmp, "../assets/categoryImages/$categoryImg");

        $query = "INSERT INTO `categories`(`category-name`, `category-image`, `category-description`) VALUES ('$categoryName', '$categoryImg', '$categoryDescription')";
        mysqli_query($conn, $query);
        echo "<script> alert('Registration Succesful!'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <?php include "../include/navbar.php" ?>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Users
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../users/view.php">View</a>
                                <a class="nav-link" href="../users/add.php">Add</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Categories
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./view.php">View</a>
                                <a class="nav-link" href="./add.php">Add</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJobs" aria-expanded="false" aria-controls="collapseJobs">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Jobs
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseJobs" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../admin/jobs/view.php">View</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: Admin</div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main class="allContent-section container-fluid my-5 mx-3">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add Category</h4>
                            <p class="card-category">Complete Category Fields</p>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" name="form" enctype="multipart/form-data" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-12">
                                        <div class="form-group bmd-form-group p-2">
                                            <input placeholder="Category Name:" type="text" id="categoryname" name="categoryname" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xl-12">
                                        <div class="form-group bmd-form-group p-2">
                                            <input placeholder="Category Image:" type="file" name="categoryimage" id="categoryimage" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xl-12">
                                        <div class="form-group bmd-form-group p-2">
                                            <input placeholder="Category Short Description:" type="text" id="categorydesc" name="categorydesc" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="addCategoryBtn" id="addUser" class="btn btn-primary pull-right p-2">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>