<?php include 'inc/header.php';?>

<?php
$login = Session::get("cmrlogin");
if($login==false){
	header("Location:login.php");
}
?>
<style>
	.payment {margin:0 auto;text-align: center;width: 500px;min-height: 200px; padding: 50px;border: 1px solid #ddd;}
	.payment h2{border-bottom: 1px solid ;margin-bottom: 40px; padding-bottom: 10px; }
	.payment a{background: #ff0000;border-radius:3px;color:#fff; font-size:25px; padding: 5px 30px;}
	.back{margin: 10px auto ;width:160px;}
	.back a{background: #555;padding: 5px 10px;color: #fff; text-align: center; border-radius: 3px}
</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="payment">
				<h2>Choose Payment Option</h2>
				<a href="offlinepay.php">Offline payment</a>
				<a href="onlinePay.php">Online Payment</a>
			</div>
			<div class="back">
				<a href="cart.php">Previous</a>
				
			</div>
			
		</div>
	</div>
</div>
<?php include 'inc/footer.php';?>