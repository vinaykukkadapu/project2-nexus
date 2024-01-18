<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vinaydb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $emailID = $_POST["emailid"];
    $password = $_POST["password"];

    // Hash the email to create a valid table name
    $hashedEmail = md5($emailID);

    // Update the SQL query to select data from the correct table
    
    $sql = "SELECT * FROM $hashedEmail WHERE emailid='$username' AND password='$password'";
    
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        // Set session variable for the logged-in user
        $_SESSION['username'] = $username;

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Login failed. Invalid username or password. <a href='signup.html'>Register</a>";
    }
    $conn->close();
}
?>
