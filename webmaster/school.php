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
<h1 class="h3 mb-2 text-gray-800">SCHOOL</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    ADD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="includes/school.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <div>
                        <input type="text" class="form-control input-md" name="name" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Preamble</label>
                    <textarea name="preamble" cols="30" rows="10" class="form-control input-md"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Goal</label>
                    <textarea name="goal" cols="30" rows="10" class="form-control input-md"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Photo</label>
                    <div>
                        <input type="file" class="form-control-file" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Dean</label>
                    <div>
                        <input type="text" class="form-control input-md" name="dean" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Dean's Photo</label>
                    <div>
                        <input type="file" class="form-control-file" name="deanPhoto">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Dean's Message</label>
                    <textarea name="message" cols="30" rows="10" class="form-control input-md"></textarea>
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
                        <th>Name</th>
                        <th>Preamble</th>
                        <th>Goal</th>
                        <th>Photo</th>
                        <th>Dean</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once 'includes/config.php';

                    // Assuming you have established a database connection and stored it in the $conn variable

                    // Fetch data from the program table
                    $sql = "SELECT * FROM school";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row["name"];
                            $preamble = $row["preamble"];
                            $goal = $row["goal"];
                            $photo = $row["photo"];
                            $dean = $row["dean"];

                            // Output the table row with the fetched data
                            echo '<tr>';
                            echo '<td>' . $name . '</td>';
                            echo '<td>' . $preamble . '</td>';
                            echo '<td>' . $goal . '</td>';
                            echo '<td><img src="' . $photo . '" alt="Photo" style="max-width: 50px; height: auto;"></td>';
                            echo '<td>' . $dean . '</td>';
                            echo "<td>";   
                            echo "<div class='btn-group' role='group'>";   
                            echo "<a href='includes/update_school.php?id=" . $row["id"] . "'> <button class='btn btn-primary'style='margin-right: 5px;'><i class='fa fa-edit'></i> Edit</button></a>";      
                            echo "<a href='includes/del_school.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete?\");'> <button class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button></a>";
                            echo "</div>";
                            echo "</td>";

                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">No data found.</td></tr>';
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