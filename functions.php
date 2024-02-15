<?php
include_once('db_config.php');

function validateForm($data) {
    $errors = [];

    // Name and Father's Name validation
    if (!preg_match("/^[a-zA-Z ]*$/", $data['name'])) {
        $errors['name'] = "Only alphabetic characters and spaces are allowed for the name.";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $data['father_name'])) {
        $errors['father_name'] = "Only alphabetic characters and spaces are allowed for Father's name.";
    }

    // Mobile Number validation
    if (!preg_match("/^[0-9]{10}$/", $data['mobile_number'])) {
        $errors['mobile_number'] = "Mobile number must be numeric and 10 digits long.";
    }

    // Email validation
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Date of Birth validation
    $dob = new DateTime($data['dob']);
    $today = new DateTime();
    $age = $today->diff($dob)->y;
    if ($age < 18) {
        $errors['dob'] = "Applicant must be 18 years or older.";
    }

    // Other field validations...

    return $errors;
}

function saveData($data) {
    global $conn;

    // Escape and sanitize input data
    $name = mysqli_real_escape_string($conn, $data['name']);
    $father_name = mysqli_real_escape_string($conn, $data['father_name']);
    $mobile_number = mysqli_real_escape_string($conn, $data['mobile_number']);
    $dob = mysqli_real_escape_string($conn, $data['dob']);
    $applied_for = mysqli_real_escape_string($conn, $data['applied_for']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    // Handle file upload for photo...

    // SQL query to insert data into the database
    $sql = "INSERT INTO employees (name, father_name, mobile_number, dob, applied_for, email) 
            VALUES ('$name', '$father_name', '$mobile_number', '$dob', '$applied_for', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getEmployeeList() {
    global $conn;

    $employeeList = [];
    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employeeList[] = $row;
        }
    }

    return $employeeList;
}
?>
