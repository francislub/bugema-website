<?php
    require_once 'config.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM programs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $overview = $row['overview'];
        $duration = $row['duration'];
        $entryRequirements = $row['requirements'];
        $department = $row['department'];
        $existingPhoto = $row['photo'];
 
        // Fetch department name based on department ID
        $sqlDept = "SELECT department FROM department WHERE id = ?";
        $stmtDept = $conn->prepare($sqlDept);
        if ($stmtDept) {
            $stmtDept->bind_param("i", $department);
            $stmtDept->execute();
            $resultDept = $stmtDept->get_result();

            if ($resultDept->num_rows > 0) {
                $rowDept = $resultDept->fetch_assoc();
                $department = $rowDept['department']; // Department name
        
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST['title'];
                    $overview = $_POST['overview'];
                    $duration = $_POST['duration'];
                    $entryRequirements = $_POST['content'];
                    $department = $_POST['department'];
                
                    // Fetch department ID based on department name
                    $sqlDept = "SELECT id FROM department WHERE department = ?";
                    $stmtDept = $conn->prepare($sqlDept);
                    $stmtDept->bind_param("s", $department);
                    $stmtDept->execute();
                    $resultDept = $stmtDept->get_result();

                    if ($resultDept->num_rows > 0) {
                        $rowDept = $resultDept->fetch_assoc();
                        $department = $rowDept['id']; // Department ID

                        // Check if a new photo is uploaded
                        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                            $newPhotoName = $_FILES['photo']['name'];
                            $newPhotoTmpName = $_FILES['photo']['tmp_name'];

                            // Move the uploaded file to a desired location
                            $newPhotoDestination = 'programs/' . $newPhotoName;
                            move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                            $new_path = "includes/" . $newPhotoDestination;

                            // Update the data into the database with the new photo
                            $sql = "UPDATE programs SET name=?, overview=?, duration=?, requirements=?, department=?,photo=? WHERE id=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssssisi", $name, $overview,$duration,$entryRequirements,$department , $new_path, $id);
                            
                            if ($stmt->execute()) {
                                // Remove the old photo file
                                unlink($existingPhoto);
                                
                                // Record updated successfully
                                $successMessage = "Program updated successfully.";
                                header("Location: ../programs.php?status=success&message=" . urlencode($successMessage));
                            } else {
                                // Error updating data
                                echo "Error updating data: " . $stmt->error;
                            }
                        } else {
                            // No new photo uploaded, update the data without changing the photo
                            $sql = "UPDATE programs SET name=?, overview=?, duration=?, requirements=?, department=? WHERE id=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssssii", $name, $overview, $duration, $entryRequirements, $department, $id);

                            if ($stmt->execute()) {
                                // Record updated successfully
                                $successMessage = "Program Updated Successfully.";
                                header("Location: ../programs.php?status=success&message=" . urlencode($successMessage));
                            } else {
                                // Error updating data
                                echo "Error updating data: " . $stmt->error;
                            }
                        }
                    }
            }
        }else{
            $department = "";
        }
    }
    } else {
        // No record found for the given ID
        echo "No record found for ID: $id";
    }

    // Close the database connection
    $conn->close();
    ###############################################
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Programs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div>
                                <input type="text" class="form-control input-md" name="title" value="<?php echo $name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Overview</label>
                            <textarea name="overview" cols="30" rows="10" class="form-control input-md"><?php echo $overview; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Duration</label>
                            <div>
                                <input type="text" class="form-control input-md" name="duration" value="<?php echo $duration; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Entry Requirements</label>
                            <textarea name="content" cols="30" rows="10" class="form-control input-md"><?php echo $entryRequirements; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Photo</label>
                            <div>
                                <input type="file" class="form-control-file" name="photo">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label >Department</label>
                            <div>
                                <input type="text" class="form-control input-md" name="department" value="<?php echo $department; ?>">
                            </div>
                        </div>
                        <br>
                        <div id="departmentDataEntry" class="mt-3"></div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        <!-- DataTales Example -->
    </div>

    <!-- Bootstrap JS (Popper.js included) and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#exampleModalCenterEdit').modal('show');
    });
    // Add an event handler for the close button
    $('.close').click(function() {
        $('#exampleModalCenterEdit').modal('hide');
        //$('#yourFormId').show();
        window.location.href = "../programs.php?status=success&message=";
    });
    // Add an event handler for the hidden.bs.modal event
    $('#exampleModalCenterEdit').on('hidden.bs.modal', function (e) {
        // Display the form or perform any action when modal is hidden
        window.location.href = "../programs.php?status=success&message=";
    });
    
</script>
</body>
</html>