<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                	if(isset($_GET['id'])){
                		$id = $_GET['id'];
                		$query = "DELETE FROM category WHERE id='$id' ";
                		$delete_category = $db->ad_delete($query);
                		if($delete_category){
                			echo "<span class='success'>Category has been Deleted !!</span>";
                		}
                		else{
                			echo "<span class='error'>Something Wrong! Category Not Deleted !!</span>";
                		}
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "SELECT * FROM category ORDER BY id DESC ";
							$get_data = $db->ad_select($query);
							$i = 1;
							if($get_data){
								while($row = $get_data->fetch_assoc()){
						?>
						<tr class="odd gradeX">
							<td><?php echo $i++; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td>
								<a href="category_edit.php?id=<?php echo $row['id']; ?>">Edit</a> 
								|| 
								<a onclick="return confirm('Are you sure to Delete!');" href="?id=<?php echo $row['id']; ?>">Delete</a>
							</td>
						</tr>
						<?php } } else { ?>
							<td colspan="3">No Category Available !!</td>
						<?php } ?>
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

<?php include('includes/footer.php'); ?>
