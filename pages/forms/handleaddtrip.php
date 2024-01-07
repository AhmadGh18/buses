<?php
// Assuming you have a database connection
include("../../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];
    $price = $_POST['price'];
    $date = $_POST['date'];

    // Handling thumbnail upload
    if (!empty($_FILES["thumbnail"]["name"])) {
        $thumbnailName = $_FILES["thumbnail"]["name"];
        $thumbnailTmpName = $_FILES["thumbnail"]["tmp_name"];
        $thumbnailPath = '../uploads/' . $thumbnailName; // Set your upload path

        // Move the uploaded thumbnail to the destination path
        if (move_uploaded_file($thumbnailTmpName, $thumbnailPath)) {
            // Insert thumbnail data into the database
            $sqlThumbnail = "INSERT INTO trip (Title, capacity, price, trip_date, description, Image, posted) VALUES (?, ?, ?, ?, ?, ?, NOW())";
            $stmtThumbnail = $conn->prepare($sqlThumbnail);
            $stmtThumbnail->bind_param("siisss", $title, $capacity, $price, $date, $description, $thumbnailPath);


            if ($stmtThumbnail->execute()) {
                $tripId = $stmtThumbnail->insert_id;

                if (isset($_FILES["file-input"]["name"]) && count($_FILES["file-input"]["name"]) > 0) {
                    foreach ($_FILES["file-input"]["tmp_name"] as $key => $tmp_name) {
                        // Check if a file was uploaded
                        if (!empty($_FILES["file-input"]["name"][$key])) {
                            $imgPath = "../uploads/" . basename($_FILES["file-input"]["name"][$key]);
                            move_uploaded_file($tmp_name, $imgPath);

                            // Insert additional image data into the database
                            $sqlImg = "INSERT INTO images (imgurl, trip_id) VALUES (?, ?)";
                            $stmtImg = $conn->prepare($sqlImg);
                            $stmtImg->bind_param("si", $imgPath, $tripId);

                            if ($stmtImg->execute()) {
                                echo "Data inserted successfully.";
                            } else {
                                echo "Error inserting image data: " . $stmtImg->error;
                            }
                            $stmtImg->close();
                        }
                    }
                } else {
                    echo "No additional images provided.";
                }

                header("location:../tables/viewtrip.php");
            } else {
                echo "Error inserting thumbnail data: " . $stmtThumbnail->error;
            }


            echo "Data inserted successfully.";
        } else {
            echo "Error inserting thumbnail data: " . $stmtThumbnail->error;
        }
        $stmtThumbnail->close();
    } else {
        echo "Error moving thumbnail file.";
    }
} else {
    echo "Thumbnail file not provided.";
}


$conn->close();
