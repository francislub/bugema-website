<?php
    require_once 'config.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM slides WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $existingPhoto = $row['photo'];
        $title = $row['title'];
        $tagline = $row['tagline'];

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $tagline = $_POST['tagline'];

            // Check if a new photo is uploaded
            if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $newPhotoName = $_FILES['photo']['name'];
                $newPhotoTmpName = $_FILES['photo']['tmp_name'];

                // Move the uploaded file to a desired location
                $newPhotoDestination = 'slides/' . $newPhotoName;
                move_uploaded_file($newPhotoTmpName, $newPhotoDestination);
                $new_path = "includes/" . $newPhotoDestination;

                // Update the data into the database with the new photo
                $sql = "UPDATE slides SET photo=?, title=?, tagline=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $new_path, $title, $tagline, $id);
                
                if ($stmt->execute()) {
                    // Remove the old photo file
                    unlink($existingPhoto);
                    
                    // Record updated successfully
                    $successMessage = "Record updated successfully.";
                    header("Location: ../slide.php?status=success&message=" . urlencode($successMessage));
                } else {
                    // Error updating data
                    echo "Error updating data: " . $stmt->error;
                }
            } else {
                // No new photo uploaded, update the data without changing the photo
                $sql = "UPDATE slides SET title=?, tagline=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $title, $tagline, $id);
                
                if ($stmt->execute()) {
                    // Record updated successfully
                    $successMessage = "Record updated successfully.";
                    header("Location: ../slide.php?status=success&message=" . urlencode($successMessage));
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
    //$conn->close();
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
            <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 1050;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Slides</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="" enctype="multipart/form-data">
                           <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo" value="<?php echo $existingPhoto; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tagline" class="form-label">Tagline</label>
                                <input type="text" class="form-control" id="tagline" name="tagline" value="<?php echo $tagline; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
        window.location.href = "../slide.php?status=success&message=";
    });
    // Add an event handler for the hidden.bs.modal event
    $('#exampleModalCenterEdit').on('hidden.bs.modal', function (e) {
        // Display the form or perform any action when modal is hidden
        window.location.href = "../slide.php?status=success&message=";
    });
</script>
</body>
</html>



