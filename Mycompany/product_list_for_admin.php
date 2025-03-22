<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    $page = "admin";
    include "htmlhead.php";
    ?>

    <!-- link for datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <!-- link for datatable -->
</head>

<body>
    <div class="container bg-light p-2 my-2">

        <?php
        include "pageheader.php";
        include "navbar.php";
        ?>

        <?php
        if ($_SESSION['admin_id'] == "") {
        ?>
            <script>
                alert("Please login")
                window.open("login.php", "_self")
            </script>
        <?php
        } else {
            require_once "connect_db.php";
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn, $sql);
        ?>

            <div class="userinfo round-3">
                <strong>ผู้ใช้งาน : </strong><?= $_SESSION["admin_name"]; ?>
            </div>
            <h4 style="text-align: center;">Product list</h4>
            <hr>

            <div class="table-responsive px-5">
                <table id="producttable" class="table table-striped">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Product</th>
                            <th>Prices</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>

                                <td><?= $row["p_id"]; ?></td>
                                <td><?= $row["p_name"]; ?></td>
                                <td><?= $row["p_price"]; ?></td>
                                <td>
                                    <img src="<?php echo "product_images/" . $row["p_image"]; ?>" class="img-thumbnail" width="50px" alt="product image">
                                </td>
                                <td><a href="product_edit_form.php?pid=<?= $row["p_id"]; ?>">Edit</a></td>
                                <td><a href="product_delete_save.php?pid=<?= $row["p_id"]; ?>" onclick="return confirm('Do you want to delete data?');">Delete</a></td>

                            </tr>
                    <?php
                        }
                        mysqli_close($conn);
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <br>
            <button type="button" class="btn btn-primary d-block m-auto" onclick="window.location.href='product_add_form.php'">Add product</button>
            <br>


            <?php
            include("footer.php");
            ?>

    </div>



    <!-- Java Script for datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#producttable').DataTable();
        });
    </script>
    <!-- Java Script for datatable -->


</body>

</html>