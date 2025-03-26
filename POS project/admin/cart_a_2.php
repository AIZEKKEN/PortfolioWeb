<?php

// $coupon_code = mysqli_real_escape_string($condb, $_GET['coupon']); //รับส่งข้อมูลระหว่างกัน โดยข้อมูลจะเห็นได้โดยตรงจาก URL. POST. รับส่งข้อมูลระหว่างกัน โดยข้อมูลจะซ่อนอยู่ มองไม่เห็นจาก URL.
$p_id = mysqli_real_escape_string($condb, $_GET['p_id']);
$actdd = mysqli_real_escape_string($condb, 'add');
$act = mysqli_real_escape_string($condb, $_GET['act']);

if ($actdd == 'add' && !empty($p_id)) //เช็คว่า $act=='add' และ p_id ไม่ใช่ค้าว่างให้ทำเงื่อนไข
{
	if (isset($_SESSION['cart'][$p_id])) //ถ้าเจอ p_id ในตระกร้า 
	{
		$_SESSION['cart'][$p_id]++; //ให้เพิ่มทีละ 1 
	} else //ถ้าไม่เจอให้สินค้าที่ส่งมานั้น  
	{
		$_SESSION['cart'][$p_id] = 1; //ให้สินค้านั้นเท่ากับๅ
	}
}

// session_destroy();
//header("location: cart.php");

// echo'<pre>';
// print_r($_SESSION);
// echo'</pre>';
// exit();




if ($act == 'remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
{
	unset($_SESSION['cart'][$p_id]);
}

if ($act == 'update') {
	$amount_array = $_POST['amount'];
	foreach ($amount_array as $p_id => $amount) {
		$_SESSION['cart'][$p_id] = $amount;
	}
}
?>

<form id="frmcart" name="frmcart" method="post" action="?t_id=<?php echo $t_id; ?>&b_id=<?php echo $b_id; ?>=1&act=update">
	<h4>List Order</h4>
	<br>
	<table border="0" align="center" class="table table-hover table-bordered table-striped">

		<tr>
			<td width="1%">No.</td>

			<td width="5%">List</td>
			<td width="4%">Price</td>
			<td width="15%">Total</td>
			<td width="4%">Amount(Baht)</td>
			<td width="3%">Delete</td>
		</tr>
		<!-- <div class="form-group">
			<label>Coupon code</label>
			<input class="form-control" type="text" id="coupon" placeholder="Enter coupon code" />
			<input type="hidden" value="<?php echo $fetch['product_price'] ?>" id="price" />
			<div id="result"></div>
			<br style="clear:both;" />
			<button class="btn btn-primary" id="activate">Submit</button>
		</div> -->
		<?php

		$total = 0;
		if (!empty($_SESSION['cart'])) {

			foreach ($_SESSION['cart'] as $p_id => $qty) {
				$sql = "SELECT * FROM tbl_product WHERE p_id=$p_id";
				$coupon = "SELECT * FROM coupon WHERE coupon_code = $coupon_code && status = Valid" or die(mysqli_error());
				$query = mysqli_query($condb, $sql, $coupon); //ทำการค้นหาจากฐานข้อมูล
				// $count = mysqli_num_rows($query);//ส่งกลับจำนวนแถวในชุดผลลัพธ์
				$row = mysqli_fetch_array($query); //ดึงข้อมูลแถวผลลัพธ์เป็นอาร์เรย์ตัวเลขและเป็นอาร์เรย์ที่เชื่อมโยง
				$discount = $row['discount'] / 100; //นำค่าส่วนลดหาร100
				$sum = $row['p_price'] * $qty; //เอาราคาสินค้ามา * จำนวนในตระกร้า
				$total += $sum * $discount; //ราคารวม ทั้ง ตระกร้า

				echo "<tr>";
				echo "<td>" . $ii += 1 . "</td>";

				echo "<td>"

					. $row["p_name"]
					. "<br>"
					. "สต๊อก "
					. $row['p_qty']
					. " รายการ"

					. "</td>";
				echo "<td align='right'>" . number_format($row["p_price"], 2) . "</td>";
				echo "<td align='right'>";



				$pqty = $row['p_qty']; //ประกาศตัวแปรจำนวนสินค้าใน stock
				echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0'max='$pqty'/>";


				echo "<td align='right'>" . number_format($sum, 2) . "</td>";

				//remove product

				echo "<td align='center'>
        <a href='list_l.php?p_id=$p_id&act=remove' class='btn btn-danger 
            btn-xs'>Del</a></td>";
				echo "</tr>";
			}
			echo "<tr>";
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";

			echo "<td bgcolor='#CEE7FF' align='center'><b>Total empty</b></td>";
			echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
			echo "<td align='left' bgcolor='#CEE7FF'></td>";
			echo "</tr>";
		}
		?>

	</table>
	<p align="right">
		<!-- <a href="list_l.php" class="btn btn-info">กลับหน้ารายการสินค้า</a> -->


		<!-- <a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a> -->

		<input type="submit" name="button" id="button" value="Edit" class="btn btn-warning" />
		<input type="button" name="Submit2" value="Next List" onclick="window.location='confirm_a.php';" class="btn btn-primary" />
		<input type="hidden" name="t_id" value="<?php echo $t_id; ?>">
		<input type="hidden" name="b_id" value="<?php echo $b_id; ?>">




	</p>
</form>
<!-- <script src="../assets/jquery-3.2.1.min.js"></script>
<script src="../assets/bootstrap.js"></script>
<script>
	$(document).ready(function() {
		$('#activate').on('click', function() {
			var coupon = $('#coupon').val();
			if (coupon == "") {
				alert("Please enter a coupon code!");
			} else {
				$.post('get_discount.php', {
					coupon: coupon,
					price: price
				}, function(data) {
					if (data == "error") {
						alert("Invalid Coupon Code!");
						$('#total').val(price);
						$('#result').html('');
					} else {
						var json = JSON.parse(data);
						$('#result').html("<h4 class='pull-right text-danger'>" + json.discount + "% Off</h4>");
						$('#total').val(json.price);
					}
				});
			}
		});
	});
</script> -->