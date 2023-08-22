<?php
include './includes/db.php';
include './includes/header.php';
include './includes/navigation.php';

?>

<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">Page Heading<small>Secondary Text</small></h1>

            <!-- BLOG POST AREA START -->
            <?php

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $search_query = mysqli_query($conn, $query);

                if (!$search_query) {
                    die("Query Failed" . mysqli_error($conn));
                }

                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo "<h1>No result found!</h1>";
                } else {
                    // $query = "SELECT * FROM posts";
                    // $select_all_posts_query = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($search_query)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];


                        echo "<h2><a href=''>{$post_title}</a></h2>";
                        echo "<p class='lead'>by <a href=''>{$post_author}</a></p>";
                        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on{$post_date}</p>";
                        echo "<hr>";
                        echo "<img class='img-responsive' src='./images/{$post_image}' alt=''>";
                        echo "<hr>";
                        echo "<p>{$post_content}</p>";
                        echo "<a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
                        echo "<hr>";
                    }
                }
            }
            ?>
            <!-- BLOG POST AREA END -->
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include './includes/sidebar.php'; ?>
    </div>
    <!-- /.row -->
    <hr>
    <?php include './includes/footer.php'; ?>