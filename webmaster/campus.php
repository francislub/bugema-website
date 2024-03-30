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
<h1 class="h3 mb-2 text-gray-800">CAMPUS</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    ADD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Campus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form role="form" method="POST" action="includes/campus.php" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label">Name</label>
        <div>
            <input type="text" class="form-control input-md" name="name" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Campus Photo</label>
        <div>
            <input type="file" class="form-control-file" name="campusphoto">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Director</label>
        <div>
            <input type="text" class="form-control input-md" name="director" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Directors Photo</label>
        <div>
            <input type="file" class="form-control-file" name="directorphoto">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Campus Number</label>
        <div>
            <input type="text" class="form-control input-md" name="number" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Campus Email</label>
        <div>
            <input type="text" class="form-control input-md" name="email" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Location</label>
        <div>
            <input type="text" class="form-control input-md" name="location" value="">
        </div>
    </div><br>
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
        <h6 class="m-0 font-weight-bold text-primary">Programs</h6>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Director</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once 'includes/config.php';

                    // Assuming you have established a database connection and stored it in the $conn variable

                    // Retrieve data from the "program" table
                    $sql = "SELECT * FROM campus";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Iterate over the rows and generate table rows dynamically
                        while ($row = $result->fetch_assoc()) {
                            $name = $row["name"];
                            $overview = $row["director"];
                            $duration = $row["email"];

                            echo '<tr>';
                            echo '<td>' . $name . '</td>';
                            echo '<td>' . $overview . '</td>';
                            echo '<td>' . $duration . '</td>';
                            echo "<td>";      
                            echo "<a href='includes/update_campus.php?id=" . $row["id"] . "'> <button class='btn btn-primary'><i class='fa fa-edit'></i> Edit</button></a>";
                            echo "<a href='includes/del_campus.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete?\");'> <button class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button></a>";
                            echo "</td>";
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">No records found</td></tr>';
                    }

                    // Close the database connection
                    $conn->close();
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