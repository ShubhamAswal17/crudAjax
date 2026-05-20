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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <section class="bodydata">
        <div class="container">
            <div class="col-md">
                <h2>plz login fill form</h2>
                <form id="loginuser" action="login.php" method="POST" class="row g-3">

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
            <div>
                <h2 id="response"></h2>
            </div>
            </form>
        </div>
        </div>
    </section>


    <script>
        $("#loginuser").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "loginajax.php",
                type: "POST",
                data: formData,

                dataType: "json",
                processData: false,
                contentType: false,

                beforeSend: function () {

                    $("#response").html("Checking...");

                },
                success: function (response) {

                    if (response.status === "success") {
                        // window.location.href = "index.php";
                        location.href = "index.php";
                        $("#response").html(response.message);
                    } else if (response.status === "error") {
                        $("#response").html(response.message);
                    }

                }
            });
        });
    </script>
</body>

</html>