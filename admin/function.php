<?php
function insert_categories()
{
    global $conn;
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
}

function updateall_categories()
{   global $conn;
    if (isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];
        include "./includes/update_categories.php";
    }
}

function findall_categories()
{
    global $conn;
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
}

function deleteall_categories()
{
    global $conn;
    if (isset($_GET['delete'])) {
        $cat_delete_id = $_GET['delete'];
        $delete_query = "DELETE FROM categories WHERE cat_id = $cat_delete_id";
        $run_delete_query = mysqli_query($conn, $delete_query);
        header("Location: categories.php");
    }
}
?>