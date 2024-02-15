<?php
include_once('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $errors = validateForm($_POST);
    if (empty($errors)) {
        // Save data to database
        saveData($_POST);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Employee Registration Form</h2>
        <form action="register.php" method="post" enctype="multipart/form-data">
            <!-- Include form fields -->
            <?php include_once('includes/form_fields.php'); ?>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
