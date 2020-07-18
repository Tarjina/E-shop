<?php include 'inc/header.php';?>
<?php 
	if(!($_GET['catId']) || $_GET['catId']==NULL){
		echo "<script>window.location = '404.php';</script>";
	}
	else{
		$id = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['catId']);
		
	}

?>
<style >

</style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<?php
    			 $getCatName = $cat->showIdWiseData($id);
    			 if($getCatName){
    				while($catname = $getCatName->fetch_assoc()){

    			?>
    		<h3>Latest from  <?php echo $catname['catName'];?> </h3>
    		<?php	} }
    			?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	$getpro = $pro->getCatWiseProduct($id);
	      	if ($getpro) {
	      		while($result = $getpro->fetch_assoc()){

	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.html"><img src="admin/<?php echo $result['picture'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?> </h2>
					 <p></p>
					 <p><span class="price">$<?php echo $result['price']?></span></p>
				     <div class="button"><a href="details.php?<?php echo $result['productId'];?>" class="details">Details</a></div>
				</div>
				<?php 
			}} else{
				echo "<span style='font-size:30px;text-align:center;'>There is no item.</span>";
			}


			?>

			</div>

	
	
    </div>
 </div>
</div>
   <?php include 'inc/footer.php';?>