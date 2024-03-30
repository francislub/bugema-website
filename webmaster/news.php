<?php
    require_once 'header.php';
    require_once 'sidebar.php';

    if (isset($_GET['status']) && isset($_GET['message'])) {
        $status = $_GET['status'];
        $message = $_GET['message'];
    
        if ($status === 'success') {
            // Display success alert
            echo '<div class="alert alert-success">' . $message . '</div>';
        } elseif ($status === 'error') {
            // Display error alert
            echo '<div class="alert alert-danger">' . $message . '</div>';
        }
    }
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">NEWS</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    ADD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">News $ Announcements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="includes/news.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">Title</label>
                    <div>
                        <input type="text" class="form-control input-md" name="title" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Category</label>
                    <div>
                        <select class="form-control" name="category">
                            <option>Select Category</option>
                            <option value="announce">Announcement</option>
                            <option value="news">News</option>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label">Content</label>
                    <textarea name="content" cols="30" rows="10" class="form-control input-md"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Photo</label>
                    <div>
                        <input type="file" class="form-control-file" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Date</label>
                    <div>
                        <input type="date" class="form-control input-md" name="date" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4 mt-2">
    
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">News & Announcements</h6>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Content</th>
                        <th>Photo</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            // Assuming you have established a database connection and stored it in the $conn variable
            require_once 'includes/config.php';
            // Prepare the SELECT statement
            $sql = "SELECT * FROM news";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $title = $row["title"];
                    $category = $row["category"];
                    $content = $row["content"];
                    $photo = $row["photo"];
                    $date = $row["date"];
                    ?>
                    <tr>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $content; ?></td>
                        <td>
                            <img src="<?php echo $photo; ?>" alt="Photo" style="max-width: 50px; height: auto;">
                        </td>
                        <td><?php echo $date; ?></td>
                        <?php
                            echo "<td>";  
                            echo "<div class='btn-group' role='group'>";    
                            echo "<a href='includes/update_news.php?id=" . $row["id"] . "'> <button class='btn btn-primary'style='margin-right: 5px;'><i class='fa fa-edit'></i> Edit</button></a>";
                        ?>
                        <?php      
                            echo "<a href='includes/del_news.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete?\");'> <button class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button></a>";
                            echo "</div>";
                            echo "</td>";
                        ?>
                    </tr>
                <?php
                }
            } else {
                // No records found
                echo "<tr><td colspan='6'>No records found.</td></tr>";
            }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
    require_once 'footer.php';
?>