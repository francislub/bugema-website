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
<h1 class="h3 mb-2 text-gray-800">Gallery</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    ADD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="includes/gallery.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <div>
                        <input type="text" class="form-control input-md" name="name" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Category</label>
                    <input type="text" class="form-control input-md" name="category" value="">
                </div>
                <div class="form-group">
                    <label class="control-label">Tag</label>
                    <input type="text" class="form-control input-md" name="tag" value="">
                </div>
                <div class="form-group">
                    <label class="control-label">Photo</label>
                    <div>
                        <input type="file" class="form-control-file" name="photo">
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
        <h6 class="m-0 font-weight-bold text-primary">Gallery</h6>
        
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>category</th>
                <th>Tag</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'includes/config.php';
            // Fetch data from the "event" table
            $sql = "SELECT * FROM gallery";
            $result = $conn->query($sql);

            // Check if any rows are returned
            if ($result->num_rows > 0) {
                // Output data of each row
                //$photo = $row["photo"];
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
                    $category = $row['category'];
                    $tag = $row['tag'];
                    $photo = $row["photo"];
                            
                    echo "<tr>";
                    echo "<td>" . $name . "</td>";
                    echo "<td>" . $category . "</td>";
                    echo "<td>" . $tag. "</td>";
                    echo '<td><img src="' . $photo . '" alt="Photo" style="max-width: 50px; height: auto;"></td>';
                    echo "<td>";      
                    echo "<a href='includes/update_gallery.php?id=" . $row["id"] . "'> <button class='btn btn-primary'><i class='fa fa-edit'></i> Edit</button></a>";     
                    echo "<a href='includes/del_gallery.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete?\");'> <button class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button></a>";
                    echo "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }

            // Close the connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

    </div>
</div>

</div>
<!-- /.container-fluid -->
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this event?");
    }
</script>

<?php
    require_once 'footer.php';
?>