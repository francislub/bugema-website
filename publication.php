<?php
    require_once 'header.php';
    require_once 'navbar.php';
?>
<br><br><br><br><br>
    <div class="container-fluid bg-primary page-head">
    <div class="container">
    </div>
    </div>
    <section id="mu-about-us">
        <div class="container">
        <div class="card shadow mb-4 mt-2">
    
    <div class="card-header py-3" style="padding:.75rem 1.25rem; margin-bottom:0; background-color:#f8f9fc; border-bottom:1px solid #e3e6f0; border-radius:calc(.35rem - 1px) calc(.35rem - 1px) 0 0;">
        <h4 class="m-0 font-weight-bold">Publications</h4>
        
    </div>
    <div class="card-body" style="flex:1 1 auto; min-height:1px; padding:1.25rem;">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once 'includes/config.php';

                    // Assuming you have established a database connection and stored it in the $conn variable

                    // Retrieve data from the "program" table
                    $sql = "SELECT * FROM publications";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Iterate over the rows and generate table rows dynamically
                        while ($row = $result->fetch_assoc()) {
                            $name = $row["name"];
                            $title = $row["title"];
                            $document = $row["document"];
                            $photo = $row["photo"];

                            echo '<tr>';
                            echo '<td><img src="webmaster/' . $photo . '" alt="Photo" style="max-width: 150px; height: auto;"></td>';
                            echo '<td>' . $name . '</td>';
                            echo '<td>' . $title. '</td>';
                            
                            echo "<td>"; 
                            echo "<a href='webmaster/" . $row["document"] . "' target='_blank'><button class='btn btn-success'><i class='fa fa-download'></i> Download</button></a>";
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
      </section>
<?php
    require_once 'footer.php';
?>