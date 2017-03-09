<?php
    if(isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id={$post_id}";
        $edit_query = mysqli_query($con, $query);
        confirm($edit_query);
        
       while($row = mysqli_fetch_assoc($edit_query)) {

            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_author = $row['post_author'];
            $post_status = $row['post_status'];

            $post_image = $row['post_image'];

            $post_tags = $row['post_tags'];
            $post_content = $row['post_content'];
            $post_comment_count = $row['post_comment_count'];
       }
    }

    if(isset($_POST['update_post'])) {        
        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category'];
        $post_author = $_POST['author'];
        $post_status = $_POST['status'];
        
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $post_tags = $_POST['tags'];
        $post_content = $_POST['content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        //In case the user do not select any image, keep the current.
        if(empty($post_image)) {
            $select_image_query = "SELECT * FROM posts WHERE post_id='{$post_id}'";
            $select_image_result = mysqli_query($con, $select_image_query);
            confirm($select_image_result);
            
            while($row = mysqli_fetch_assoc($select_image_result)) {
                $post_image = $row['post_image'];
            }
        }
        
        $query = "UPDATE posts SET post_category_id='{$post_category_id}', post_title='{$post_title}', post_author='{$post_author}', post_date=now(), post_image='{$post_image}', post_content='{$post_content}', post_tags='{$post_tags}', post_comment_count='{$post_comment_count}', post_status='{$post_status}' WHERE post_id='{$post_id}'";
        
        $submit_edit_post = mysqli_query($con, $query);
        confirm($submit_edit_post);
    }
?>
   


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title" class="control-label">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post_title ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="post_category" class="control-label">Post Category</label>
        <select class="form-control" style="width: 150px" name="post_category" id="">
            <option value=""></option>
            <?php
               $query = "SELECT * FROM categories";
               $cat_select_query = mysqli_query($con, $query);
               confirm($cat_select_query);
               
               while($row = mysqli_fetch_assoc($cat_select_query)) {
                   $cat_id = $row['cat_id'];
                   $cat_title = $row['cat_title'];
                   
                   echo "<option value='{$cat_id}'>{$cat_title}</option>";
               }
            ?>
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="author" class="control-label">Post Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo $post_author ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="status" class="control-label">Post Status</label>
        <input type="text" class="form-control" name="status" value="<?php echo $post_status ?>">
    </div>
    <br>
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image ?>" alt="Post Image">
        <input type="file" name="image">
    </div>
    <br>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags" value="<?php echo $post_tags ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" name="content" id="" cols="30" rows="10"><?php echo $post_content ?> 
        </textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Publish Post">
    </div>
    
    
</form>
