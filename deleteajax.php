<?php
require_once "connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];
        $qryy = "DELETE FROM users WHERE id='$id'";
        $qryyresult = mysqli_query($connect, $qryy);
        if ($qryyresult > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'user deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'failed to delete user'
            ]);
        }
    }
}
?>