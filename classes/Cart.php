<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');

// include_once '../helpers/format.php';

?>


<?php
class Cart{
	public $db;
	public $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addToCart($id,$quantity){
		$quantity  = $this->fm->validation($quantity);
		$quantity  = mysqli_real_escape_string($this->db->link,$quantity);
		$productId = mysqli_real_escape_string($this->db->link,$id); 
		$sId 	   = session_id();

		$squery = "SELECT * FROM products WHERE productId='$productId'";
		$result = $this->db->select($squery)->fetch_assoc();
		// echo "<pre>";

		// print_r($result);
		// echo "</pre>";
		$productName = $result['productName'];
		$price       = $result['price'];
		$picture     = $result['picture'];
		
		$checksql = "SELECT * FROM tbl_cart WHERE productId='$productId' AND sId = '$sId'";
		$result   = $this->db->select($checksql);
		if($result){
			$msg = "Product already Added.";
			return $msg;
		}
		else{
 		
	 		$sql     = "INSERT INTO tbl_cart(sId,productId,productName,price,picture,quantity) VALUES('$sId','$productId','$productName','$price','$picture','$quantity')";
	 		$result2 = $this->db->insert($sql);
	 		if($result2){
	 			header("Location:cart.php");
	 		}
	 		else{
	 			$msg = "Product not added";
	 			return $msg;
	 		}
		}
	}
	public function getFromCart(){
		$sId = session_id();
		$sql = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($sql);
		return $result;
	}
	public function updateCartQuantity($cartId,$quantity){
		$quantity  = $this->fm->validation($quantity);
		$quantity  = mysqli_real_escape_string($this->db->link,$quantity);
		$cartId    = mysqli_real_escape_string($this->db->link,$cartId); 

		$sql    ="UPDATE tbl_cart set quantity='$quantity' WHERE cartId = '$cartId'";
		$result = $this->db->update($sql);
		if($result){
			return $result;
		}
	}
	public function deleteCart($cartId){
		$sql    = "DELETE FROM tbl_cart WHERE cartId = '$cartId'";
		$result = $this->db->delete($sql);
		if($result){
			$msg = "product deleted successfully";
			return $msg;

		}
		else{
			$msg = "product is not deleted successfully";
			return $msg;
		}
	}
	public function checkCartTable(){
		$sId = session_id();
		$sql = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($sql);
		return $result;
	}
	public function delCustomerCart(){
		$sId = session_id();
		$sql = "DELETE FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->delete($sql);
		return $result;
	}
	public function insertProToOrder($Cid){
		// $query = "SELECT tbl_cart.*,tbl_customer.* WHERE tbl_cart.sId = '$sId' AND  tbl_customer.customerId='$Cid'";
		// $result = $this->db->select($query);
		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		$sId = session_id();
		$sql = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($sql);
		if($result){
			while ( $value = $result->fetch_assoc() ) {
				$productId   = $value['productId'];
				$productName = $value['productName'];
				
				$quantity    = $value['quantity'];
				$price       = $value['price']*$quantity;
				$image       = $value['picture'];
				$sql         = "INSERT INTO tbl_order(cmrId,productId,productName,price,quantity,picture) VALUES('$Cid','$productId','$productName','$price','$quantity','$image')";
				$result2     = $this->db->insert($sql);
			}

		}

	}
	public function payableAmount($cmrId){
		$sql    = "SELECT price FROM tbl_order WHERE cmrId ='$cmrId' AND date = now()";
		$result = $this->db->select($sql);
		return $result;
	}

 	public function checkOrderTbl($cmrId){
		$sql    = "SELECT * FROM tbl_order WHERE cmrId ='$cmrId'";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getAllOrder(){
		$sql    = "SELECT * FROM tbl_order ORDER BY orderId";
		$result = $this->db->select($sql);
		return $result;
	}

	public function shiftedProduct($id,$date,$price){
		$id    = mysqli_real_escape_string($this->db->link,$id);
		$date  = mysqli_real_escape_string($this->db->link,$date);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$sql = "UPDATE tbl_order
				SET status = '1'
				WHERE cmrId='$id'AND price ='$price' AND date='$date'";
		$result = $this->db->update($sql);
		
		// if($result){
		// 	$msg = "<span class='success'>product Shifted successfully</span>";
		// 	return $msg;

		// }
		// else{
		// 	$msg = "<span class='error'>product is not Shifted successfully</span>";
		// 	return $msg;
		// }
	}
	
	public function DeleteShiftedProduct($id,$date,$price){
		$id    = mysqli_real_escape_string($this->db->link,$id);
		$date  = mysqli_real_escape_string($this->db->link,$date);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$sql = "DELETE FROM tbl_order WHERE cmrId='$id' AND  price ='$price' AND date='$date'";
		$result = $this->db->delete($sql);
		return $result;
	}



 public function productShifted($id,$date,$price){
		$id    = mysqli_real_escape_string($this->db->link,$id);
		$date  = mysqli_real_escape_string($this->db->link,$date);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$sql = "UPDATE tbl_order
				SET status = '2'
				WHERE cmrId='$id'AND price ='$price' AND date='$date'";
		$result = $this->db->update($sql);
		while($row = mysql_fetch_array($result)){
			 print_r($row);
		}
		
		// return $result;

	  // 	if($result){
		 // 	$msg = "<span class='success'>product in Detail page Shifted successfully</span>";
		 // 	return $msg;

 		//  }
 	 // 	else{
 	 // 	$msg = "<span class='error'>product is not Shifted </span>";
		 // 	return $msg;
	 	// }
	 }
		
}

?>