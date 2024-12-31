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

    // Fetch user from the database
    $query = $conn->prepare("SELECT id, password FROM users WHERE username = ? AND role = ?");
    $query->bind_param("ss", $username, $role);
    $query->execute();
    $query->store_result();

    if ($query->num_rows > 0) {
        $query->bind_result($userId, $hashedPassword);
        $query->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            // Successful login
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Redirect based on user role
            switch ($role) {
                case 'student':
                    header("Location: students.php");
                    break;
                case 'teacher':
                    header("Location: teachers.php");
                    break;
                case 'non_teaching_staff':
                    header("Location: non_teaching_staff.php");
                    break;
                case 'it_manager':
                    header("Location: it_managers.php");
                    break;
                default:
                    header("Location: support_tickets.php");
                    break;
            }
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "User not found. Please sign up.";
    }

    $query->close();
    $conn->close();
}
?>
