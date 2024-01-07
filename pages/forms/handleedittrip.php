<?php
include('../../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get trip ID from the form
    $id = $_POST["id"];

    // Update trip information
    $title = $_POST["title"];
    $capacity = $_POST["capacity"];
    $price = $_POST["price"];
    $trip_date = $_POST["trip_date"];
    $description = $_POST["description"];

    $sqlUpdateTrip = "UPDATE trip SET Title=?, capacity=?, price=?, trip_date=?, description=? WHERE id=?";
    $stmtUpdateTrip = $conn->prepare($sqlUpdateTrip);
    $stmtUpdateTrip->bind_param("sssssi", $title, $capacity, $price, $trip_date, $description, $id);

    if ($stmtUpdateTrip->execute()) {
        echo "Trip information updated successfully!";
    } else {
        echo "Error updating trip information!";
    }

    $stmtUpdateTrip->close();

    // Handle thumbnail (Image) edit
    if (!empty($_FILES['thumb']['name'][0])) {
        $uploadsDir = '../uploads/';
        $allowedTypes = ['jpg', 'jpeg', 'png'];

        $thumbTmpFilePath = $_FILES['thumb']['tmp_name'][0];
        $thumbExt = pathinfo($_FILES['thumb']['name'][0], PATHINFO_EXTENSION);

        if (in_array($thumbExt, $allowedTypes)) {
            // Move the thumbnail file to the destination directory
            $newThumbFileName = 'thumbnail_' . uniqid() . '.' . $thumbExt;
            $newThumbFilePath = $uploadsDir . $newThumbFileName;

            if (move_uploaded_file($thumbTmpFilePath, $newThumbFilePath)) {
                echo "Thumbnail uploaded successfully!";
            } else {
                echo "Error uploading thumbnail!";
            }

            // Update the thumbnail path in the database
            $sqlUpdateThumb = "UPDATE trip SET Image=? WHERE id=?";
            $stmtUpdateThumb = $conn->prepare($sqlUpdateThumb);
            $stmtUpdateThumb->bind_param("si", $newThumbFilePath, $id);

            if ($stmtUpdateThumb->execute()) {
                echo "Thumbnail path updated in the database!";
            } else {
                echo "Error updating thumbnail path in the database!";
            }

            $stmtUpdateThumb->close();
        } else {
            echo "Invalid thumbnail file type!";
        }
    }

    // Handle image upload and database update for multiple images
    if (!empty($_FILES['file-input']['name'][0])) {
        $uploadsDir = '../uploads/';
        $allowedTypes = ['jpg', 'jpeg', 'png'];

        foreach ($_FILES['file-input']['name'] as $key => $imageName) {
            $tmpFilePath = $_FILES['file-input']['tmp_name'][$key];

            // Check if the file is a valid image type
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);
            if (in_array($ext, $allowedTypes)) {
                // Move the file to the destination directory
                $newFileName = uniqid() . '.' . $ext;
                $newFilePath = $uploadsDir . $newFileName;
                move_uploaded_file($tmpFilePath, $newFilePath);

                // Insert the image details into the database
                $sqlInsertImage = "INSERT INTO images (trip_id, imgUrl) VALUES (?, ?)";
                $stmtInsertImage = $conn->prepare($sqlInsertImage);
                $stmtInsertImage->bind_param("is", $id, $newFilePath);

                if ($stmtInsertImage->execute()) {
                    echo "Image uploaded and database updated successfully!";
                } else {
                    echo "Error updating database with image information!";
                }

                $stmtInsertImage->close();
            } else {
                echo "Invalid image file type!";
            }
        }
    }

    // Redirect back to the edit form
    header("location: ../forms/edittrip.php?id=" . $id);
} else {
    // Redirect to an error page or handle the error accordingly
    header("location: error.php");
}

$conn->close();
