<?php

// Connecting to the database
$con = mysqli_connect('localhost', 'root', '', 'proj_wantto');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


    // Inserting user data into the database
    $query = "ALTER TABLE users
ADD contact varchar(100)";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Insertion failed: " . mysqli_error($con));
    }




    // Close the connection
mysqli_close($con);
?>