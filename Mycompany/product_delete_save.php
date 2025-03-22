<?php
session_start();

if ($_SESSION['admin_id'] == "") {
?>
    <script>
        alert("Please login")
        window.open("login.php", "_self")
    </script>
<?php
}

require_once "connect_db.php";

$pid = $_GET['pid'];
$sqlfilename = "SELECT * FROM product WHERE p_id = '$pid'";
$resultfilename = mysqli_query($conn, $sqlfilename);
$rowfilename = mysqli_fetch_assoc($resultfilename);
$filename = "product_images/" . $rowfilename["p_image"];

$sql = "DELETE FROM product WHERE p_id = '$pid'";
$delete_image_done = unlink($filename);

if (mysqli_query($conn, $sql) && $delete_image_done) {

?>
    <script>
        alert("Delte data sucess")
        window.open("product_list_for_admin.php", "_self")
    </script>
<?php
} else {
?>
    <script>
        alert("Cannot delete data")
        window.open("product_list_for_admin.php", "_self")
    </script>
<?php
}
?>