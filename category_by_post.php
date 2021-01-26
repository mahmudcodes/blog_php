<?php include('include/header.php'); ?>
<?php include('include/slider.php'); ?>

<?php
	if(!isset($_GET['category']) || $_GET['category'] == NULL){
			header('location: 404.php');
	}
	else{
		$category = $_GET['category'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<!-- Pagination -->
			<?php
				$per_page = 3;
				if(isset($_GET['page'])){
					$page = $_GET['page'];
				}
				else{
					$page = 1;
				}
				$start_from = ($page - 1) * $per_page;
			?>
			<!-- Pagination -->
			<?php  
				$db = new Database();
				$format = new Format();
				$query = "SELECT * FROM post WHERE cat_id='$category' LIMIT $start_from, $per_page";
				//$query = "SELECT * FROM post LIMIT 1";
				$get_data = $db->select($query);

				if($get_data){
					while($row = $get_data->fetch_assoc()){
			?>


			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h2>
				<h4><?php echo $format->formatDate($row['date']); ?>, By <a href="#"><?php echo $row['author']; ?></a></h4>
				 <a href="#"><img src="images/<?php echo $row['image']; ?>" alt="post image"/></a>
				
				<?php echo $format->postShort($row['body']); ?>

				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
				</div>
			</div>

			<?php
					}
			?>
			<!-- Pagination -->
			<?php 
				$query_page = "SELECT * FROM post WHERE cat_id='$category' ";
				$get_page = $db->select($query_page);
				$total_rows = mysqli_num_rows($get_page);
				$total_pages = ceil($total_rows / $per_page);

				echo "<span class='pagination'><a href='category_by_post.php?category=$category&page=1'>".'First Page'."</a>"; 
				
				for($i=1; $i <= $total_pages; $i++){
					//echo "<a href='index.php?page=$i'>";
					echo "<a href='category_by_post.php?category=$category&page=".$i."'>".$i."</a>";
				}

				echo "<a href='category_by_post.php?category=$category&page=$total_pages'>".'Last Page'."</a></span>"; 
			?>
			<!-- Pagination -->
			<?php
				}
				else{ ?>
				<p class="no-post">No Post Available in this Category !!</p>
			<?php } ?>
			

		</div>
		<?php include('include/sidebar.php'); ?>
		<?php include('include/footer.php'); ?>
	