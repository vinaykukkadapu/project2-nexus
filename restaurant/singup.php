<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vinaydb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST["username"];
    $emailId = $_POST["emailid"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Hash the email to create a valid table name
    $hashedEmail = md5($emailId);

    // Create the user table if it doesn't exist
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS $hashedEmail (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        emailid VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    if ($conn->query($sqlCreateTable) === TRUE) {
        // Insert user data into the created table
        $sqlInsert = "INSERT INTO $hashedEmail (username, emailid, password) VALUES ('$username','$emailId', '$password')";
        if ($conn->query($sqlInsert) === TRUE) {
            echo "Signup successful";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>
