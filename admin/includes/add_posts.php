<?php
    if(isset($_POST['create_post'])) {        
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
        
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}','{$post_status}')";
        
        $submit_post = mysqli_query($con, $query);
        confirm($submit_post);
    }
?>
   

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title" class="control-label">Post Title</label>
        <input type="text" class="form-control" name="title">
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
        <input type="text" class="form-control" name="author">
    </div>
    <br>
    <div class="form-group">
        <label for="status" class="control-label">Post Status</label>
        <input type="text" class="form-control" name="status">
    </div>
    <br>
    <div class="form-group">
        <label for="image"> Post Image</label>
        <input type="file" name="image">
    </div>
    <br>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags">
    </div>
    <br>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" name="content" id="" cols="30" rows="10">
        </textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
    
    
</form>