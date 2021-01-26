<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php 
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'catlist.php';</script>";
       //header('location: catlist.php');
    }  
    else{
        $id = $_GET['id'];
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock">
               <?php
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $category = mysqli_real_escape_string($db->link, $_POST['category']);
                        if(empty($category)){
                            echo "<span class='error'>Field must be not empty !!</span>";
                        }
                        else{
                            $query = "UPDATE category SET name='$category' WHERE id='$id' ";
                            $category_insert = $db->ad_update($query);
                            if($category_insert){
                                echo "<span class='success'>Category Updated Successfully !!</span>";
                            }
                            else{
                                echo "<span class='error'>Category Not Updated !!</span>";
                            }

                        }
                    }
               ?> 

               <?php 
                    $query = "SELECT * FROM category WHERE id='$id' ORDER BY id DESC";
                    $get_category = $db->ad_select($query);
                    if($get_category){
                    while($row = $get_category->fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="category" value="<?php echo $row['name']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
                </div>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
