<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enrollment_number = $_POST['enrollment_number'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $academic_year = $_POST['academic_year'];

    $stmt = $conn->prepare("INSERT INTO students (enrollment_number, name, course, academic_year) 
                            VALUES (:enrollment_number, :name, :course, :academic_year)");
    $stmt->bindParam(':enrollment_number', $enrollment_number);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':academic_year', $academic_year);

    $stmt->execute();

    header('Location: students.php');
    exit();
}
?>