<div class="col-md-4">
    <!-- BLOG SEARCH AREA START -->

    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <!-- BLOG SEARCH AREA END -->

    <!-- BLOG CATEGORIES AREA START -->
    <div class="well">
        <?php
        // $query = "SELECT * FROM categories LIMIT 3";
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($conn, $query);
        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php  
                     while ($row = mysqli_fetch_assoc($select_categories_sidebar)) { 
                        $cat_title = $row['cat_title']; 
                    
                        echo "<li><a href='#'>{$cat_title}</a></li>";
                    }?>
                </ul>
            </div>
        </div>
    </div>
    <!-- BLOG CATEGORIES AREA START -->

    <!-- SIDE WIDGET START -->
    <?php include './includes/widget.php'; ?>
    <!-- SIDE WIDGET END -->                
</div>