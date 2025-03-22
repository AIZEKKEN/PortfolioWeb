<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include "htmlhead.php";
    ?>
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
        }
        ?>

        <?php
        include "connect_db.php";
        $pid = $_GET['pid'];
        $sql = "SELECT * FROM product WHERE p_id = '$pid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result)
        ?>
        <div class="form_panel rounded-3">
            <h4 style="text-align: center;">Edit product</h4>
            <hr>


            <form action="product_edit_save.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

                <div class="mb-2">
                    <label for="pid" class="form-label">Id:</label>
                    <input type="text" class="form-control" id="pid" name="pid" value="<?= $row["p_id"]; ?>">
                </div>

                <div class="mb-2">
                    <label for="pname" class="form-label">Product :</label>
                    <input type="text" class="form-control" id="pname" name="pname" value="<?= $row["p_name"]; ?>">
                </div>

                <div class="mb-2">
                    <label for="pdetail" class="form-label">Description :</label>
                    <textarea class="form-control" id="pdetail" rows="3" name="pdetail"><?= $row["p_detail"]; ?></textarea>
                </div>
                <div class="mb-2">
                    <label for="pprice" class="form-label">Prices:</label>
                    <input type="text" class="form-control" id="pprice" name="pprice" value="<?= $row["p_price"]; ?>">
                </div>

                <div class="mb-3">
                    <label for="filename" class="form-label">Image</label>
                    <input class="form-control" type="file" id="filename" name="filename">
                </div>


                <button type="submit" class="btn btn-primary mx-auto d-block">Save data edit</button>

            </form>

        </div>


        <?php
        include "footer.php";
        ?>


    </div>


</body>

</html>