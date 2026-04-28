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
    <section class="bodydata">
        <div class="container">
            <div class="col-md">
                <h2>plz login fill form</h2>
                <form action="login.php" method="POST" class="row g-3">

                    <div class="col-md-6">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email">
                    </div>
                    <div class="col-md-6">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>


            </div>
            <div class="col-12">
                <button type="submit" m-2 p-2 class="btn btn-primary" name="loginuser">Sign in</button>
            </div>
            </form>

            <?php
            require_once "connection.php";
            if(isset($_POST["loginuser"])){
                $email=$_POST["email"];
                $raw_password=$_POST["password"];
                if(empty($email) || empty($raw_password)){
                    echo " is empty";
                }
                else{
                    $password = md5($raw_password);
                    $qry="SELECT * FROM user WHERE email='$email' AND password='$password'";                  
                    $result=mysqli_query($connect,$qry);
                   $data=mysqli_num_rows($result);
                    if($data==1){     
                        header("Location:index.php");                 
                       
                    }else{
                        echo "data incorect";
                    }
                   
                }
            }


        ?>
        </div>
        </div>
    </section>
</body>

</html>