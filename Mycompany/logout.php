<?php
session_start();

if ($_SESSION['admin_id'] == "") {
?>
    <script>
        alert("Please login")
        window.open("login.php", "_self")
    </script>
<?php
    exit();
}

$_SESSION["admin_id"] = "";
$_SESSION["admin_name"] = "";
$_SESSion["admin_password"] = "";

session_write_close();

?>
<script>
    alert("Logout Sucess")
    window.open("index.php", "_self")
</script>