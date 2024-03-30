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
<h1 class="h3 mb-2 text-gray-800">PROGRAMS</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    ADD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Programs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="includes/program.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <div>
                        <input type="text" class="form-control input-md" name="title" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Overview</label>
                    <textarea name="overview" cols="30" rows="10" class="form-control input-md"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Duration</label>
                    <div>
                        <input type="text" class="form-control input-md" name="duration" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Entry Requirements</label>
                    <textarea name="content" cols="30" rows="10" class="form-control input-md"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Photo</label>
                    <div>
                        <input type="file" class="form-control-file" name="photo">
                    </div>
                </div>
                <select class="form-control" name="department">
                        <option>Select Department</option>
                        <?php
                        // Assuming you have a database connection established
                        require_once 'includes/config.php';
                        $query2 = "SELECT * FROM department";
                        $result2 = mysqli_query($conn, $query2);

                        // Loop through the query results and generate the options
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $name = $row2['department'];
                            $id = $row2['id'];

                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }

                        // Free the result set
                        mysqli_free_result($result2);
                        ?>
                    </select><br>
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
                        <th>Overview</th>
                        <th>Duration</th>
                        <th>Requirements</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once 'includes/config.php';

                    // Assuming you have established a database connection and stored it in the $conn variable

                    // Retrieve data from the "program" table
                    $sql = "SELECT * FROM programs";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Iterate over the rows and generate table rows dynamically
                        while ($row = $result->fetch_assoc()) {
                            $name = $row["name"];
                            $overview = $row["overview"];
                            $duration = $row["duration"];
                            $requirements = $row["requirements"];
                            $photo = $row["photo"];

                            echo '<tr>';
                            echo '<td>' . $name . '</td>';
                            echo '<td>' . $overview . '</td>';
                            echo '<td>' . $duration . '</td>';
                            echo '<td>' . $requirements . '</td>';
                            echo '<td><img src="' . $photo . '" alt="Photo" style="max-width: 50px; height: auto;"></td>';
                            echo "<td>";
                            echo "<div class='btn-group' role='group'>";      
                            echo "<a href='includes/update_program.php?id=" . $row["id"] . "'> <button class='btn btn-primary'style='margin-right: 5px;'><i class='fa fa-edit'></i> Edit</button></a>";      
                            echo "<a href='includes/del_prog.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete?\");'> <button class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button></a>";
                            echo "</div";
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