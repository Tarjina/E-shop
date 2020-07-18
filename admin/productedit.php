<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';
    include '../classes/Category.php';
    include '../classes/Product.php';
?>
<?php 
    $id = $_GET['productId'];
    $pro =  new Product();

    $getpro = $pro->getIdWiseProduct($id);

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){
       $Upproduct = $pro->updateProduct($id,$_POST,$_FILES);
     }



 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <?php if (isset($Upproduct)) {
                echo $Upproduct;
            } ?>
            <?php 

            if ($getpro) {
                while($product = $getpro->fetch_assoc()) {
            ?>
            
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $product['productName'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="categoryId">
                            <option>Select Category</option>
                            <?php  
                             $cat = new Category();
                             $allCat = $cat->showAll();
                             if ($allCat) {
                                 while ($result = $allCat->fetch_assoc()) 
                                { ?>
                                 <option 
                                 <?php  
                                 if ($product['categoryId']==$result['catId']) {
                                    ?>
                                     selected = "selected";
                                 
                                   <?php } ?>
                                 value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option> 
                             <?php } }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                             <option>Select Brand</option>
                            <?php 
                            $brand = new Brand();
                            $allBrand = $brand->showAllBrand();
                            if ($allBrand) {
                                while ($result = $allBrand->fetch_assoc()) {
                                    ?>
                                    
                                     <option
                                     <?php 
                                     if ($product['brandId']==$result['brandId']) {
                                        ?>
                                         selected = "selected";
                                    <?php  }
                                     ?>
                                      value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
                             <?php   }
                            }
                            ?>
                           
                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="description" value="<?php echo $product['description'];?>"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $product['price'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>

                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $product['[picture'];?>" height="20px" width ="40px">
                        <input type="file" name="picture" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="productType">
                            <option>Select Type</option>
                            <?php if($product['productType']==1) {
                            ?>
                            <option selected ="selected" value="1">Featured</option>
                            <option value="2">General</option>
                            <?php } else {
                                ?>
                            <option value="1">Featured</option>
                            <option selectedc="selected" value="2">General</option>
                            <?php  } ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="update" Value="Update" />
                    </td>
                </tr>
            </table>
            <?php } }

            ?>
            </form>
            
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


