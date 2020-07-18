<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Customer.php';?>

<?php
    if(!isset($_GET['cusId']) || $_GET['cusId']==NULL){
        echo "<script>window.location = 'inbox.php';</script>";
    }
    else{
        $id = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['cusId']);
    }

    // if ($_SERVER['REQUEST_METHOD']=='POST') {
    //     $upcatName = $_POST['catName'];
    //     $upcat = $cat->catUpdate($id,$upcatName);
    // } 

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                
               
                <?php  $cmr = new Customer();
  
                    $getCmr = $cmr->GetCustomerData($id);
                        if($getCmr) {
                            while ($result = $getCmr->fetch_assoc()) {
              
                ?>
                 <form action="" method="post">
                    <table class="form">                    
                        
                        <tr>
                            <td>Id</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['customerId'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['city'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['country'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zip-Code</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['zip_code'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone'];?>" class="medium" />
                            </td>
                        </tr>
                    
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <? }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>