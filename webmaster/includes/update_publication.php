<?php
    require_once 'config.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM publications WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $title = $row['title'];
        $photoFileName = $row['photo'];
        $documentFileName = $row['document'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $title = $_POST['title'];
            #=========================First photoes update====================================
            // Check if a new photo is uploaded
            if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $newPhotoName = $_FILES['photo']['name'];
                $newPhotoTmpName = $_FILES['photo']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination = 'publication/' . $newPhotoName;
                move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                $new_path = "includes/" . $newPhotoDestination;

                // Update the data into the database with the new photo
                $sql = "UPDATE publications SET name=?, title=?, photo=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $name, $title,$new_path, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($photoFileName);
                    
                    // Record updated successfully
                    $successMessage = "Publication updated successfully.";
                    header("Location: ../publication.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            } else {
            
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE publications SET name=?, title=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $name, $title, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "Publication Updated Successfully.";
                    header("Location: ../publication.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            }
            #=========================Second photo update===================================
            // Check if a new photo is uploaded
            if ($_FILES['document']['error'] === UPLOAD_ERR_OK) {
                
                $newDocumentName1 = $_FILES['document']['name'];
                $newDocumentTmpName1 = $_FILES['document']['tmp_name'];

                // Move the uploaded file to a desired location
                $newDocumentDestination1 = 'publication/' . $newDocumentName1;
                move_uploaded_file($newDocumentTmpName1, $newDocumentDestination1);
                $new_path1 = "includes/" . $newDocumentDestination1;

                // Update the data into the database with the new photo
                $sql = "UPDATE publications SET name=?, title=?, document=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $name, $title,$new_path1, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($documentFileName);
                    
                    // Record updated successfully
                    $successMessage = "Publication updated successfully.";
                    header("Location: ../publication.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            } else {
            
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE publications SET name=?, title=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $name, $title, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "Publication Updated Successfully.";
                    header("Location: ../publication.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            }
            #=========================Both photoes update====================================
            // Check if a new photo is uploaded
            if ($_FILES['photo']['error'] === UPLOAD_ERR_OK && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
                $newPhotoName = $_FILES['photo']['name'];
                $newPhotoTmpName = $_FILES['photo']['tmp_name'];
                
                $newDocumentName1 = $_FILES['document']['name'];
                $newDocumentTmpName1 = $_FILES['document']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination = 'publication/' . $newPhotoName;
                move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                $new_path = "includes/" . $newPhotoDestination;

                // Move the uploaded file to a desired location
                $newDocumentDestination1 = 'publication/' . $newDocumentName1;
                move_uploaded_file($newDocumentTmpName1, $newDocumentDestination1);
                $new_path1 = "includes/" . $newDocumentDestination1;

                // Update the data into the database with the new photo
                $sql = "UPDATE publications SET name=?, title=?, photo=?, document=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $name, $title,$new_path,$new_path1, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($photoFileName);
                    unlink($documentFileName);
                    
                    // Record updated successfully
                    $successMessage = "Publication updated successfully.";
                    header("Location: ../publication.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            } else {
            
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE publications SET name=?, title=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $name, $title, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "Publication Updated Successfully.";
                    header("Location: ../publication.php?status=success&message=" . urlencode($successMessage));
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
                <h5 class="modal-title" id="exampleModalLongTitle">Publication</h5>
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
                            <label class="control-label">Title</label>
                            <div>
                                <input type="text" class="form-control input-md" name="title" value="<?php echo $title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Photo</label>
                            <div>
                                <input type="file" class="form-control-file" name="photo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Document</label>
                            <div>
                                <input type="file" class="form-control-file" name="document">
                            </div>
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
        window.location.href = "../publication.php?status=success&message=";
    });
    // Add an event handler for the hidden.bs.modal event
    $('#exampleModalCenterEdit').on('hidden.bs.modal', function (e) {
        // Display the form or perform any action when modal is hidden
        window.location.href = "../publication.php?status=success&message=";
    });
</script>
</body>
</html>