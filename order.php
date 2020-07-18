<?php include'inc/header.php' ;

$login = Session::get("cmrlogin");
	if($login==false){
		header("Location:index.php");
	}

?>
<style>
.order{}
.order h2{font-size: 50px;text-align: center;line-height:100px; }
.order p{display:block; font-size: 20px;text-align: center;}
</style>

<div class="main">
	<div class="content">
		<div class="section group"></div>
		<div class = "order">
			
			<h2><span>Successful</h2>
				

					<p>To see the ordered details <a href="orderdetails.php">Visit Here..</a></p>
				
				
		</div>
	</div>
</div>
<?php include'inc/footer.php' ;?>

