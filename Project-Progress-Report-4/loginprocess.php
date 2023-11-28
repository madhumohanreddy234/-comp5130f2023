<?php

$servername = "localhost"; 
$username = "your_username"; 
$password = ""; 
$dbname = "your_database"; 

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform a query to check user credentials (this is a simple example, NOT secure against SQL injection)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authentication successful
        // Redirect the user to a welcome page or perform further actions
        header("Location: welcome.php");
        exit();
    } else {
        // User authentication failed
        // Redirect the user back to the login page or display an error message
        header("Location: login_failed.php");
        exit();
    }
}
?>
