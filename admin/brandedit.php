<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';
 $brand = new Brand();
  $id = $_GET['brandId'];

  $brand1 = $brand->showIdWiseBrand($id);
  if ($_SERVER['REQUEST_METHOD']=='POST') {
     $brandName = $_POST['brandName'];
     $brand2 = $brand->updateBrand($id,$brandName);
  }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
               <?php if(isset($brand2)){
                        echo $brand2;
               } ?> 
                <?php if ($brand1) {
                          while ($result= $brand1->fetch_assoc()) {
                              
                         
                     ?>     
                 <form action="" method="post">
                    <table class="form">	
                    		
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName']?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                     <?php  }
                        } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>