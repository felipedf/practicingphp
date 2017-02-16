<form action="" method="post">
    <div class="form-group">
        <label for="update_title">Edit category</label>

            <?php  // UPDATE QUERY
                if(isset($_GET['edit'])) {
                    $cat_tb_edit_id = $_GET['edit'];
                    $select_title_query = "SELECT cat_title FROM categories WHERE cat_id = $cat_tb_edit_id";

                    $update_result = mysqli_query($con, $select_title_query);
                    $title_update = mysqli_fetch_assoc($update_result)['cat_title'];
                }

                if(isset($_POST['update'])) {
                    $cat_tb_edit_id = $_GET['edit'];
                    $cat_edit_title = $_POST['update_title'];
                    $query = "UPDATE categories SET cat_title = '$cat_edit_title' WHERE cat_id='$cat_tb_edit_id'";

                    $update_query = mysqli_query($con, $query);
                    if(!$update_query) {
                        die("deu mera2 ". mysqli_error($con));
                    }
                    header("Location: admin_categories.php");
                }
            ?>
        <input value="<?php if(isset($title_update)) echo $title_update;?>"type="text" class="form-control" id="cat_title" name="update_title">
    </div>
    <input class="btn btn-primary" type="submit" name="update">
</form>   