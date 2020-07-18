<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';

  $cat = new Category();
  $getCat = $cat->showAll();

  if (isset($_GET['delcat'])) {
  	$id = $_GET['delcat'];
  	$deleteCat = $cat->catDelete($id);
  }
  
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<?php 
							if (isset($deleteCat)) {
								echo $deleteCat;
							}

						?>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						 $i=0;
						 foreach ($getCat as $data) {
							$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $data['catName'];?></td>
							<td><a href="catedit.php?catId=<?php echo $data['catId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="?delcat=<?php echo $data['catId'];?>">Delete</a></td>
						</tr>
						<?php 
						} ?>
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

