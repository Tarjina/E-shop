<?php 
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');

Class Category{
	public $db;
	public $fm;



	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insertCat($catname){
		$catname = $this->fm->validation($catname);
		$catname = mysqli_real_escape_string($this->db->link,$catname);
		if ($catname=='') {
			$catmsg="<span class ='error'>Field must not be empty.</span>";
			return $catmsg;
		}
		else{
			$sql = "INSERT INTO tbl_category(catName) VALUES ('$catname')";
			$result = $this->db->insert($sql);
			if ($result==true) {
				$catmsg = "<span class = 'success'>Category Addedd Successfully</span>";
				return $catmsg;
			}
			else
			{
				$catmsg = "<span class='error'>ERROR</span>";
				return $catmsg;
			}
		}
	}
	public function showAll(){
		$sql = "SELECT * FROM tbl_category ORDER BY catId DESC";
		$result = $this->db->select($sql);
		return $result;
	}

	public function showIdWiseData($id){
		$sql = "SELECT * FROM tbl_category WHERE catId ='$id'";
		$result =$this->db->select($sql);
		return $result;
	}
	
	public function catUpdate($id,$upcatName){
		$upcatName = $this->fm->validation($upcatName);
		$upcatName = mysqli_real_escape_string($this->db->link,$upcatName);
		if ($upcatName=='') {
			$msg = "<span class ='error'>Field must not be empty.</span>";
			return $msg;
		}
		 else
		 {
		 	$sql = "UPDATE tbl_category SET catName='$upcatName' WHERE catId= '$id'";
			$result = $this->db->update($sql);
			if ($result==true) {
			$msg = "UPdated Successfully.";
			return $msg;
			}
			else
			{
				$msg = "Error..!";
				return $msg;
			}
		 }
		
	} 
	public function catDelete($id){
		$sql = "DELETE FROM tbl_category WHERE catId = '$id'";
		$result = $this->db->delete($sql);
		if ($result) {
			$msg = "Deleted Successfully.";
			return $msg;
		}
	} 
}

?>