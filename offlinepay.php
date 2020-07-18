<?php include 'inc/header.php';?>

<?php
	// if(!($_GET['CId'])|| $_GET['CId']==NULL){
	// 	echo "<script>window.location = '404.php';</script>";
	// }
	// else{
	// 	 $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['CId']);
	// 	 // $id = $_GET['proId'];
		
	// }
	$id = Session::get("cmrId");
	 if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['update'])){
	 	
	 	$updateCustomer = $cmr->updateCustomer($id,$_POST);

	  }

?>
<?php
$id = Session::get("cmrId");
if (isset($_GET['orderId']) && $_GET['orderId']=='order') {
	$insertOrder = $ct->insertProToOrder($id);
	$delCart = $ct->delCustomerCart();
	header("Location:order.php");
}


?>

<style>
	.division1{width: 40%;float:left;}
	.division2{width: 50%;float:right;margin-left: 20px;}
	.division2 h2{width: 50%;float:left;margin-left: 70px;}
	.tblone{width: 300px;margin: 15px auto;border: 2px solid #ddd;}
	.tblone tr td{text-align: justify;}
	
	.tbltwo{float: right;text-align: left;width: 50%;margin-right: 14px; margin-top: 12px;}
	.tbltwo tr td{ text-align: justify; padding: 5px 10px; }
	.ordernow{}
	.ordernow a{width: 200px; text-align: center;margin: 0 auto 5px; font-size: 30px;display: block;padding: 5px;background: #ff0000;color:#fff;border-radius: 3px}
</style>
 <div class="main">
    <div class="content">
    	
    	<div class="section group">
    		<div class="division1">
    			<?php 
    			if (isset($insertOrder)) {
    				echo $insertOrder;
    			}
    			?>
    			<table class="tblone">
						<tr>
							<th >SL</th>
							<th >Product Name</th>
							<th >Image</th>
							<th >Price</th>
							<th >Quantity</th>
							<th >total</th>
							
							
						</tr>
						<?php 
						 $getcart = $ct->getFromCart();
						 if ($getcart) {
						 	$i=0;
						 	$sum = 0;
						 	$qty = 0;
						 	while($result = $getcart->fetch_assoc()){
						 		$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $result['productName'];?></td>
							<td><img src="admin/<?php echo $result['picture']?>" alt=""/></td>
							<td>Tk.<?php echo $result['price'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php 
							    $total = $result['price']*$result['quantity'];
							    echo $total;?>
							    	
							 </td>
							
						</tr>
						<?php 
						$qty = $qty+$result['quantity'];
						$sum = $sum +$total;
						Session::set("sum",$sum);
						?>
						<?php 
						 	}
						 }
						 ?>
			</table>			
						<?php 
						$getcart = $ct->checkCartTable();
						if($getcart){
						?>
			
			<table class="tbltwo" width="40%">
						<tr>
							<td>Sub Total :</td>
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
							}
							?>
							</td>
						</tr>
						<tr>
							<td>qty:</td>
							<td><?php echo $qty;?></td>
						</tr>
				   </table>
    		</div>
    		<div class="division2">
    			
    		
    		<?php 
    					
					 	$getCusData = $cmr->GetCustomerData($id);
					 	if($getCusData){
					 		while($result = $getCusData->fetch_assoc()){

						
			?>
    		<form action="" method="POST">
    			<h2>Your Info</h2>
    			<table class="tblone">
    				<!-- <tr ><h2>Your Info</h2></tr>
    				 -->
					<tr>
	    				<td width="25%">Name</td>
	    				<td width="5%">:</td>
	    				<td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
    				</tr>
    				<tr>
	    				<td >address</td>
	    				<td >:</td>
	    				<td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
    				</tr>
    				<tr>
	    				<td >zip_code</td>
	    				<td >:</td>
	    				<td><input type="text" name="zip_code" value="<?php echo $result['zip_code'];?>"></td>
    				</tr>
    				<tr>
	    				<td >city</td>
	    				<td >:</td>
	    				<td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
    				</tr>
    				<tr>
	    				<td >country</td>
	    				<td >:</td>
	    				<td><input type="text" name="country" value="<?php echo $result['country'];?>"></td>
    				</tr>
    				<tr>
	    				<td >password</td>
	    				<td >:</td>
	    				<td><input type="text" name="password" value="<?php echo $result['password'];?>"></td>
    				</tr>
    				<tr>
	    				<td >email</td>
	    				<td >:</td>
	    				<td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
    				</tr>
    				<tr>
	    				<td >phone</td>
	    				<td >:</td>
	    				<td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
    				</tr>
    				<tr>
	    				<td ></td>
	    				<td ></td>
	    				<td><input type="submit" name="update" value="Update"></td>
    				</tr>
    				
    				 <!-- <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
    				 <tr><div class="buttons"><div> <button class="grey" name="update" style="float: right;">Update</button></div></div></tr>  -->
    			</table>

    		</form>
			    			<?php } } ?>
    		</div>		
 		</div>
 	</div>
 	<div class="ordernow"><a href="?orderId=order">Order</a></div>
</div>
<?php include 'inc/footer.php';?>
