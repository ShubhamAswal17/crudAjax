<?php
require_once "connection.php";

if(isset($_GET['editid'])){
    $id=$_GET['editid'];
    $query = "SELECT * FROM users WHERE id ='$id'";
    $results = mysqli_query($connect, $query);
    $dataa = mysqli_num_rows($results);
    $data = mysqli_fetch_all($results, MYSQLI_ASSOC);
    foreach ($data as $userdata) {

    }
    echo json_encode([
        'status'=>'success',
        'message'=>'Edit data fetch successfully',
        'data'=>$userdata
    ]);
}
if(isset($_POST["updatedata"])){
    $id=$_POST["userid"];

    $query = "SELECT * FROM users WHERE id ='$id'";
    $results = mysqli_query($connect, $query);
    $dataa = mysqli_num_rows($results);
    $data = mysqli_fetch_all($results, MYSQLI_ASSOC);
    foreach ($data as $userdata) {

    }
    $dbpassword=$userdata['password'];

    $name=$_POST["name"];
    $email=$_POST["email"];
    $oldpassword=md5($_POST["oldpassword"]);
    $clean_password=$_POST["newpassword"];
    $address=$_POST["address"];
    $status=$_POST["status"];
    if(empty($name) || empty($email) || empty($address) || empty($status) || empty($oldpassword) || empty($clean_password)){
        echo " is empty";
    }elseif($dbpassword !== $oldpassword){
        echo "old password are not match";
    }else{
        $password=md5($clean_password);
        $update="UPDATE user SET name='$name', email='$email', password='$password', address= '$address',status='$status' WHERE id='$id'";
        $result=mysqli_query($connect,$update);
        if($result>0){
            header("Location:index.php");
        }else{
            echo "data incorect";
        }
    }
}



?>
<?php
// require_once "connection.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
</head>

<body>
    <section>
        <div class="container-md p-4 m-4">
            <div class="addform">
                <form id="updateForm" action="update.php" method="POST">
                    <div class="row g-3">
                        <div class="col m-4">
                            <input type="hidden" name="userid" value="<?php echo $userdata['id']; ?>"
                                class="form-control">
                            <input type="text" name="name" value="<?php echo $userdata['name']; ?>" class="form-control"
                                placeholder="Enter Name" aria-label="First name">
                        </div>
                        <div class="col m-4">
                            <input type="email" name="email" value="<?php echo $userdata['email']; ?>"
                                class="form-control" placeholder="Enter  Email" aria-label="First name">
                        </div>

                    </div>
                    <div class="row g-3">
                        <div class="col m-4">
                            <input type="text" name="address" value="<?php echo $userdata['address']; ?>"
                                class="form-control" placeholder="Enter Address" aria-label="address">
                        </div>
                        <div class="col m-4">
                            <select class="form-select form-select-sm" name="status" aria-label="Small select example">
                                <?php
                                if ($userdata['status'] === 'active') {
                                    ?>
                                    <option selected value="active">active</option>
                                    <option value="inactive">inactive</option>
                                <?php
                                } else {
                                    ?>
                                    <option value="active">active</option>
                                    <option selected value="inactive">inactive</option>
                                    <?php
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row g-3 ">
                        <div class="col m-4">
                            <input type="password" name="oldpassword" class="form-control"
                                placeholder="Enter old Password" aria-label="address">
                        </div>
                        <div class="col m-4">
                            <input type="password" name="newpassword" class="form-control"
                                placeholder="Enter new Password" aria-label="address">
                        </div>
                    </div>
                    <button class="btn btn-primary m-3" type="submit" name="updatedata">submit</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>