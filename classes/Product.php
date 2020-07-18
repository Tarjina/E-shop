<?php

$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');
class Product{
	public $db;
	public $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insertProduct($data,$files){
		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
		$categoryId  = mysqli_real_escape_string($this->db->link,$data['categoryId']);
		$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$description = mysqli_real_escape_string($this->db->link,$data['description']);
		$price       = mysqli_real_escape_string($this->db->link,$data['price']);
		$productType = mysqli_real_escape_string($this->db->link,$data['productType']);
		
		$permitted =  array('jpg','jpeg','gif','png');
		$file_name = $files['picture']['name'];
		$file_size = $files['picture']['size'];
		$file_temp = $files['picture']['tmp_name'];
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_img = substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_img = "../admin/upload/".$unique_img;

		if ($productName== '' || $categoryId=='' || $brandId=='' || $description=='' || $price==''|| $productType=='' ) {
			$msg = "<span style='color:red'>Field must not be empty</span>";
			return $msg;
		}
		else if ($file_size>2097152) {
			$msg = "<span style='color:red'>Field size should be less than 2MB.</span>";
			return $msg;
		}
		
		else if (in_array($file_ext, $permitted)==false) {
			$msg = "<span class='error'>You can upload only".implode(',', $permitted)."</span>";
			return $msg;
		}
		else
		{
			move_uploaded_file($file_temp, $uploaded_img);
			$sql = "INSERT INTO products(productName,categoryId,brandId,description,price,picture,productType) VALUES('$productName','$categoryId','$brandId','$description','$price','$uploaded_img','$productType')";
			$result = $this->db->insert($sql);
			if ($result) {
				$msg = "<span class ='success'>Product added</span>";
				return $msg;
			}
			else{
				$msg = "<span class = 'error'>Product is not added.</span>";
			}
		}
		
	}

