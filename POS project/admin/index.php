<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS ECS </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="" href="mem_img/2.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">



</head>


<style>
  .hold-transition {
    background-image: url("p_img/winter.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }
</style>


<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">

    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <center><img width="250 px" src="mem_img/2.jpg"><br>
          <h3><b>ECS Mall</h3> <br>
          <h4>Please Login</h4>
        </center><br>
        <!--  <p class="login-box-msg">เข้าสู่ระบบ</p> -->

        <form action="chk_login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="mem_username" id="mem_username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user text-primary"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="mem_password" id="mem_password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock text-primary"></span>
              </div>
            </div>
          </div>

          <div class="social-auth-links text-center mb-3">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </form>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</body>


<!-- jQuery -->
<script src="assets/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/bootstrap.bundle.min.js"></script>


</html>