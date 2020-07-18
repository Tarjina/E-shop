<?php include 'inc/header.php';?>
<?php 
	
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
							<th width="10%">SL</th>
							<th width="20%">Product Name</th>
							<th width="10%">Image</th>
							<th width="15%">Price</th>
							
							
							<th width="10%">Action</th>
						</tr>
						<?php 
						 
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
									<input type="submit" name="submit" value="Update"/>
								</form>
							</td>
							<td><a href="details.php?proId=<?echo $result['productId'];?>">VIEW</a></td>
							<td><a onclick="return confirm('Are you sure to Delete?')" href="?delcart=<?php echo $result['cartId'];?>">X</a></td>
						</tr>
						
					   
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