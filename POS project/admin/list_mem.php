<?php
$menu = "member"
?>
<?php include("header.php"); ?>
<?php
$query_member = "SELECT * FROM tbl_member" or die
("Error : ".mysqlierror($query_member));
$rs_member = mysqli_query($condb, $query_member);
//echo ($query_level);//test query
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#blah').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Member</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-orange">
      <div class="card-header ">
        <h3 class="card-title" style="color:aliceblue;">List member</h3>
        <div align="right">
          
          
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add data member</button>
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-6">
            <table id="example1" class="table table-bordered  table-hover table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%"><center>No.</center></th>
                  <th width="10%">Img</th>
                  <th width="35%">Name</th>
                  <th width="20%">edit</th>
                  <th width="20%">del</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs_member as $row_member) { ?>
                
                
                <tr>
                  <td><?php echo @$l+=1; ?></td>
                  <td><img src="../mem_img/<?php echo $row_member['mem_img']; ?>" width="100%"></td>
                  <td><?php echo $row_member['mem_name']; ?></td>
                  <td>
                    <p style="margin-bottom: 10px;">
                      <a href="mem_edit.php?mem_id=<?php echo $row_member['mem_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> edit</a>
                    </p>
                    
                    <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_level['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->
                  </td>
                  <td><a href="member_db.php?mem_id=<?php echo $row_member['mem_id']; ?>&&member=del" class="del-btn btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลนี้')" ><i class="fas fas fa-trash"></i> del</a></td>
                  
                </tr>
                <?php }?>
              </tbody>
            </table>
            
          
            
          </div>
          
        </div>
      </div>
      <div class="card-footer">
        
      </div>
      
    </div>
    
    
    
    
  </section>
  <!-- /.content -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="member_db.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="member" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">Add member</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Level </label>
              <div class="col-sm-10">
                <select class="form-control select2" name="ref_l_id" id="ref_l_id" required>
                  <option value="">-- Choose type --</option>
                  
                  <option value="1">Admin</option>
                  <option value="2">Employee</option>
                  
                </select>
                
              </div>
            </div>
            
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Name </label>
              <div class="col-sm-10">
                <input type="text" name="mem_name" class="form-control" id="mem_name" placeholder="" value="">
              </div>
            </div>
            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Username </label>
            <div class="col-sm-10">
              <input type="text" name="mem_username" class="form-control" id="mem_username" placeholder="" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password </label>
            <div class="col-sm-10">
              <input type="text" name="mem_password" class="form-control" id="mem_password" placeholder="ใส่รหัสผ่านก่อนกดบันทึก" value="" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">img</label>
            <div class="col-sm-10">
              
              
              
              
              Choose new file<br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="mem_img" name="mem_img" onchange="readURL(this);" >
                <label class="custom-file-label" for="file">Choose file</label>
              </div>
              <br><br>
              <img id="blah" src="#" alt="your image" width="300" />
            </div>
          </div>
          
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
        </div>
      </div>
    </form>
  </div>
</div>

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
//   "autoWidth": false,

// });
});
</script>

</body>
</html>
