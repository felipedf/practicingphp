<?php
    function insert_categories() {
        global $con;
        if(isset($_POST['submit'])) {
            $title = $_POST['cat_title'];

            if($title === "" || empty($title)) {
                echo "This field should not be empty.";
            }
            else {
                $query = "INSERT INTO categories(cat_title) 
                            VALUE('{$title}')";
                $create_query = mysqli_query($con, $query);
                if(!$create_query) {
                    die("deu errado" . mysqli_error($con));
                }
            }
        }
    }

    function findAllCategories() {
        global $con;
        $query = "SELECT * FROM categories";
        $query_result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($query_result)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<tr>
                    <td> 
                        {$cat_id}
                    </td>
                    <td> 
                        {$cat_title} &nbsp;
                        <a href='admin_categories.php?delete={$cat_id}'> Delete </a>
                        &nbsp;
                        <a href='admin_categories.php?edit={$cat_id}'> Edit </a>
                    </td>
                </tr>";
        }       
    }

    function deleteCategories() {
        global $con;
         if(isset($_GET['delete'])) {
            $cat_tb_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id='$cat_tb_id'";

            $delete_query = mysqli_query($con, $query);
            if(!$delete_query) {
                die("deu mera ". mysqli_error($con));
            }
            header("Location: admin_categories.php");
        }       
    }

?>