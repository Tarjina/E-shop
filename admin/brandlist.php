<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';

 $brand = new Brand();
 $brandall = $brand->showAllBrand();  
 
 if (isset($_GET['delbrand'])) {
 	$id = $_GET['delbrand'];
 	$delbrand = $brand->deleteBrand($id);
 }
  
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						
						
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$i=0;
							foreach ($brandall as $data) {
								$i++;
							 	
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $data['brandName'];?></td>
							<td><a href="Brandedit.php?brandId=<?php echo $data['brandId'];?>">Edit</a> || <a onclick= "return confirm('Are you sure to delete?')"
								href="?delbrand=<?php echo $data['brandId'];?>">Delete</a></td>
						</tr>
							<?php }
							 ?>
						
						</tbody>

							
					</tbody>
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

