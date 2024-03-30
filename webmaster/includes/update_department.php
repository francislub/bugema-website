<?php
require_once 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM department WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $department = $row['department'];
    $school = $row['school'];
    $overview = $row['overview'];
 
    // Fetch department name based on department ID
    $sqlDept = "SELECT name FROM school WHERE id = ?";
    $stmtDept = $conn->prepare($sqlDept);
    if ($stmtDept) {
        $stmtDept->bind_param("i", $school);
        $stmtDept->execute();
        $resultDept = $stmtDept->get_result();

        if ($resultDept->num_rows > 0) {
            $rowDept = $resultDept->fetch_assoc();
            $school = $rowDept['name']; // school name
        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $department = $_POST['department'];
                $school = $_POST['school'];
                $overview = $_POST['overview'];

                // Fetch school ID based on school name
                $sqlDept = "SELECT id FROM school WHERE name = ?";
                $stmtDept = $conn->prepare($sqlDept);
                $stmtDept->bind_param("s", $school);
                $stmtDept->execute();
                $resultDept = $stmtDept->get_result();

                if ($resultDept->num_rows > 0) {
                    $rowDept = $resultDept->fetch_assoc();
                    $school = $rowDept['id']; // Department ID

            
                    // Check if a new photo is uploaded
                    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                        $newPhotoName = $_FILES['photo']['name'];
                        $newPhotoTmpName = $_FILES['photo']['tmp_name'];

                        // Move the uploaded file to a desired location
                        $newPhotoDestination = 'department/' . $newPhotoName;
                        move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                        $new_path = "includes/" . $newPhotoDestination;

                        // Update the data into the database with the new photo
                        $sql = "UPDATE department SET department=?, school=?, overview=?, photo=? WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssi", $department, $school, $overview, $new_path, $id);
                
                        // Check if the update was successful
                        if ($stmt->execute()) {
                            // Remove the old photo file
                            unlink($existingPhoto);
                            
                            // Record updated successfully
                            $successMessage = "Department updated successfully.";
                            header("Location: ../department.php?status=success&message=" . urlencode($successMessage));

                        } else {
                        // Error updating data
                        echo "Error updating data: " . $stmt->error;
                        }
                    } else {
                        // No new photo uploaded, update the data without changing the photo
                        $sql = "UPDATE department SET department=?, school=?, overview=? WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sisi", $department, $school, $overview, $id);

                        if ($stmt->execute()) {
                            // Record updated successfully
                            $successMessage = "Department Updated Successfully.";
                            header("Location: ../department.php?status=success&message=" . urlencode($successMessage));
                        } else {
                            // Error updating data
                            echo "Error updating data: " . $stmt->error;
                        }
                    }
                }
            }
        }else{
            $school = "";
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
                <h5 class="modal-title" id="exampleModalLongTitle">Departments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Deparment</label>
                            <div>
                                <input type="text" class="form-control input-md" name="department" value="<?php echo $department; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">School</label>
                            <div>
                                <input type="text" class="form-control input-md" name="school" value="<?php echo $school; ?>">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Overview</label>
                            <textarea name="overview" cols="30" rows="10" class="form-control input-md"><?php echo $overview; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Photo</label>
                            <div>
                                <input type="file" class="form-control-file" name="photo">
                            </div>
                        </div><br>
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
        window.location.href = "../department.php?status=success&message=";
    });
    // Add an event handler for the hidden.bs.modal event
    $('#exampleModalCenterEdit').on('hidden.bs.modal', function (e) {
        // Display the form or perform any action when modal is hidden
        window.location.href = "../department.php?status=success&message=";
    });
    
</script>
</body>
</html>