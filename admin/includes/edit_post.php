<?php 

    if(isset($_GET['edit_pid'])) {
        $edit_post_id = $_GET['edit_pid'];

        $edit_post_query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
        $edit_post_query_exe = mysqli_query($conn, $edit_post_query);

        while($row = mysqli_fetch_assoc($edit_post_query_exe)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comments_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category ID</label>
        <input type="text" class="form-control" name="post_category_id" id="post_category_id" value="<?php echo $post_category_id; ?>">
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" id="author" value="<?php echo $post_author; ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="post_status" value="<?php echo $post_status; ?>">
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" src="../images/<?php echo $post_image; ?>" name="image" id="image">
        <img src="../images/<?php echo $post_image; ?>" width="100" alt="">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="post_tags" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="post_content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>

<?php   }} ?>