<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <style>
        /* Reset some default styles */
        body,
        h1,
        h2,
        h3,
        p,
        figure {
            margin: 0;
            padding: 0;
        }

        /* Apply a background color and font family */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }

        /* Container styling */
        .container1 {
            margin: 70px auto;
            max-width: 800px;
            /* Set a maximum width for the form container */
        }

        /* Card styling */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Form styling */
        .forms-sample {
            padding: 20px;
        }

        /* Title styling */
        .forms-sample h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Label styling */
        .form-group label {
            font-weight: bold;
            color: #555;
        }

        /* Input styling */
        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Textarea styling */
        .area {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* File input styling */
        input[type="file"] {
            margin-top: 8px;
        }

        img {
            max-width: 100%;
        }

        /* Button styling */
        .addimg,
        .btn-more {
            background-color: #3c83e0;
            color: white;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Image preview styling */
        #imagePreview {
            margin-top: 10px;
        }

        /* Additional images styling */
        #images figure {
            margin-bottom: 10px;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .container1 {
                margin: 30px auto;
            }

            .col-md-6 {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo me-5" href="index.php"><img src="images/logo.svg" class="me-2" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
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
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search" />
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">



            </ul>

        </div>
    </nav>

    </nav>
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
                    <a class="nav-link" href="../tables/viewtrip.php">
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
                <div class="col-md-6 grid-margin stretch-card container1">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="./handleaddtrip.php" method="post" enctype="multipart/form-data">
                                <h2>Add trip</h2>
                                <!-- Your form elements -->
                                <h2>Add trip</h2>
                                <!-- Add the following input for image upload -->


                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="Title" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputDescription2" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="area" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Capacity</label>
                                    <div class="col-sm-9">
                                        <input type="number" min='1' name="capacity" class="form-control" id="exampleInputMobile" placeholder="capacity" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleInputPassword2" placeholder="price" name="price" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="datetime-local" class="form-control" placeholder="date" name="date" />

                                        <div class="form-group row">
                                            <label for="exampleInputImage" class="col-sm-3 col-form-label"></label>
                                            <label class="addimg" for="thumbnail">Thumbnail Image:</label>
                                            <input type="file" required id="thumbnail" name="thumbnail" accept="image/*" onchange="previewImage(event)">
                                            <div id="imagePreview"></div>
                                        </div>
                                        <label class="addimg" for="file-input">Add More Images</label>
                                        <input type="file" id="file-input" name="file-input[]" accept="image/png, image/jpeg" onchange="previewMultiImages()" multiple>
                                        <div id="images"></div>
                                        <p id="num-of-files"></p>
                                        <input type="submit" class="submit">
                            </form>
                        </div>
                    </div>
                </div>

                <style>
                    #file-input,
                    #thumbnail {
                        display: none;
                    }


                    .submit {
                        margin: 10px 0;
                        color: white;
                        padding: 10px;
                        border: none;
                        border-radius: 10px;
                        background-color: #555;

                    }

                    .addimg {
                        background-color: #3c83e0;
                        color: white !important;
                        padding: 10px;
                        border-radius: 10px;
                    }
                </style>


            </div>

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div> <!-- Your existing sidebar code -->


    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100%';
                    img.style.height = 'auto';
                    preview.innerHTML = '';
                    preview.appendChild(img);
                };

                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = ''; // Clear preview if no file selected
            }
        }

        function previewMultiImages() {
            let fileInput = document.getElementById("file-input");
            let imageContainer = document.getElementById("images");
            let numOfFiles = document.getElementById("num-of-files");

            imageContainer.innerHTML = "";
            numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

            for (let i of fileInput.files) {
                let reader = new FileReader();
                let figure = document.createElement("figure");
                let figCap = document.createElement("figcaption");
                figCap.innerText = i.name;
                figure.appendChild(figCap);

                reader.onload = function() {
                    let img = document.createElement("img");
                    img.setAttribute("src", reader.result);
                    figure.insertBefore(img, figCap);
                };

                imageContainer.appendChild(figure);
                reader.readAsDataURL(i);
            }
        }
    </script>



    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>