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


 <div class="main">
    <div class="content">
    	
    	<div class="section group">
    		<?php 
    					
					 	$getCusData = $cmr->GetCustomerData($id);
					 	if($getCusData){
					 		while($result = $getCusData->fetch_assoc()){

						
			?>
    		<form action="" method="POST">
    			<table class="tblone">
    				<tr colspan ="2" style="text-align: center"><h2>Upate Your Info</h2></tr>
    				
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
    			<?php } } ?>
    		</form>
			
    				
 		</div>
 	</div>
</div>
<?php include 'inc/footer.php';?>
