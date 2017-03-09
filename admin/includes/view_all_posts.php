<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "SELECT * FROM posts";
            $select_post = mysqli_query($con,$query);

            while($row = mysqli_fetch_assoc($select_post)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id']; 
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];


        ?>

                <tr>
                    <td><?php echo $post_id ?></td>
                    <td><?php echo $post_author ?></td>
                    <td><?php echo $post_title ?></td>
                    <?php
                       $query = "SELECT * FROM categories WHERE cat_id='{$post_category_id}'";
                       $cat_select_query = mysqli_query($con, $query);
                       confirm($cat_select_query);

                       while($row = mysqli_fetch_assoc($cat_select_query)) {
                           $cat_id = $row['cat_id'];
                           $cat_title = $row['cat_title'];
                       }
                    ?>
                    <td><?php echo $cat_title ?></td>
                    <td><?php echo $post_status ?></td>
                    <td><img style="width: 100px;" src="../images/<?php echo $post_image?>" </td>
                    <td><?php echo $post_tags ?></td>
                    <td><?php echo $post_content ?></td>
                    <td><?php echo $post_date ?></td>
                    <td><a href="posts.php?source=edit_post&p_id=
                       <?php echo $post_id ?>">Edit</a> 
                    </td>
                    <td><a href="posts.php?delete=<?php echo $post_id ?>">Delete</a>
                    </td>    
                    
                </tr>
            <?php } ?>
    </tbody>
</table>
<?php 
    if(isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id={$delete_id}";
        $delete_query = mysqli_query($con, $query);
        confirm($delete_query);
        header("Location: posts.php");
    }
?>
