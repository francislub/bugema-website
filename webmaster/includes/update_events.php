<?php
    require_once 'config.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM event WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $description = $row['description'];
        $date = $row['date'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the form data
            $name = $_POST["title"];
            $description = $_POST["description"];
            $date = $_POST["date"];

            // Update the data into the database
            $sql = "UPDATE event SET name=?, description=?, date=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $description, $date, $id);

            if ($stmt->execute()) {
                // Record updated successfully
                $successMessage = "Event updated successfully.";
                header("Location: ../event.php?status=success&message=" . urlencode($successMessage));
                exit();
            } else {
                // Error updating data
                echo "Error updating data: " . $stmt->error;
            }
        }
    } else {
        // No record found for the given ID
        echo "No record found for ID: $id";
    }

    // Close the database connection
    //$conn->close();
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
                <h5 class="modal-title" id="exampleModalLongTitle">Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div>
                                <input type="text" class="form-control input-md" name="title" value="<?php echo $name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea name="description" cols="30" rows="10" class="form-control input-md" ><?php echo $description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <div>
                                <input type="date" class="form-control input-md" name="date" value="<?php echo $date; ?>">
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
        window.location.href = "../event.php?status=success&message=";
    });
    // Add an event handler for the hidden.bs.modal event
    $('#exampleModalCenterEdit').on('hidden.bs.modal', function (e) {
        // Display the form or perform any action when modal is hidden
        window.location.href = "../event.php?status=success&message=";
    });
</script>
</body>
</html>