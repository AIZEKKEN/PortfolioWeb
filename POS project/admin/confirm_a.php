<?php
$menu = "sale";
?>

<?php include("header.php"); ?>

<?php

//echo'<pre>';
//print_r($_SESSION);
//echo'</pre>';
//exit();



error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$mem_id = $_SESSION['mem_id'];
$mem_address = $_SESSION['mem_address'];
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<h1>All list Order</h1>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">


	<div class="card card-orange">
		<div class="card-header ">
			<h3 class="card-title" style="color: white;">Confirm order</h3>
		</div>
		<br>



		<div class="card-body">

			<div class="col-md-12">

				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12">
							<form id="frmcart" name="frmcart" method="post" action="saveorder_a.php">
								<?php if ($_id != '') { ?>

									<h4>Confirm Order<br>
										ผู้ซื้อ : <?php echo $row_member['mem_name']; ?> <br />Address : <?php echo $row_member['mem_address']; ?>
									</h4>
								<?php } ?>

								<table border="0" align="center" class="table table-hover table-bordered table-striped">

									<tr>
										<td width="5%" align="center">List order</td>
										<td width="10%" align="center">img</td>
										<td width="40%" align="center">Product</td>
										<td width="10%" align="center">Price</td>
										<td width="10%" align="center">Total</td>
										<td width="15%" align="center">Amount(Baht)</td>

									</tr>
									<?php

									$total = 0;
									if (!empty($_SESSION['cart'])) {

										foreach ($_SESSION['cart'] as $p_id => $qty) {
											$sql = "SELECT * FROM tbl_product where p_id=$p_id";
											$query = mysqli_query($condb, $sql);
											$row = mysqli_fetch_array($query);
											$sum = $row['p_price'] * $qty; //เอาราคาสินค้ามา * จำนวนในตระกร้า
											$total += $sum; //ราคารวม ทั้ง ตระกร้า
											echo "<tr>";
											echo "<td>" . $i += 1 . "</td>";
											echo "<td>" . "<img src='../p_img/" . $row['p_img'] . "' width='100%'>" . "</td>";
											echo "<td>"

												. $row["p_name"]
												. "<br>"
												. "สต๊อก "
												. $row['p_qty']
												. " List"

												. "</td>";
											echo "<td align='right'>" . number_format($row["p_price"], 2) . "</td>";
											echo "<td align='right'>";



											$pqty = $row['p_qty']; //ประกาศตัวแปรจำนวนสินค้าใน stock
											echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0'max='$pqty' readonly/></td>";


											echo "<td align='right'>" . number_format($sum, 2) . "</td>";
											//remove product

										}
										echo "<tr>";

										echo "<td></td>";
										echo "<td></td>";
										echo "<td></td>";
										echo "<td  align='center'><b>Total empty</b></td>";
										echo "<td align='right'colspan='2'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";

										echo "</tr>";
									}
									?>

								</table>

								<?php if ($mem_id != '') { ?>

									<div class="form-group row">
										<label for="" class="col-sm-2 col-form-label">Total</label>
										<div class="col-sm-5">
											<input type="text" name="pay_amount" readonly class="form-control" id="" value="<?php echo ($total); ?>" placeholder="">
										</div>
									</div>



									<div class="form-group row">
										<label for="" class="col-sm-2 col-form-label">Receive</label>
										<div class="col-sm-5">
											<input type="number" min="<?php echo $total; ?>" name="pay_amount2" required class="form-control" id="" placeholder="">
										</div>
									</div>


									<div class="form-group row">
										<label for="" class="col-sm-2 col-form-label"></label>
										<div class="col-sm-5">
											<input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>">

											<button type="submit" class="btn  btn-primary btn-block">Confirm order</button>
										</div>


									<?php } else { ?>
										<a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a>

									<?php } ?>











							</form>
						</div>
					</div>
				</div>





			</div>

		</div>










		<div class="card-footer">

		</div>










</section>
<!-- /.content -->







<?php include('footer.php'); ?>

<script>
	$(function() {
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