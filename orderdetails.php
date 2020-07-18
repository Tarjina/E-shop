<?php include'inc/header.php' ;
	$login = Session::get("cmrlogin");
		if($login==false){
			header("Location:index.php");
		}
	$cmrId = Session::get("cmrId");

	if(isset($_GET['shiftId'])){
		$id    = $_GET['shiftId'];
		echo $id."<br>";
		$price = $_GET['price'];
		echo $price."<br>";
		$date  = $_GET['date'];
		echo $date;
		$confirm = $ct->productShifted($id,$price,$date);
		// var_dump($confirm);
		
	}
?>
<style>

</style>

<div class="main">
	<div class="content">
		<div class="section group">
		<div class = "orderdetail">
			<h2>Your Order Details</h2>
					<table class="tblone">
						<tr>
							<th width="20%">SL</th>
							<th width="20%">Product Name</th>
							<th width="10%">Image</th>
							<th width="15%">Price</th>
							<th width="20%">Quantity</th>
						
							<th width="15%">Status</th>
							<th width="15%">Date</th>
							<th width="10%">Action</th>
						</tr>
						<?php 
						// if(isset($confirm)){
						// 	echo "<pre>";
						// 	print_r($confirm);
						// 	echo "</pre>";
						// }
						 $getorder = $ct->checkOrderTbl($cmrId);
						 if ($getorder) {
						 	$i=0;
						 	$sum =0;
						 	$vat=0;
						 	while($result = $getorder->fetch_assoc()){
						 		$i++;
						 		$taka = $result['price'];
						 		$sum = $taka+$sum;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['productName'];?></td>
							<td><img src="admin/<?php echo $result['picture']?>" alt=""/></td>
							<td>Tk.<?php echo $result['price'];
									$taka = $result['price'];
						 		    $sum = $taka+$sum;
							?>
							</td>
							<td><?php echo $result['quantity'];?></td>
							<td>
								<?php
							
							    if ($result['status']=='0') {
							   
							    	echo "Pending";
							    }
							    elseif($result['status']=='1'){
							    ?>
							    	<a href="?shiftId=<?php echo $result['cmrId'];?> & price=<?php echo $result['price'];?> & date=<?php echo $result['date'];?>">shifted</a>
							   <?php }
							   else{ 
								echo  "Confirm";
							   }
							   ?>
							</td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
								<?php 
							    if ($result['status']=='2') {
							    ?>
							    	<a onclick="return confirm('Are you sure to Delete?')" href="">X</a>
							    <?php }
							    else{
							    ?>
							    	N/A
							   <?php }
							   ?>
							</td>
						</tr>
						<?php } }
							   ?>
						<tr>
							<td colspan="4">Total </td>
							<td colspan="4">taka:<?php
							if($sum!=0)
							{
							 $vat = $sum*(.1);
							 $sum =$sum+$vat;
							 echo $sum;
							}
							?></td>
						</tr>

					</table>
				</div>	
		</div>
	</div>
</div>
<?php include'inc/footer.php' ;?>