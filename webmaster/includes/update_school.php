<?php
    require_once 'config.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM school WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $preamble = $row['preamble'];
        $goal = $row['goal'];
        $dean = $row['dean'];
        $message = $row['message'];
        $schoolPhotoPath = $row['photo'];
        $deanPhotoPath = $row['deans'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $preamble = $_POST['preamble'];
            $goal = $_POST['goal'];
            $dean = $_POST['dean'];
            $message = $_POST['message'];
            #=============================First Photo Update =============================================
            // Check if a new photo is uploaded
            if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $newPhotoName = $_FILES['photo']['name'];
                $newPhotoTmpName = $_FILES['photo']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination = 'school/' . $newPhotoName;
                move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                $new_path = "includes/" . $newPhotoDestination;

                // Update the data into the database with the new photo
                $sql = "UPDATE school SET name=?, preamble=?, goal=?, photo=?, dean=?,message=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssi", $name, $preamble, $goal, $new_path, $dean, $message, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($schoolPhotoPath);
                    
                    // Record updated successfully
                    $successMessage = "School updated successfully.";
                    header("Location: ../school.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            } else {
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE school SET name=?, preamble=?, goal=?, dean=?, message=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $name, $preamble,$goal,$dean,$message, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "School Updated Successfully.";
                    header("Location: ../school.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            }
            #=============================second Photo update=======================================
            // Check if a new photo is uploaded
            if ($_FILES['deanPhoto']['error'] === UPLOAD_ERR_OK) {
                
                $newPhotoName1 = $_FILES['deanPhoto']['name'];
                $newPhotoTmpName1 = $_FILES['deanPhoto']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination1 = 'school/' . $newPhotoName1;
                move_uploaded_file($newPhotoTmpName1, $newPhotoDestination1);
                $new_path1 = "includes/" . $newPhotoDestination1;

                // Update the data into the database with the new photo
                $sql = "UPDATE school SET name=?, preamble=?, goal=?, dean=?, deans =? ,message=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssi", $name, $preamble, $goal, $dean,$new_path1, $message, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($deanPhotoPath);
                    
                    // Record updated successfully
                    $successMessage = "School updated successfully.";
                    header("Location: ../school.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            } else {
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE school SET name=?, preamble=?, goal=?, dean=?, message=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $name, $preamble,$goal,$dean,$message, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "School Updated Successfully.";
                    header("Location: ../school.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            }
            #=============================Both Photo Update ============================================
            // Check if a new photo is uploaded
            if ($_FILES['photo']['error'] === UPLOAD_ERR_OK && $_FILES['deanPhoto']['error'] === UPLOAD_ERR_OK) {
                $newPhotoName = $_FILES['photo']['name'];
                $newPhotoTmpName = $_FILES['photo']['tmp_name'];
                
                $newPhotoName1 = $_FILES['deanPhoto']['name'];
                $newPhotoTmpName1 = $_FILES['deanPhoto']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination = 'school/' . $newPhotoName;
                move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                $new_path = "includes/" . $newPhotoDestination;

                // Move the uploaded file to a desired location
                $newPhotoDestination1 = 'school/' . $newPhotoName1;
                move_uploaded_file($newPhotoTmpName1, $newPhotoDestination1);
                $new_path1 = "includes/" . $newPhotoDestination1;

                // Update the data into the database with the new photo
                $sql = "UPDATE school SET name=?, preamble=?, goal=?, photo=?, dean=?, deans =? ,message=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssssi", $name, $preamble, $goal, $new_path, $dean,$new_path1, $message, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($schoolPhotoPath);
                    unlink($deanPhotoPath);
                    
                    // Record updated successfully
                    $successMessage = "School updated successfully.";
                    header("Location: ../school.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            } else {
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE school SET name=?, preamble=?, goal=?, dean=?, message=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $name, $preamble,$goal,$dean,$message, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "School Updated Successfully.";
                    header("Location: ../school.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
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
                <h5 class="modal-title" id="exampleModalLongTitle">School</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div>
                                <input type="text" class="form-control input-md" name="name" value="<?php echo $name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Preamble</label>
                            <textarea name="preamble" cols="30" rows="10" class="form-control input-md"><?php echo $preamble; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Goal</label>
                            <textarea name="goal" cols="30" rows="10" class="form-control input-md"><?php echo $goal; ?></textarea>
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
                                <input type="text" class="form-control input-md" name="dean" value="<?php echo $dean; ?>">
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
                            <textarea name="message" cols="30" rows="10" class="form-control input-md"><?php echo $message; ?></textarea>
                        </div>
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
        window.location.href = "../school.php?status=success&message=";
    });
    // Add an event handler for the hidden.bs.modal event
    $('#exampleModalCenterEdit').on('hidden.bs.modal', function (e) {
        // Display the form or perform any action when modal is hidden
        window.location.href = "../school.php?status=success&message=";
    });
</script>
</body>
</html>