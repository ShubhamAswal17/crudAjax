<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <section>
        <div class="container-md p-4 m-4">
            <div class="addform">
                <form id="userformdata" action="register.php" method="POST">
                    <div class="row g-3">
                        <div class="col m-4">
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                aria-label="First name">
                        </div>
                        <div class="col m-4">
                            <input type="email" name="email" class="form-control" placeholder="Enter  Email"
                                aria-label="First name">
                        </div>

                    </div>
                    <div class="row g-3">
                        <div class="col m-4">
                            <input type="text" name="address" class="form-control" placeholder="Enter Address"
                                aria-label="address">
                        </div>
                        <div class="col m-4">
                            <select class="form-select form-select-sm" name="status" aria-label="Small select example">
                                <option selected value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 p-4">
                        <div class="col m-4">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password"
                                aria-label="address">
                        </div>
                    </div>
                    <button class="btn btn-primary m-3" type="submit" name="formdata">submit</button>
                    <div id="response"></div>
                </form>
            </div>
        </div>
    </section>

    <script>
        $("#userformdata").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: formData,

                dataType: "json",
                processData: false,
                contentType: false,

                beforeSend: function () {

                    $("#response").html("Uploading...");

                },
                success: function (response) {

                    if (response.status === "success") {

                        location.href = "login.php";
                    }

                }
            });
        });
    </script>
</body>

</html>
