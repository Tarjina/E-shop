<?php include 'inc/header.php';?>

<?php
	// if(!($_GET['proId'])|| $_GET['proId']==NULL){
	// 	echo "<script>window.location = '404.php';</script>";
	// }
	// else{
	// 	 $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['proId']);
	// 	 // $id = $_GET['proId'];
		
	// }
	if(isset($_GET['proId'])){
		$id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['proId']);
	}
	
	 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
	 	$quantity = $_POST['quantity'];
	 	$addcart = $ct->addToCart($id,$quantity);
	 }
?>
<?php 
	 $cmrId = Session::get("cmrId");

	 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wishlist'])){
	 		$saveWish = $pro->saveWishData($id,$cmrId);
	 
	 }

?>


 <div class="main">
    <div class="content">
    	
    	<div class="section group">
    		
			<div class="cont-desc span_1_of_2">	
				<?php 
				// $pr = $pro->getSingleProduct($id);
    			$pr = $pro->getIdWiseProduct($id);
				if($pr){
					while($product = $pr->fetch_assoc()){
						

				?>	
					
				<div class="grid images_3_of_2">
						<img src="admin/<?php echo $product['picture'];?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $product['productName'];?> </h2>
									
					<div class="price">
						<p>Price: <span>$<?php echo $product['price'];?></span></p>
						<p>Category:
							<?php
							$getCat = $cat->showAll();
						 	if($getCat){
						 		while($result = $getCat->fetch_assoc()){
						 			if($product['categoryId'] == $result['catId']){
						 				?>
						 				<span><?php echo $result['catName'];?></span>
						 				<?php 
						 			} } }
						 			?> 
							
						</p>
						<p>Brand:
							<?php 
							$getBrand = $brand->showAllBrand();
							if($getBrand){
								while($result= $getBrand->fetch_assoc()){
									if($product['brandId'] == $result['brandId']){
										?>
							<span><?php echo $result['brandName'];?></span></p>
							<?php } } } ?>
					</div>
					<?php
							
							if(isset($addcart)){
								echo $addcart;
							}
						?>
					<div class="add-cart">
						<form action=" " method="post">
							<input type="number" class="buyfield" name="quantity" value="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>	

					</div>	<!--To Compare-->
						
						<?php
							
							if(isset($saveWish)){
								echo $saveWish;
							}
							if($login==true){
								

							
						?>
						<div class="add-cart">
							<form action ="" method="post">
								<input type="submit" name="wishlist" class="buysubmit" value="Add to wishlist"/>
							</form>
						</div>		
						<?php }
						?>
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo $product['description'];?></p>
		        
	    		</div>
				<?php } } ?> 
				
			</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php 
							$getcat = $cat->showAll();
							if($getcat){
								while($result = $getcat->fetch_assoc()){

						?>
				      <li><a href="productbycat.php?catId=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
				    	<?php 
				    }} ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
</div>
<?php include 'inc/footer.php';?>
