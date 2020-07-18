<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');
/**
* 
*/
class Brand
{
	public $db;
	public $fm;

	 public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insertBrand($brandName){
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		if ($brandName=='') {
			$msg = "<span style= 'color:red'>Field must not be empty.</span>";
			return $msg;
		}
		else
		{
			$sql = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$result = $this->db->insert($sql);
			if ($result) {
				$msg = "<span class='success'>Brand Added Successfully.</sapn>";
				return $msg;
			}
			else
			{
				$msg = "<span class='error'>Brand Not Added.</sapn>";
				return $msg;
			}
		}
	}

	public function showAllBrand(){
		$sql = "SELECT * FROM tbl_brand ORDER BY brandId";
		$result= $this->db->select($sql);
		if ($result) {
			return $result;
		}
	}

	public function showIdWiseBrand($id){
		$sql ="SELECT * FROM tbl_brand WHERE brandId= '$id'";
		$result= $this->db->select($sql);
		return $result;
	}

	public function updateBrand($id,$brandName){
		$sql = "UPDATE tbl_brand SET brandName= '$brandName' WHERE brandId = '$id'";
		$result = $this->db->update($sql);
		if ($result) {
			$msg = "<span class= 'success'>Brand updated Successfully.</span>";
			return $msg;

		}
		else
		{
			$msg = "<span class='error'>Brand Not Updated.</sapn>";
				return $msg;
		}
	}

	public function deleteBrand($id){
		$sql = "DELETE FROM tbl_brand WHERE brandId = '$id'";
		$result = $this->db->delete($sql);
	}
}



?>