<?php
include('../../connection.php');

// Get the trip ID from the URL
$id = $_GET["id"];
$sql2 = "SELECT * FROM images WHERE trip_id = '$id'";

$sql = "SELECT * FROM trip WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$trip = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trip</title>
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        #thumb {
            display: none;
        }

        .sss {
            padding: 10px;
            color: white;
            border-radius: 10px;
            background-color: #2980b9;
            cursor: pointer;
        }

        #thumb-preview {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        img {
            max-height: 100px;
        }

        .delete-link {
            background-color: #2980b9;
            color: white;
            border-radius: 10px;
            padding: 6px;
            margin: 5px;
        }

        a {
            text-decoration: none;
        }

        .image-gallery .gallery-image {
            margin-top: 10px;
            padding: 20px;

            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Trip</h2>
        <form action="handleedittrip.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $trip['id']; ?>">

            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $trip['Title']; ?>" required>

            <label for="capacity">Capacity:</label>
            <input type="text" name="capacity" value="<?php echo $trip['capacity']; ?>" required>

            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo $trip['price']; ?>" required>

            <label for="trip_date">Trip Date:</label>
            <input type="text" name="trip_date" value="<?php echo $trip['trip_date']; ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" required><?php echo $trip['description']; ?></textarea>

            <label for="image">Image:</label>
            <img id="thumb-preview" src="<?php echo $trip['Image']; ?>" alt="Trip Image">

            <label for="thumb" class="sss">Change Image</label>
            <input type="file" id="thumb" onchange="previewImage();" accept="image/*">
            <label for="image">Already existing Images:</label>
            <?php
            // Execute the second query to get images
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
            ?>
                <div class="image-gallery">
                    <?php while ($row2 = $result2->fetch_assoc()) { ?>
                        <div class="gallery-image">
                            <img src="<?php echo $row2['imgUrl']; ?>" alt="Image" class="gallery-image-img">
                            <div class="image-overlay">
                                <a href="../tables/deleteimg1.php?tripid=<?php echo $id; ?>&id=<?php echo $row2['id']; ?>" class="delete-link">Delete</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>



            <?php
            } else {
                echo "No images available for this trip.";
            }



            // Close the database connection
            $conn->close();
            ?>

            <input type="file" id="file-input" name="file-input[]" accept="image/png, image/jpeg" onchange="previewMultiImages()" multiple>
            <div id="images"></div>

            <input type="submit" value="Update Trip">
        </form>
    </div>

    <script>
        function previewImage() {
            var thumbInput = document.getElementById('thumb');
            var thumbPreview = document.getElementById('thumb-preview');

            if (thumbInput.files && thumbInput.files[0] && window.FileReader) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    thumbPreview.src = e.target.result;
                };

                reader.readAsDataURL(thumbInput.files[0]);
            } else {
                console.log("FileReader not supported");
            }
        }

        function previewMultiImages() {
            let fileInput = document.getElementById("file-input");
            let imageContainer = document.getElementById("images");

            imageContainer.innerHTML = "";

            if (window.FileReader) {
                for (let i of fileInput.files) {
                    let reader = new FileReader();
                    let figure = document.createElement("figure");
                    let figCap = document.createElement("figcaption");
                    let deleteButton = document.createElement("button"); // Add this line for the delete button
                    deleteButton.innerText = "Delete"; // Add this line to set button text
                    deleteButton.addEventListener("click", function() { // Add click event listener
                        figure.remove(); // Remove the figure element on button click

                    });

                    figCap.innerText = i.name;
                    figure.appendChild(figCap);

                    reader.onload = function() {
                        let img = document.createElement("img");
                        img.setAttribute("src", reader.result);
                        figure.insertBefore(img, figCap);
                    };

                    figure.appendChild(deleteButton); // Add this line to append delete button
                    imageContainer.appendChild(figure);
                    reader.readAsDataURL(i);
                }
            } else {
                console.log("FileReader not supported");
            }
        }
    </script>
</body>

</html>