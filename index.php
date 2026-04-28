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

    <section class="datashow">
        <div class="container-md">
            <table class="table">
                <tbody>
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>

                    
<?php
 require_once "connection.php";
 $query="SELECT * FROM user";
 $results=mysqli_query($connect,$query);
 $dataa=mysqli_num_rows($results);
 if(mysqli_num_rows($results)==0){
    header("location:register.php");
 }else{ 
 $data=mysqli_fetch_all($results,MYSQLI_ASSOC);
 foreach($data as $userdata){
?>
                    <tr>
                        <th scope="row"><?php echo $userdata['id']; ?></th>
                        <td><?php echo $userdata['name']; ?></td>
                        <td><?php echo $userdata['email']; ?></td>
                        <td><?php echo $userdata['address']; ?></td>
                        <td><?php echo $userdata['status']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $userdata['id']; ?>" class="btn btn-primary m-3">Edit</a>
                            <a href="index.php?deleteid=<?php echo  $userdata['id']; ?>" class="btn btn-danger m-3" name="deleteuser">Delete</a>
                        </td>
                    </tr>
<?php
}
}
?>
                </tbody>
            </table>
        </div>

    </section>
</body>

</html>
   <?php
            require_once "connection.php";
            if(isset($_GET["deleteid"])){
               $id=$_GET['deleteid'];
                $qryy="DELETE FROM user WHERE id='$id'";
                $qryyresult=mysqli_query($connect,$qryy);
                if($qryyresult>0){
                    header("location:index.php");
                }
            }


        ?>