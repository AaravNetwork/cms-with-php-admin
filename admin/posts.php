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
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category Id</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments Count</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM posts";
                                $select_all_queries = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_assoc($select_all_queries)) {
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_category_id = $row['post_category_id'];
                                    $post_status = $row['post_status'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_comments_count = $row['post_comment_count'];
                                    $post_date = $row['post_date'];

                                    echo "<tr>";
                                    echo "<td style='vertical-align: middle;'>{$post_id}</td>";
                                    echo "<td style='vertical-align: middle;'>{$post_author}</td>";
                                    echo "<td style='vertical-align: middle;'>{$post_title}</td>";
                                    echo "<td style='vertical-align: middle;'>{$post_category_id}</td>";
                                    echo "<td style='vertical-align: middle;'>{$post_status}</td>";
                                    echo "<td style='vertical-align: middle;'><img width='50' src='../images/{$post_image}'></td>";
                                    echo "<td style='vertical-align: middle;'>{$post_tags}</td>";
                                    echo "<td style='vertical-align: middle;'>{$post_comments_count}</td>";
                                    echo "<td style='vertical-align: middle;'>{$post_date}</td>";
                                    echo "</tr>";
                                }                                
                            ?>
                        </tbody>
                    </table>
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