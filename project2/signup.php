<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection (replace with your credentials)
    $conn = new mysqli("localhost", "username", "Email","Phone number","password","Confirm Password","userdetails");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (username,Email, password,Phone number,Confirm Password) VALUES ('$username','$Email','$Phone number','$password','Confirm Passwword')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>