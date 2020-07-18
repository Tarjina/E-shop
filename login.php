<?php include 'inc/header.php';?>
<?php

	//preventing access
	$login = Session::get("cmrlogin");
	if($login){
		header("Location:order.php");
	}
	//
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
		$customerReg = $cmr->customerRegistration($_POST);
	}

	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
		$customerlog = $cmr->customerLogin($_POST);
	}
?>

 <div class="main">
    <div class="content">
    	<div class="login_panel">
    		<?php if(isset($customerlog)){
    			echo $customerlog;
    		}
    		?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="POST" id="member">
                	<input name="name" type="text"  class="field" placeholder="Your Name" >

                    <input name="password" type="password" class="field" placeholder="your Password">
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
        
            </form>
                 
                    
        </div>
    	<div class="register_account">
    		<?php if(isset($customerReg)){
    			echo $customerReg;
    		}
    		?>
    		<h3>Register New Account</h3>
    		<form action="" method="POST">
		   		<table>
		   			<tbody>
						<tr>
						<td>
							<div>
							   <input type="text"  name="name" class="form-group" placeholder="Your name">
							</div>
							
							<div>
							   <input type="text" name="address" placeholder="Address" > 
							</div>
							
							<div>
								<input type="text" name="city" placeholder="City">
							</div>
							<div>
								<input type="text" name="country" placeholder="Country">
							</div>
		    			</td>
		    			<td>
							<div>
								<input type="text" name="zip_code" placeholder="Zip Code">
							</div>
			    		  	<div>
								<input type="text" name="password" placeholder="Password">
					 		</div>		        
		
			           		<div>
			          		<input type="text" name="email" placeholder="Email">
			          		</div>
					  
					  		<div>
							<input type="text" name="phone" placeholder="phone">
							</div>
		    			</td>
		   				</tr> 
		    		</tbody>
				</table> 
			    <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
			   
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include 'inc/footer.php';?>