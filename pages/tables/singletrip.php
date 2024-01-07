<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Details</title>
    <style>
    /* Add your styling here */
    body {
        text-transform: capitalize;
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .trip-details {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

    .trip-thumbnail {
        max-width: 100%;
        height: 200px;
    }

    .image-gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
    }

    .gallery-image {
        flex-basis: 30%;
        margin: 5px;
    }

    .gallery-image img {
        max-width: 100%;
        height: auto;
    }

    @media screen and (max-width:800px) {

        .image-gallery {
            display: flex;
            flex-direction: column;
        }

        .image-gallery img {
            width: 100%;
        }

        .buttons a {
            margin: 10px;
        }
    }
    </style>
</head>

<body>
    <?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM trip WHERE id = '$id'";
    $sql2 = "SELECT * FROM images WHERE trip_id = '$id'";

    // Assuming you have a database connection
    include("../../connection.php");

    // Execute the first query to get trip details
    $result1 = $conn->query($sql);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
    ?>
    <div class="trip-details">
        <h1><?php echo $row1['Title']; ?></h1>
        <p>Date: <?php echo $row1['trip_date']; ?></p>
        <p>Capacity: <?php echo $row1['capacity']; ?></p>
        <p>Price: <?php echo $row1['price']; ?></p>
        <p>Description: <?php echo $row1['description']; ?></p>
        <p>Date Posted: <?php echo $row1['posted']; ?> </p>

        <img class="trip-thumbnail" src="<?php echo $row1['Image']; ?>" alt="Thumbnail">
    </div>
    <style>
    .image-gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
    }

    .gallery-image {
        display: flex;
        flex-wrap: wrap;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
        margin: 5px;
    }

    .gallery-image:hover {
        transform: scale(1.05);
    }

    .gallery-image-img {
        max-width: 200px !important;
        height: 200px !important;
        display: block;
        margin: 0 auto;
        /* Center the image */
    }

    .image-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 10px;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .gallery-image:hover .image-overlay {
        opacity: 1;
    }

    .delete-link {
        color: #fff;
        text-decoration: none;
    }
    </style>





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
                <a href="deleteimg.php?tripid=<?php echo $id; ?>&id=<?php echo $row2['id']; ?>"
                    class="delete-link">Delete</a>
            </div>
        </div>
        <?php } ?>
    </div>



    <?php
        } else {
            echo "No images available for this trip.";
        }
    } else {
        echo "No trip found with the provided ID.";
    }


    // Close the database connection
    $conn->close();
    ?>
    <div class="buttons">
        <a href="../forms/edittrip.php?id=<?php echo $id; ?>">Update Trip</a>
        <a href="#" id="deleteTrip">Delete Trip</a>
        <a href="./viewtrip.php">View All trips</a>

    </div>
    <style>
    .buttons {
        margin-top: 20px;
    }

    #deleteTrip {
        background-color: red !important;
    }

    .buttons a {
        display: inline-block;
        padding: 10px 20px;
        margin-right: 10px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .buttons a:hover {
        background-color: #2980b9;
    }
    </style>
    <script>
    document.getElementById('deleteTrip').addEventListener('click', function() {
        var confirmDelete = confirm("Are you sure you want to delete the trip?");
        if (confirmDelete) {
            // If the user confirms, redirect to deletetrip.php
            window.location.href = "deletetrip.php?id=<?php echo $id; ?>";
        }
    });
    </script>
</body>

</html>