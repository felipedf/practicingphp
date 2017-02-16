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
                        <div class="row">
                            <div class="col-sm-6">
                               
                             <?php insert_categories(); ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cat_title">Add category</label>
                                        <input type="text" class="form-control" id="cat_title" name="cat_title">
                                    </div>
                                    <input class="btn btn-primary" type="submit" name="submit">
                                </form>
                                <br>
                                <?php if(isset($_GET['edit'])) {
                                    include "includes/edit_categories.php";
                                } ?>                             
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>      
                                        <?php 
                                            findAllCategories();
                                            deleteCategories();
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <br>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->                                
        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>

