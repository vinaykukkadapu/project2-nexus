<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
        <title>Dashboard</title>
    </head>
    <body>
        <div class='dashboard-container'>
            <h2>Welcome ".$_SESSION['username']."!</h2>
            <p>This is your dashboard. Add content here.</p>
        </div>
    </body>
    </html>";
} else {
    header("Location: login.html");
    exit();
}
?>
