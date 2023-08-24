<?php include './includes/admin_header.php'; ?>
<div id="wrapper">
    <!-- NAVIGATION START -->
    <?php include './includes/admin_navigation.php'; ?>
    <!-- NAVIGATION END -->

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Tatai</small>
                    </h1>

                    <div class="col-xs-6">
                        <?php
                        // Add new categories into db query
                        if (isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];

                            if ($cat_title == "" || empty($cat_title)) {
                                echo "This field should not be empty";
                            } else {
                                $add_cat_query = "INSERT INTO categories(cat_title) VALUES('$cat_title')";
                                $create_category_query = mysqli_query($conn, $add_cat_query);

                                if (!$create_category_query) {
                                    die("Query Failed" . mysqli_error($conn));
                                }
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title" id="cat_title" placeholder="Add Category">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                            </div>
                        </form>
                        <?php

                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];


                            include "./includes/update_categories.php";
                        }

                        ?>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch all categories form db query
                                $query = "SELECT * FROM categories";
                                $select_all_categories_query = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a> <a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<tr>";
                                }
                                ?>
                                <?php
                                // Delete category form db query
                                if (isset($_GET['delete'])) {
                                    $cat_delete_id = $_GET['delete'];
                                    $delete_query = "DELETE FROM categories WHERE cat_id = $cat_delete_id";
                                    $run_delete_query = mysqli_query($conn, $delete_query);
                                    header("Location: categories.php");
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>




                    <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include './includes/admin_footer.php'; ?>