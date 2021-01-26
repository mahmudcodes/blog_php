<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
				<?php
					$query = "SELECT * FROM category";
					
					$get_data = $db->select($query);

					if($get_data){
						while($row = $get_data->fetch_assoc()){
				?>
					<ul>
						<li><a href="category_by_post.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>						
					</ul>
				<?php } } else{ ?>
					<li>No Category Available !!</li>
				<?php } ?>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php
					$query = "SELECT * FROM post ORDER BY date DESC LIMIT 4";
					$get_data = $db->select($query);

					if($get_data){
						while($row = $get_data->fetch_assoc()){
				?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
						<a href="post.php?id=<?php echo $row['id']; ?>"><img src="images/<?php echo $row['image']; ?>" alt="post image"/></a>
						<?php echo $format->postShort($row['body'], 160); ?>	
					</div>
				<?php } } else { ?>
					<div class="popular clear">
						<h3>No Recent Post Available !!</h3>
					</div>
				<?php } ?>
	
			</div>
			
		</div>