<?php
require_once "connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $password = $_POST['password'];
    if (empty($name) || empty($email) || empty($address) || empty($status) || empty($password)) {
        echo "all fields are required";
    } else {
        $sql = "INSERT INTO users (name,email,address,status,password) VALUES ('$name','$email','$address','$status','$password')";
        if (mysqli_query($connect, $sql)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data insertd successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => mysqli_error($connect)
            ]);
        }
    }
}

?>