<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../classes/Cart.php');
	include_once ($filepath.'/../helpers/format.php');
	$ct = new Cart();
	$fm = new Format();

	if(isset($_GET['shiftId'])){
		$id = $_GET['shiftId'];
		$price = $_GET['price'];
		$date = $_GET['date'];
		$shifted = $ct->shiftedProduct($id,$date,$price);
	}
	if(isset($_GET['delShiftId'])){
		$id = $_GET['delShiftId'];
		$price = $_GET['price'];
		$date = $_GET['date'];
		$delshiftedPro = $ct->DeleteShiftedProduct($id,$date,$price);
	}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Order table</h2>
                <div class="block"> 
                     <?php
                     	if(isset($shifted)){
                     		echo $shifted;
                     	}
                     ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Customer Id</th>
							<th>product Id</th>
							<th>product Name</th>
							<th>Price</th>
							<th>date</th>
							<th>Address</th>
							<th>Status</th>
						</tr>
					</thead>
					<?php
                 
                 $getorder = $ct->getAllOrder();
                 if($getorder){
                 	while ($result = $getorder->fetch_assoc()) {
                 ?>
              
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $result['orderId'];?></td>
							<td><?php echo $result['cmrId'];?></td>
							<td><?php echo $result['productId'];?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><a href="customer.php?cusId=<?php echo $result['cmrId'];?>">View Details</a></td>
							<?php 
							if($result['status']=='0'){
							?>
								<td><a href="?shiftId=<?php echo $result['cmrId'];?>&price=<?php echo $result['price'];?>&date=<?php echo $result['date'];?>">Shifted</a></td>
							<?php }
							elseif ($result['status']=='1') {
							?>
								<td>Pending</td>
							<?php } 
							else {
							?>
									<td><a href="?delShiftId=<?php echo $result['cmrId'];?>&price=<?php echo $result['price'];?>&date=<?php echo $result['date'];?>">Remove</a></td>
							<?php }?>
								
							 
						</tr>
						
					</tbody>
					 <?php	}
                 }
                ?>     
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
