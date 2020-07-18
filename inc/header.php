<?php
  $filepath = realpath(dirname(__FILE__));
  

  include_once ($filepath."/../lib/Session.php");
  Session::init();

  include_once ($filepath.'/../lib/Database.php');
  include_once ($filepath.'/../helpers/format.php');

  spl_autoload_register(function($classname){
  	include_once "classes/".$classname.".php";
  });

  $db   = new Database();
  $fm   = new Format();
  $ct   = new Cart();
  $pro  = new Product();
  $cat  = new Category();
  $brand = new Brand();
  $cmr   = new Customer();
  

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
 ?>



<!DOCTYPE HTML>
<head>
<title>Free Smart Store Website Template</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}">
				    	<input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
									<span class="no_product">
										<?php
										$getcart = $ct->checkCartTable();
										if($getcart){
											$sum = Session::get("sum");
											echo "$".$sum;
										}
										else{
											echo "(empty)";
										}
										
										?>
									</span>
							</a>
						</div>
			      </div>
			      <?php if(isset($_GET['cId'])){
			      	$delCart = $ct->delCustomerCart();
			      	Session::destroy();
			      	
			      }
			      ?>
		   <div class="login">

				<?php  	
					$login = Session::get("cmrlogin");
						if($login==false){
									
				?>
							<span><a href="login.php">Login</a></span>
				<?php } 
				else { ?>

					<span><a href="?cId=<?php Session::get("cmrId");?>">Logout</a></span>
								
									
				<?php  }

			?>
		   	  
		   </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	 
	  <li><a href="">CATEGORIES</a>
	  	
	  	
	  	<ul>
	  		<?php $getcat = $cat->showAll();
	  	if($getcat){
	  		while ($result = $getcat->fetch_assoc()) {
	  	?>
	  		<li><a href="productbycat.php?catId=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
	  		<?php		
	  		}
	  	}
	  	?>
	  	</ul>
	  	
	  </li>
	  <?php
			$getcart = $ct->checkCartTable();
			if($getcart){
				?>
				 <li><a href="cart.php">Cart</a></li>
				 <li><span><a href="payment.php">Payment</a></span></li>
			 <?php }
			
			
			?>
	 
	  <?php  	
		// $login = Session::get('cmrlogin');
			if($login==true){
						
	?>
			<li><span><a href="profile.php">Profile</a></span></li>
	<?php }  
	 ?>	

	<?php
		$cmrId = Session::get("cmrId");
		$checkWish = $pro->checkWishList($cmrId);
		if($checkWish){

	?>
			<li><span><a href="wishlist.php">Wishlist</a></span></li>
	<?php }  
	 ?>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>