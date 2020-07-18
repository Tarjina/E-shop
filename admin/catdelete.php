<?php
include 'inc/header.php';
include '../classes/Category.php';
 $id = $_POST['catId'];
$cat = new Category();

$catDelete = $cat->catDelete($id);
if (isset($catDelete)) {
	header("Location:catlist.php");
}

?>