<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="">Ecs Mall</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">ระบบสุ่มโค้ดส่วนลด</h3>
		<hr style="border-top:1px dotted #ccc;" />
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_coupon"><span class="glyphicon glyphicon-plus"></span> สร้างคูปอง</button>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_product"><span class="glyphicon glyphicon-plus"></span> เพิ่มสินค่้า</button>
		<br />
		<br />
		<?php
		require 'conn.php';

		$query = mysqli_query($conn, "SELECT * FROM `product`") or die(mysqli_error());
		while ($fetch = mysqli_fetch_array($query)) {
		?>
			<div class="col-md-3" style="border:1px solid #ccc; padding:10px; margin:23px; height:250px;">
				<img src="<?php echo $fetch['product_image'] ?>" width="100%" />
				<center>
					<h5><?php echo $fetch['product_name'] ?></h5>
				</center>
				<center>
					<h5>&#3647;<?php echo number_format($fetch['product_price']) ?></h5>
				</center>
				<br />
				<center><a href="purchase.php?product_id=<?php echo $fetch['product_id'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> ซื้อ</a></center>
			</div>
		<?php
		}
		?>
	</div>
	<div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<form action="save_coupon.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>โค้ดคูปอง</label>
								<input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required" />
								<br />
								<button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> สร้างคูปอง</button>
							</div>
							<div class="form-group">
								<label>ส่วนลด</label>
								<input type="number" class="form-control" name="discount" min="10" required="required" />
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ปิด</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> บันทึก</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade" id="form_product" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<form action="save_product.php" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>ชื่อสินค้า</label>
								<input type="text" class="form-control" name="product_name" required="required" />
							</div>
							<div class="form-group">
								<label>ราคาสินค้า</label>
								<input type="number" class="form-control" name="product_price" min="0" required="required" />
							</div>
							<div class="form-group">
								<label>รูปภาพสินค้า</label>
								<input type="file" class="form-control" name="product_image" required="required" />
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ปิด</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> บันทึก</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#generate').on('click', function() {
				$.get("get_coupon.php", function(data) {
					$('#coupon').val(data);
				});
			});
		});
	</script>
</body>

</html>