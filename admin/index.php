<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>RoyalUI Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">
                                Free 24/7 customer support, updates, and more with this
                                template!
                            </p>
                            <a href="https://www.bootstrapdash.com/product/royalui/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/royalui/"><i
                                class="ti-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="ti-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_navbar.php -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo me-5" href="index.php"><img src="images/logo.svg" class="me-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="ti-view-list"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="ti-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                                aria-label="search" aria-describedby="search" />
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">



                </ul>

            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.php -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="ti-shield menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pages/forms/basic_elements.php">
                            <i class="ti-layout-list-post menu-icon"></i>
                            <span class="menu-title">Form elements</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pages/tables/basic-table.php">
                            <i class="ti-view-list-alt menu-icon"></i>
                            <span class="menu-title">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/tables/basic-table.php">
                            <i class="ti-eye menu-icon"></i>
                            <span class="menu-title">View trips</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/forms/addtrip.php">
                            <i class="ti-plus menu-icon"></i>
                            <span class="menu-title">add trip</span>
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="font-weight-bold mb-0">RoyalUI Dashboard</h4>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                                        <i class="ti-clipboard btn-icon-prepend"></i>Report
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">total number of trip</p>
                                    <div
                                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                            <?php
                                            include("./connection.php");

                                            $sql = "SELECT COUNT(*) as count FROM trip"; // Corrected SQL query
                                            $res = mysqli_query($conn, $sql);

                                            if ($res) {
                                                $row = mysqli_fetch_assoc($res);
                                                $num = $row['count'];
                                                echo "<p class=mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0>$num</p>";
                                            } else {
                                                echo "Error: " . mysqli_error($conn);
                                            }

                                            // Close the database connection
                                            mysqli_close($conn);
                                            ?>

                                        </h3>
                                        <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">
                                        Users
                                    </p>
                                    <div
                                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                            <?php
                                            include("./connection.php");

                                            $sql = "SELECT COUNT(*) as count FROM users"; // Corrected SQL query
                                            $res = mysqli_query($conn, $sql);

                                            if ($res) {
                                                $row = mysqli_fetch_assoc($res);
                                                $num = $row['count'];
                                                echo "<p class=mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0>$num</p>";
                                            } else {
                                                echo "Error: " . mysqli_error($conn);
                                            }

                                            // Close the database connection
                                            mysqli_close($conn);
                                            ?>
                                        </h3>
                                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-danger">
                                        0.47%
                                        <span class="text-black ms-1"><small>(30 days)</small></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">
                                        Downloads
                                    </p>
                                    <div
                                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                            40016
                                        </h3>
                                        <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-success">
                                        64.00%<span class="text-black ms-1"><small>(30 days)</small></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">
                                        Returns
                                    </p>
                                    <div
                                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                            61344
                                        </h3>
                                        <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                    </div>
                                    <p class="mb-0 mt-2 text-success">
                                        23.00%<span class="text-black ms-1"><small>(30 days)</small></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.php -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                            <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best
                            <a href="https://www.bootstrapdash.com/" target="_blank">
                                Bootstrap dashboard
                            </a>
                            templates</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->
</body>

</html>