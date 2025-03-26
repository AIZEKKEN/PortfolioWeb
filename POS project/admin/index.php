<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-orange">
      <div class="card-header ">
        <h3 class="card-title" style="color:aliceblue;">List order</h3>
        <div align="right">
  
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-12">
            
          <?php 

                   $act = (isset($_GET['act']) ? $_GET['act'] : '');
                    if($act =='view'){

                      include('order_detail.php');

                   
                      }else{

                  include('list_order.php');
                    } ?>
      
          </div>
          
        </div>
      </div>
      <div class="card-footer">
        
      </div>
      
    </div>
    
    
    
    
  </section>
  <!-- /.content -->
  
  
  <?php include('footer.php'); ?>
  <script>
  $(function () {
  $(".datatable").DataTable();
  // $('#example2').DataTable({
  //   "paging": true,
  //   "lengthChange": false,
  //   "searching": false,
  //   "ordering": true,
  //   "info": true,
  // });/   "autoWidth": false,

  });
  </script>
  
</body>
</html>
