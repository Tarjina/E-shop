<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');
?>


<?php
class Customer{
	public $db;
	public $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function customerRegistration($data){
		$name = mysqli_real_escape_string($this->db->link,$data['name']);
		$address = mysqli_real_escape_string($this->db->link,$data['address']);
		$city = mysqli_real_escape_string($this->db->link,$data['city']);
		$country = mysqli_real_escape_string($this->db->link,$data['country']);
		$zip_code = mysqli_real_escape_string($this->db->link,$data['zip_code']);
		$password = mysqli_real_escape_string($this->db->link,$data['password']);
		// $hash = password_hash($password,PASSWORD_DEFAULT);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
		if($name =='' || $address =='' || $city =='' || $country =='' || $zip_code =='' || $password =='' || $email =='' || $phone =='' ){
			$msg = "<span class='Error'>Field must not be empty</sapn>";
			return $msg;
		}
		elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$MSG = "your email is not valid";
			return $MSG;
		}
		$mailsql = "SELECT * FROM tbl_customer WHERE email ='$email'";
		$mailchk = $this->db->select($mailsql);
		if($mailchk){
			$ms = "Eamil already exist";
			return $ms;
		} else{
			$sql= "INSERT INTO tbl_customer (name,address,city,country,zip_code,password,email,phone) VALUES('$name','$address','$city','$country','$zip_code','$password','$email','$phone')";
			$result = $this->db->insert($sql);
			if($result){
				$msg = "registerd successfully";
				return $msg;
			}
			else{
				$msg = "Error occured";
				return $msg;
			}
		}

	}
	public function customerLogin($data){
		$pass = mysqli_real_escape_string($this->db->link,$data['password']);
		
		$name = mysqli_real_escape_string($this->db->link,$data['name']);

		if (empty($pass) || empty($name)) {
			$Msg = "Field Must not be Empty.";
			return $Msg;
		} 
		else{ 
			// $hash = password_hash($pass,PASSWORD_DEFAULT);
			$sql = "SELECT * FROM tbl_customer WHERE name ='$name' AND password='$pass'"; 
			$result = $this->db->select($sql);
			print_r($result);
		    if($result!=false){
		    	$value = $result->fetch_assoc();
		    	Session::set("cmrlogin",true);
		    	Session::set("cmrId",$value['customerId']);
		    	Session::set("cmrName",$value['name']);
		    	header("Location:cart.php");
		    }
		    else
		    {
		    	$msg = "Error occured";
				return $msg;
		    }
		}
	   
		

	}
	public function GetCustomerData($id){
		$sql = "SELECT * FROM tbl_customer WHERE customerId= '$id'";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}
	}
	public function updateCustomer($id,$data){
		$name = mysqli_real_escape_string($this->db->link,$data['name']);
		$address = mysqli_real_escape_string($this->db->link,$data['address']);
		$city = mysqli_real_escape_string($this->db->link,$data['city']);
		$country = mysqli_real_escape_string($this->db->link,$data['country']);
		$zip_code = mysqli_real_escape_string($this->db->link,$data['zip_code']);
		$password = mysqli_real_escape_string($this->db->link,$data['password']);
		// $hash = password_hash($password,PASSWORD_DEFAULT);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
		if($name =='' || $address =='' || $city =='' || $country =='' || $zip_code =='' || $password =='' || $email =='' || $phone =='' ){
			$msg = "<span class='Error'>Field must not be empty</sapn>";
			return $msg;
		}
		elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {	
			$MSG = "your email is not valid";
			return $MSG;
		}
		else{
			$sql  = "UPDATE tbl_customer SET 
					name    = '$name',
					address = '$address',
					city    = '$city',
					country = '$country',
					zip_code='$zip_code',
					password= '$password',
					email   = '$email',
					phone   = '$phone'
					WHERE customerId = '$id'";
			$result = $this->db->update($sql);
			if($result){
				$msg = "Updated  successfully";
				return $msg;
			}
			else{
				$msg = "Error occured";
				return $msg;
			}
		}

	}
}


?>