<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
        

        <div id="page-wrapper">
            <?php include "includes/admin_navigation.php" ?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
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
                                            <td><?php echo $post_category_id ?></td>
                                            <td><?php echo $post_status ?></td>
                                            <td><img style="width: 100px;" src="../images/<?php echo $post_image?>" </td>
                                            <td><?php echo $post_tags ?></td>
                                            <td><?php echo $post_content ?></td>
                                            <td><?php echo $post_date ?></td>
                                        </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->                                
        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>

