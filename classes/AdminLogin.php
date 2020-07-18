<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');

include_once ($filepath."/../lib/Session.php");
Session::checkLogin();



Class AdminLogin{
	public $db;
	public $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function adminLogin($adminUser,$adminPass){
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);
		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
		if (empty($adminUser) || empty($adminPass)) {
			$adminMsg = "Field Must not be Empty.";
			return $adminMsg;
		}
		else
		{	$adminPass = md5($adminPass);
			$query = "SELECT * FROM tbl_admin WHERE adminUser ='$adminUser' AND adminPass = '$adminPass'";
			$result = $this->db->select($query);
			if ($result!=false) {
				$value = $result->fetch_assoc();
				Session::set("adminLogin",true);
				Session::set("adminId",$value['adminId']);
				Session:: set("adminName",$value['adminName']);
				Session::set("adminUser",$value['adminUser']);
				header("Location:Dashboard.php");

			}
			else{
				$adminMsg ="Data not found.";
				return $adminMsg;
			}
		}
	}
}
?>