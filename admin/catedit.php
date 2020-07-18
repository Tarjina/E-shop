<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';

$cat = new Category();
$id = $_GET['catId'];

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $upcatName = $_POST['catName'];
    $upcat = $cat->catUpdate($id,$upcatName);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php if (isset($upcat)) {
                          echo $upcat;
                }

                ?>
                <?php  $getCat = $cat->showIdWiseData($id);
                        if ($getCat) {
                            while ($result = $getCat->fetch_assoc()) {
              
                ?>
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <? }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>