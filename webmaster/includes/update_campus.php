<?php
    require_once 'config.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM campus WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $director = $row['director'];
        $number = $row['number'];
        $email = $row['email'];
        $location = $row['location'];
        $existingPhoto = $row['campus_photo'];
        $existingPhoto1 = $row['director_photo'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $director = $_POST['director'];
            $number = $_POST['number'];
            $email = $_POST['email'];
            $location = $_POST['location'];
            #=============================First Photo Update =============================================
            // Check if a new photo is uploaded
            if ($_FILES['campusphoto']['error'] === UPLOAD_ERR_OK) {
                $newPhotoName = $_FILES['campusphoto']['name'];
                $newPhotoTmpName = $_FILES['campusphoto']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination = 'campus/' . $newPhotoName;
                move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                $new_path = "includes/" . $newPhotoDestination;

                // Update the data into the database with the new photo
                $sql = "UPDATE campus SET name=?, director=?, number=?, email=?, location=?, campus_photo=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssi", $name, $director,$number,$email,$location,$new_path, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($existingPhoto);
                    
                    // Record updated successfully
                    $successMessage = "Campus updated successfully.";
                    header("Location: ../campus.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
                
            } else {
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE campus SET name=?, director=?, number=?, email=?, location=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $name, $director,$number,$email,$location, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "Campus updated successfully.";
                    header("Location: ../campus.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            }
            #================================End One Photo Update==========================================
            #=============================Second Photo Update =============================================
            // Check if a new photo is uploaded
            if ($_FILES['directorphoto']['error'] === UPLOAD_ERR_OK) {
                
                $newPhotoName1 = $_FILES['directorphoto']['name'];
                $newPhotoTmpName1 = $_FILES['directorphoto']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination1 = 'campus/' . $newPhotoName1;
                move_uploaded_file($newPhotoTmpName1, $newPhotoDestination1);
                $new_path1 = "includes/" . $newPhotoDestination1;

                // Update the data into the database with the new photo
                $sql = "UPDATE campus SET name=?, director=?, number=?, email=?, location=?,director_photo=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssi", $name, $director,$number,$email,$location,$new_path1, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($existingPhoto1);
                    
                    // Record updated successfully
                    $successMessage = "Campus updated successfully.";
                    header("Location: ../campus.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
                
            } else {
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE campus SET name=?, director=?, number=?, email=?, location=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $name, $director,$number,$email,$location, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "Campus updated successfully.";
                    header("Location: ../campus.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            }
            #================================End second Photo Update==========================================
            // Check if a new photo is uploaded
            if ($_FILES['campusphoto']['error'] === UPLOAD_ERR_OK && $_FILES['directorphoto']['error'] === UPLOAD_ERR_OK) {
                $newPhotoName = $_FILES['campusphoto']['name'];
                $newPhotoTmpName = $_FILES['campusphoto']['tmp_name'];
                
                $newPhotoName1 = $_FILES['directorphoto']['name'];
                $newPhotoTmpName1 = $_FILES['directorphoto']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination = 'campus/' . $newPhotoName;
                move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                $new_path = "includes/" . $newPhotoDestination;

                // Move the uploaded file to a desired location
                $newPhotoDestination1 = 'campus/' . $newPhotoName1;
                move_uploaded_file($newPhotoTmpName1, $newPhotoDestination1);
                $new_path1 = "includes/" . $newPhotoDestination1;

                // Update the data into the database with the new photo
                $sql = "UPDATE campus SET name=?, director=?, number=?, email=?, location=?, campus_photo=?,director_photo=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssssi", $name, $director,$number,$email,$location,$new_path,$new_path1, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($existingPhoto);
                    unlink($existingPhoto1);
                    
                    // Record updated successfully
                    $successMessage = "Campus updated successfully.";
                    header("Location: ../campus.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
                
            } else {
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE campus SET name=?, director=?, number=?, email=?, location=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $name, $director,$number,$email,$location, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "Campus updated successfully.";
                    header("Location: ../campus.php?status=success&message=" . urlencode($successMessage));
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
        <div class="modal fade" id="exampleModalCenterEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Campus</h5>
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
                                <label class="control-label">Campus Photo</label>
                                <div>
                                    <input type="file" class="form-control-file" name="campusphoto" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Director</label>
                                <div>
                                    <input type="text" class="form-control input-md" name="director" value="<?php echo $director; ?>">
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
                                    <input type="text" class="form-control input-md" name="number" value="<?php echo $number; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Campus Email</label>
                                <div>
                                    <input type="text" class="form-control input-md" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Location</label>
                                <div>
                                    <input type="text" class="form-control input-md" name="location" value="<?php echo $location; ?>">
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
        window.location.href = "../campus.php?status=success&message=";
    });
    // Add an event handler for the hidden.bs.modal event
    $('#exampleModalCenterEdit').on('hidden.bs.modal', function (e) {
        // Display the form or perform any action when modal is hidden
        window.location.href = "../campus.php?status=success&message=";
    });
</script>
</body>
</html>