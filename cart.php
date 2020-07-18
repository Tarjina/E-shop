<?php include 'inc/header.php';?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
			$quantity = $_POST['quantity'];
			$cartId = $_POST['cartId'];
			$upCartQuantity = $ct->updateCartQuantity($cartId,$quantity);
	}

	if (isset($_GET['delcart'])) {
		$cartId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcart']);
		$deleteCart = $ct->deleteCart($cartId);
	}
?>
<?php
	if (!isset($_GET['id'])) {
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
					<table class="tblone">
						<tr>
							<th width="20%">SL</th>
							<th width="20%">Product Name</th>
							<th width="10%">Image</th>
							<th width="15%">Price</th>
							<th width="20%">Quantity</th>
							<th width="20%">Total Price</th>
							<th width="10%">Action</th>
						</tr>
						<?php 
						 $getcart = $ct->getFromCart();
						 if ($getcart) {
						 	$i=0;
						 	$sum = 0;
						 	while($result = $getcart->fetch_assoc()){
						 		$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['productName'];?></td>
							<td><img src="admin/<?php echo $result['picture']?>" alt=""/></td>
							<td>Tk.<?php echo $result['price'];?></td>
							<td>
								<form action="" method="post">
									<input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>">
									<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
									<input type="submit" name="update" value="Update"/>
								</form>
							</td>
							<td><?php 
							    $total = $result['price']*$result['quantity'];
							    echo $total;

							?></td>
							<td><a onclick="return confirm('Are you sure to Delete?')" href="?delcart=<?php echo $result['cartId'];?>">X</a></td>
						</tr>
						<?php 
						$sum = $sum +$total;
						Session::set("sum",$sum);
						?>
						<?php 
						 	}
						 }
						 ?>
						
						<?php 
						$getcart = $ct->checkCartTable();
						if($getcart){
						?>
					</table>
					<table style="float:right;text-align:left;" width="40%">
						<tr>
							<th>Sub Total :</th>
							<td>TK
							<?php 
							echo $sum;
							?></td>
						</tr>
						<tr>
							<th>VAT : </th>
							<td>TK. 10%</td>
						</tr>
						<tr>
							<th>Grand Total :</th>
							<td>TK. 
							<?php
								$vat = $sum*0.1;
								$tsum = $sum +$vat;
								echo $tsum;
							?>
							</td>
						</tr>
				   </table>
					   <?php }
					   else{
					 		header("Location:index.php");
					   }
					   	?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include 'inc/footer.php';?>