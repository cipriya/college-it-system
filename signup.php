<?php
// Connect to database
$servername = "localhost";
$username = "root";  // Replace with your DB username
$password = "";      // Replace with your DB password
$dbname = "college_it_system";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if username already exists
    $checkQuery = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $checkQuery->bind_param("s", $username);
    $checkQuery->execute();
    $checkQuery->store_result();

    if ($checkQuery->num_rows > 0) {
        echo "Username already exists. Please choose another.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user into the database
        $query = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $query->bind_param("sss", $username, $hashedPassword, $role);

        if ($query->execute()) {
            echo "Sign up successful!";
            // Redirect to login page after successful signup
            header("Location: login.php");
        } else {
            echo "Error: " . $query->error;
        }
    }

    $checkQuery->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Similar styles as the login page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .signup-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            font-size: 18px;
            margin: 10px 0;
            color: #555;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #7c5fff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }
        button:hover {
            background-color: #5b3fdb;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                <option value="non_teaching_staff">Non-Teaching Staff</option>
                <option value="it_manager">IT Manager</option>
            </select>

            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
