<?php
require_once "connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'all fields are required'
        ]);
    } else {
        $sqli = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connect, $sqli);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'login successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'invalid credintials'
            ]);
        }
    }
}
?>