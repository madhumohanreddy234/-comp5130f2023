<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process the form data here
                // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "IWSHW3";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

            $current_location = $_POST["current_location"];
            $origin_location = $_POST["origin_location"];
            $desired_location = $_POST["desired_location"];
            $family_origin = $_POST["family_origin"];
            $place_of_birth = $_POST["place_of_birth"];
            $current_residence = $_POST["current_residence"];
            $desired_residence = $_POST["desired_residence"];
            $significant_other = $_POST["significant_other"];
            $my_investment = $_POST["my_investment"];
            $family_investment = $_POST["family_investment"];
            $other_investment = $_POST["other_investment"];
            $user_picture = $_POST["user_picture"];
            $resume_cv=$_POST["resume_cv"];
            $other_facts = $_POST["other_facts"];

            // You can perform further actions with the form data here

            // Display a confirmation message
            echo "<h2 class='mt-4'>Thank you for submitting your information!</h2>";
            $sql = "INSERT INTO userdetails (current_location, origin_location, desired_location, family_origin, place_of_birth, current_residence, significant_other, my_investment, family_investment, other_investment, user_picture, resume_cv,other_facts)
            VALUES ('$current_location', '$origin_location', '$desired_location', '$family_origin', '$place_of_birth', '$current_residence', '$desired_residence', '$significant_other', '$my_investment', '$family_investment', '$other_investment', '$user_picture','$resume_cv','$other_facts')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>