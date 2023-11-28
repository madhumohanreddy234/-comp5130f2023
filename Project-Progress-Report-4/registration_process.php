<?php
// Database connection details
$servername = "your_servername";
$username = "your_username";
$password = "";
$dbname = "your_database_name";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement to insert user data into a table (replace 'users' with your table name)
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, mobile_number, dob, username, password)
                            VALUES (:first_name, :last_name, :email, :mobile_number, :dob, :username, :password)");

    // Bind parameters
    $stmt->bindParam(':first_name', $_POST['firstName']);
    $stmt->bindParam(':last_name', $_POST['lastName']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':mobile_number', $_POST['mobileNumber']);
    $stmt->bindParam(':dob', $_POST['dob']);
    $stmt->bindParam(':username', $_POST['username']);
    // Hash the password before storing it in the database for security
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $hashedPassword);

    // Execute the prepared statement
    $stmt->execute();

    // Redirect to a success page after registration
    header("Location: registration_success.php");
    exit();
} catch(PDOException $e) {
    // Redirect to an error page if there's an error in registration
    header("Location: registration_error.php");
    exit();
}
?>
