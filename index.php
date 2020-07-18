<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

	    
	  <div class="clear"></div>
  </div>	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      	$getFpro =$pro->getFeaturedProduct();
	      	if ($getFpro) {
	      		while ($result = $getFpro->fetch_assoc()) {
	      			
	      	
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['picture'];?>" alt="" height="80px" width="140px"/></a>
					 <h2><?php echo $result['productName'];?> </h2>
					 <p><?php echo $fm->textShorten($result['description'],0,20);?></p>
					 <p><span class="price">$<?php echo $result['price']?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			<?php 	}
	      	} ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
				 $getNpro = $pro->getNewProduct();
				 if ($getNpro) {
				 	while($result= $getNpro->fetch_assoc()){


				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId'];?>"><img src="admin/<?php echo $result['picture']?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?> </h2>
					 <p><?php echo $fm->textShorten($result['description'],0,30);?></p>
					 <p><span class="price">$<?php echo $result['price']?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			<?php  	}
				 } ?>
			</div>
    </div>
 </div>
</div>
 <?php include 'inc/footer.php';?>