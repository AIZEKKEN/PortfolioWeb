<?php
session_start();

include 'connect_db.php';

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM admindata WHERE username = '$username' 
    and password = '$password'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result)

?>

<?php

if (!mysqli_num_rows($result)) {

?>

  <script>
    alert("Cannot Login Please try again")
    window.open("login.php", "_self")
  </script>

<?php
} else {

  $_SESSION["admin_id"] = $row["admin_id"];
  $_SESSION["admin_name"] = $row["admin_name"];

  session_write_close();

?>

  <script>
    alert("Welcome to login")
    window.open("product_list_for_admin.php", "_self")
  </script>

<?php

}

mysqli_close($conn);

?>