<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection (replace with your credentials)
    $conn = new mysqli("localhost", "username"," "password", "database");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve hashed password from the database
    $sql = "SELECT password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row["password"])) {
            echo "Login successful!";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    // Close connection
    $conn->close();
}
?>