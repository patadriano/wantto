<?php

// Connecting to the database
$con = mysqli_connect('localhost', 'root', '', 'proj_wantto');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


    // Inserting user data into the database
    $query = "INSERT INTO products (user_id, username, product_pic, price, product_title, type)VALUES (3, 'john_doeu', 'https://img-cdn.pixlr.com/image-generator/history/65bb506dcb310754719cf81f/ede935de-1138-4f66-8ed7-44bd16efc709/medium.webp', 160, 'Sampble Product', 'buy')";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Insertion failed: " . mysqli_error($con));
    }

// Close the connection
mysqli_close($con);
?>