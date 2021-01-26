<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td>01</td>
							<td>Internet</td>
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
						</tr>
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
