<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
               <?php  
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $category = mysqli_real_escape_string($db->link, $_POST['category']);
                        if(empty($category)){
                            echo "<span class='error'>Field must be not empty !!</span>";
                        }
                        else{
                            $query = "INSERT INTO category(name) VALUES('$category')";
                            $category_insert = $db->ad_insert($query);
                            if($category_insert){
                                echo "<span class='success'>Category Inserted Successfully !!</span>";
                            }
                            else{
                                echo "<span class='error'>Category Not Inserted !!</span>";
                            }

                        }
                    }
               ?> 
                 <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="category" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
