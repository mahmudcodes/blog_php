<?php include('include/header.php'); ?>


<?php
	/*
		if(!isset($_GET['id']) || $_GET['id'] == NULL){
			header('location: 404.php');
		}
		else{
			ekhane show korbe post.
		}
	*/
	if(isset($_GET['id'])){ 
		$id = $_GET['id'];
		$db = new Database();
		$format = new Format();
		$query = "SELECT * FROM post WHERE id='$id' ";
		$data = $db->select($query);
	}
	else{
		header('location: 404.php');
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php if($data){ 
					$row = $data->fetch_assoc();
				?>
				<h2><?php echo $row['title']; ?></h2>
				<h4><?php echo $format->formatDate($row['date']); ?>, By <?php echo $row['author']; ?></h4>
				<img src="images/<?php echo $row['image']; ?>" alt="MyImage"/>
				
				<?php echo $row['body']; ?>


				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php  
						$cat_id = $row['cat_id'];
						$related_query = "SELECT * FROM post WHERE cat_id='$cat_id' ORDER BY RAND() LIMIT 6 ";
						$related_post = $db->select($related_query);
						if($related_post){
							while($result = $related_post->fetch_assoc()){
					?>
					<a href="post.php?id=<?php echo $result['id']; ?>"><img src="images/<?php echo $result['image']; ?>" alt="post image"/></a>
					<?php } } else { echo "No Related Post Available !!"; } ?>
				</div>
				<?php } else{ header('location: 404.php'); } ?>
	</div>

		</div>
		
		<?php include('include/sidebar.php'); ?>
		<?php include('include/footer.php'); ?>