	public function getAllProduct(){
		$sql = "SELECT products.*,tbl_category.catName,tbl_brand.brandName
				FROM products
				INNER JOIN tbl_category
				ON products.categoryId= tbl_category.catId 
				INNER JOIN tbl_brand 
				ON products.categoryId= tbl_brand.brandId ORDER BY products.productId";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}
	}
	public function getIdWiseProduct($id){
		$sql = "SELECT * FROM products WHERE productId='$id'";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}
	}

	public function updateProduct($id,$data,$files){
		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
		$categoryId  = mysqli_real_escape_string($this->db->link,$data['categoryId']);
		$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$description = mysqli_real_escape_string($this->db->link,$data['description']);
		$price       = mysqli_real_escape_string($this->db->link,$data['price']);
		$productType = mysqli_real_escape_string($this->db->link,$data['productType']);

		$permitted = array('jpeg','jpg','png','gif');
		$file_name = $files['picture']['name'];
		$file_size = $files['picture']['size'];
		$file_temp = $files['picture']['tmp_name'];

		$div        = explode('.', $file_name);
		$file_ext   = strtolower(end($div));
		$unique_img =  substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_img = '../admin/upload'.$unique_img;

		if ($productName== '' || $categoryId=='' || $brandId=='' || $description=='' || $price==''|| $productType=='' ) {
			$msg = "<span style='color:red'>Field must not be empty</span>";
			return $msg;
		}
		else
		{
			if (!empty($file_name)) {
				 if ($file_size>2097152) {
				 	$msg = "file size sholud be within 2MB";
				 	return $msg;
				 }
				 elseif (in_array($file_ext,$permitted)==false) {
				 	$msg = "upload olny ".implode(',', $permitted)." files.";
				 	return $msg;
				 }
				 else
				 {
				 	move_uploaded_file($file_temp, $uploaded_img);
				 	$sql = "UPDATE products SET 
				 	        productName = '$productName',
				 	        categoryId  ='$categoryId',
				 	        brandId     = 'brandId',
				 	        description = '$description',
				 	        price       = '$price',
				 	        picture     = '$uploaded_img',
				 	        productType = '$productType'
				 	        WHERE productId ='$id'";
				 	$result = $this->db->update($sql);
				 	if ($result) {
						$msg = "<span class ='success'>Product updated.</span>";
						return $msg;
					}
					else{
						$msg = "<span class = 'error'>Product is not updated.</span>";
						return $msg;
					}
				 }
			}
			else{ 
				$sql = "UPDATE products SET 
				 	        productName = '$productName',
				 	        categoryId  ='$categoryId',
				 	        brandId     = 'brandId',
				 	        description = '$description',
				 	        price       = '$price',
				 	        productType = '$productType'
				 	        WHERE productId ='$id'";
				 	$result = $this->db->update($sql);
				 	if ($result) {
						$msg = "<span class ='success'>Product updated.</span>";
						return $msg;
					}
					else{
						$msg = "<span class = 'error'>Product is not updated.</span>";
						return $msg;
					}

			}
		}


	}
	public function deleteProduct($id){
		$sql = "DELETE FROM products WHERE productId= '$id'";
		$result = $this->db->delete($sql);
		if ($result) {
			$msg = "<span class = 'success'>Product is deleted.</span>";
			return $msg;
		}
	}

	public function getFeaturedProduct(){
		$sql = "SELECT * FROM products WHERE productType='1' ORDER BY productId LIMIT 4";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}
	}

	public function getNewProduct(){
		$sql = "SELECT * FROM products ORDER BY productId LIMIT 4";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}
	}
	public function getSingleProduct($id){
		// $sql = "SELECT products.*,tbl_category.catName,tbl_brand.brandName
		// 		FROM products
		// 		INNER JOIN tbl_category
		// 		ON products.categoryId= tbl_category.catId 
		// 		INNER JOIN tbl_brand 
		// 		ON products.categoryId= tbl_brand.brandId WHERE products.productId='$id'";
		$sql ="SELECT p.*,c.catName,b.brandName
				FROM products as p,tbl_category as c,tbl_brand as b
				WHERE p.categoryId=c.catId AND p.brandId=b.brandId AND p.productId='$id'";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}
		
	}
	public function getProductSamsung(){
		$sql = "SELECT products.*,tbl_brand.brandName FROM products JOIN tbl_brand ON products.brandId = tbl_brand.brandId WHERE products.brandId='2' LIMIT 1";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		} 
		
	}
	public function getProductAsus(){
		$sql = "SELECT products.*,tbl_brand.brandName FROM products JOIN tbl_brand ON products.brandId = tbl_brand.brandId WHERE products.brandId='1' LIMIT 1";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		} 
		
	}
	public function getProductLenevo(){
		$sql = "SELECT products.*, tbl_brand.brandName FROM products JOIN tbl_brand ON products.brandId = tbl_brand.brandId WHERE products.brandId ='3' LIMIT 1";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		} 
	}
	public function getProductAcer(){
		$sql = "SELECT products.*, tbl_brand.brandName FROM products JOIN tbl_brand ON products.brandId = tbl_brand.brandId WHERE products.brandId ='3' LIMIT 1";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		} 
	}
	public function getCatWiseProduct($id){
		$sql    = "SELECT * FROM products WHERE categoryId='$id'";
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}
	}

	public function insertComparePro($cmrId,$compareId){
		$cmrId 		= mysqli_real_escape_string($this->db->link,$cmrId);
		$compareId  = mysqli_real_escape_string($this->db->link,$compareId);
		$sql        = "SELECT * FROM products WHERE productId='$compareId'";
		$result     = $this->db->select($sql)->fetch_assoc();
		if ($result) {
			$productId   = $result['productId'];
			$productName = $result['productName'];
			$price  	 = $result['price'];
			$picture     = $result['picture'];
			$sql2        = "INSERT INTO tbl_compare(cmrId,productId,productName,price,image) VALUES('$cmrId','$productId','$productName','$price','$picture')";
			$result2     = $this->db->select($sql2);
			if($result2){
				$msg= "<style='color:green'>Added to comapre.";
				return $msg;
			}
			else{
				$msg= "<style='color:red'>Not added to compare.";
				return $msg;
			}
			
		}
	}
	public function saveWishData($id,$cmrId){
		// $cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
		// $proId = mysqli_real_escape_string($this->db->link,$id);
		$sql = "SELECT * FROM products WHERE productId= '$id'";
		$result= $this->db->select($sql)->fetch_assoc();
		if($result){
			$productId = $result['productId'];
			$productName = $result['productName'];
			$price = $result['price'];
			$picture = $result['picture'];
			$checksamepro = $this->checkSameProWish($cmrId,$id);
			if($checksamepro){
				$msg = "Product already in WishList..!";
				return $msg;
			}
			else{
				$sql2 = "INSERT INTO tbl_wishlist(cmrId,productId,productName,price,picture) VALUES('$cmrId','$productId','$productName','$price','$picture')";
				$result2= $this->db->insert($sql2);
				if($result2){
					$msg= "<style='color:green'>Added to Wishlist.</style>";
					return $msg;

				}
				else{
					$msg=  "<style='color:red'> Not Added to Wishlist.</style>";
					return $msg;

				}
			}
				
		}
	}
	public function checkWishList($cmrId){
		$cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
		$sql   = "SELECT * FROM tbl_wishlist WHERE cmrId = '$cmrId'";
		$result = $this->db->select($sql);
		return $result;
	}
	public function getFromWish($cmrId){
		$cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
		$sql   = "SELECT * FROM tbl_wishlist WHERE cmrId = '$cmrId'";
		$result = $this->db->select($sql);
		return $result;
	}
	public function checkSameProWish($cmrId,$id){
			$cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
			$id    = mysqli_real_escape_string($this->db->link,$id);
			$sql   = "SELECT * FROM tbl_wishlist WHERE cmrId = '$cmrId' AND productId='$id'";
			$result = $this->db->select($sql);
			return $result;
		}

	public function delwishPro($cmrId,$proId){
		$sql = "DELETE FROM tbl_wishlist WHERE cmrId = '$cmrId' AND productId='$proId'";
		$result = $this->db->delete($sql);
		
	}

}

?>