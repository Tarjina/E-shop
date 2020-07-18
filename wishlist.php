<?php include 'inc/header.php';?>
<?php 
	
?>
<?php
	if($login==false){
		header("Location:index.php");
	}

	if (!isset($_GET['id'])) {
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}

	if(isset($_GET['delwishPro'])){
		$proId = $_GET['delwishPro'];
		$delwishPro = $pro->delWishPro($cmrId,$proId);
	}
?>
<style >
.cartpage{}
.cartpage h2{ text-align:left; display: inline; }
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your WishList</h2>
					<table class="tblone">
						<tr>
							<th width="20%">SL</th>
							<th width="20%">Product Name</th>
							<th width="10%">Image</th>
							<th width="15%">Price</th>
							
							<th width="10%" colspan="2">Action</th>
						</tr>
						<?php 
						 $getWishList = $pro->getFromWish($cmrId);
						 if ($getWishList) {
						 	$i=0;
						 	while($result = $getWishList->fetch_assoc()){
						 		$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['productName'];?></td>
							<td><img src="admin/<?php echo $result['picture']?>" alt=""/></td>
							<td>Tk.<?php echo $result['price'];?></td>
							
							<td><a href="details.php?proId=<? echo $result['productId'];?>">Buy Now</a></td>
							<td><a onclick="return confirm('Are you sure to Delete?')" href="?delwishPro=<?php echo $result['productId'];?>">X</a></td>
						</tr>
					<?php } }?>
					</table>
					
				   
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