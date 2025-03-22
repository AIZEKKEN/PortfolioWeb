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
                alert("Please Login ")
                window.open("login.php", "_self")
            </script>
        <?php
        }

        ?>

        <div class="form_panel rounded-3">
            <h4 style="text-align: center;">Add product list</h4>
            <hr>


            <form action="product_add_save.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">

                <div class="mb-2">
                    <label for="pid" class="form-label">Id :</label>
                    <input type="text" class="form-control" id="pid" name="pid" placeholder=" 4 digit" required>
                </div>

                <div class="mb-2">
                    <label for="pname" class="form-label">Name :</label>
                    <input type="text" class="form-control" id="pname" name="pname" required>
                </div>

                <div class="mb-2">
                    <label for="pdetail" class="form-label">Description :</label>
                    <textarea class="form-control" id="pdetail" rows="3" name="pdetail" required></textarea>
                </div>
                <div class="mb-2">
                    <label for="pprice" class="form-label">Prices :</label>
                    <input type="text" class="form-control" id="pprice" name="pprice" required>
                </div>

                <div class="mb-3">
                    <label for="filename" class="form-label">Image</label>
                    <input class="form-control" type="file" id="filename" name="filename">
                </div>


                <button type="submit" class="btn btn-primary mx-auto d-block">Save</button>

            </form>

        </div>

        <?php
        include("footer.php");
        ?>


    </div>



</body>

</html>