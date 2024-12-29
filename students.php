<?php
include 'db.php';

// Fetch all records from the table
$stmt = $conn->prepare("SELECT * FROM students");
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="css/style.css?v=1.1"> <!-- Add version number to bust cache -->

    <script src="js/formHandler.js" defer></script>
</head>
<body>
    <header>
        <h1>Students</h1>
        <a href="index.php">Back to Dashboard</a>
    </header>
    <main>
        <section>
            <h2>Students Table</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Enrollment Number</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= htmlspecialchars($student['id']) ?></td>
                            <td><?= htmlspecialchars($student['enrollment_number']) ?></td>
                            <td><?= htmlspecialchars($student['name']) ?></td>
                            <td><?= htmlspecialchars($student['course']) ?></td>
                            <td><?= htmlspecialchars($student['academic_year']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Add Student</h2>
            <form action="add_student.php" method="POST" id="studentForm">
                <input type="text" name="enrollment_number" placeholder="Enrollment Number" required>
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="course" placeholder="Course" required>
                <input type="text" name="academic_year" placeholder="Academic Year" required>
                <button type="submit">Add Student</button>
            </form>
        </section>
    </main>
</body>
</html>
