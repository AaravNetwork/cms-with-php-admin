<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>

        <?php
        // Edit category from db query
        if (isset($_GET['edit'])) {
            $cat_edit_id = $_GET['edit'];
            $edit_query = "SELECT * FROM categories WHERE cat_id = $cat_edit_id";
            $run_edit_query = mysqli_query($conn, $edit_query);
            while ($edit_row = (mysqli_fetch_assoc($run_edit_query))) {
                $cat_edit_id_input = $edit_row['cat_id'];
                $cat_edit_title_input = $edit_row['cat_title'];
            }
        ?>
            <input type="number" class="form-control" style="display: none;" name="cat_update_id" value="<?php if (isset($cat_edit_id_input)) {
                                                                                                                echo $cat_edit_id_input;
                                                                                                            } ?>">
            <input type="text" class="form-control" name="cat_update_title" id="cat_title" placeholder="Edit Category" value="<?php if (isset($cat_edit_title_input)) {
                                                                                                                                    echo $cat_edit_title_input;
                                                                                                                                } ?>">

        <?php } ?>

        <?php
        if (isset($_POST['update_category'])) {
            $update_cat_id = $_POST['cat_update_id'];
            $update_cat_title = $_POST['cat_update_title'];

            $update_query = "UPDATE categories SET cat_title = '$update_cat_title' WHERE cat_id = '$update_cat_id'";
            $update_query_run = mysqli_query($conn, $update_query);
            header('Location: categories.php');

            if (!$update_query) {
                die("Query Failed" . mysqli_error($conn));
            }
        }
        ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_category" value="Edit Category">
    </div>
</form>