<?php
include_once('includes/functions.php');

// Retrieve employee list from the database
$employeeList = getEmployeeList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Interface</title>
</head>
<body>
    <h2>Admin Interface</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Father's Name</th>
            <th>Mobile Number</th>
            <th>Date of Birth</th>
            <th>Applied For</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Remarks</th>
        </tr>
        <?php foreach ($employeeList as $employee): ?>
            <tr>
                <!-- Display employee details and remarks -->
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
