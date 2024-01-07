<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="../../assets/plugins/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="../../assets/css/portal.css">
</head>

<body>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo me-5" href="../../index.php"><img src="images/logo.svg" class="me-2"
                    alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="images/logo-mini.svg"
                    alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="ti-view-list"></span>
            </button>



        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php">
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
                    <a class="nav-link" href="../tables/viewtrip.php">
                        <i class="ti-eye menu-icon"></i>
                        <span class="menu-title">View trips</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../forms/addtrip.php">
                        <i class="ti-plus menu-icon"></i>
                        <span class="menu-title">add trip</span>
                    </a>
                </li>


            </ul>
        </nav>
        <style>
        .allholder {
            display: flex;
            flex-wrap: wrap;
        }

        @media screen and (max-width:700px) {
            .single11 {
                width: 100%;
            }
        }
        </style>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-weight-bold mb-0">All trips</h4>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 allholder">
                    <?php
                    include("../../connection.php");
                    $sql = "SELECT * FROM trip";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['Title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $img = $row['Image'];
                        $state = $row['state'];

                    ?>
                    <div class="col-3 col-md-6 col-xl-4 col-xxl-3 single11">
                        <div class="app-card app-card-doc shadow-sm h-100">
                            <div class="app-card-thumb-holder p-3">

                                <img class="thumbimage" src='<?php echo $img ?>' alt="k" />

                            </div>
                            <div class="app-card-body p-3 has-card-actions">

                                <h4 class="app-doc-title truncate mb-0"><a href="#file-link"><?php echo $title ?></a>
                                </h4>
                                <div class="app-doc-meta">
                                    <ul class="list-unstyled mb-0">
                                        <li><span class="text-muted">Title:</span> <?php echo $title ?></li>
                                        <li><span class="text-muted">Price:</span> <?php echo $price  ?></li>
                                        <li><span class="text-muted">Location:</span> <?php echo $description ?></li>
                                        <?php echo $state == "0" ? '<li class="deleted">deleted (not Available for users)</li>' : "" ?>


                                    </ul>
                                </div>
                                <!--//app-doc-meta-->

                                <div class="app-card-actions">
                                    <div class="dropdown">
                                        <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                class="bi bi-three-dots-vertical" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg>
                                        </div>
                                        <!--//dropdown-toggle-->
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="singletrip.php?id=<?php echo $row['id'] ?>"><svg width="1em"
                                                        height="1em" viewBox="0 0 16 16" class="bi bi-eye me-2"
                                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                        <path fill-rule="evenodd"
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>View</a></li>
                                            <li><a class="dropdown-item"
                                                    href="../forms/edittrip.php?id=<?php echo $row['id'] ?>" ]"><svg
                                                        width="1em" height="1em" viewBox="0 0 16 16"
                                                        class="bi bi-pencil me-2" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg>Edit</a></li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                        </ul>
                                    </div>
                                    <!--//dropdown-->
                                </div>
                                <!--//app-card-actions-->

                            </div>
                            <!--//app-card-body-->

                        </div>
                        <!--//app-card-->
                    </div>


                    <?php  } ?>;






                    <style>
                    .thumbimage {
                        height: 100%;
                        width: 100%;
                        object-fit: cover;
                    }

                    .deleted {
                        color: red;
                    }
                    </style>

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














    <!-- Javascript -->
    <script src="../../assets/plugins/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>


description