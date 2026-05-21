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
                    $query = "SELECT * FROM users";
                    $results = mysqli_query($connect, $query);
                    $dataa = mysqli_num_rows($results);
                    if (mysqli_num_rows($results) == 0) {
                        header("location:register.php");
                    } else {
                        $data = mysqli_fetch_all($results, MYSQLI_ASSOC);
                        foreach ($data as $userdata) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $userdata['id']; ?></th>
                                <td><?php echo $userdata['name']; ?></td>
                                <td><?php echo $userdata['email']; ?></td>
                                <td><?php echo $userdata['address']; ?></td>
                                <td><?php echo $userdata['status']; ?></td>
                                <td>
                                    <button class="btn btn-danger" data-id="<?php echo $userdata['id']; ?>">Delete</button>
                                    <button class="btn btn-primary" data-id="<?php echo $userdata['id']; ?>">Edit</button>
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
    <script>
        $(document).on('click', '.btn-danger', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "deleteajax.php?deleteid=" + id,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        location.href = "index.php";
                    } else if (response.status === "error") {
                        alert(response.message);
                    }
                }
            })

        });
        $(document).on('click','btn-primary',function(e){
            e.preventDefault();
            var id=$(this).data('id');
            $.ajax({
                url:"update.php?editid="+id,
                type:"GET",
                dataType:"json",
                success:function(response){
                    if(response.status==="success"){
                        location.href="edit.php";
                    }else if(response.status==="error"){
                        alert(response.message);
                    }
                }
            })
        })
    </script>
</body>

</html>
