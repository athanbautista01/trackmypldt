<?php
/*Connect to MySQL*/
require_once("database/connect.php");
/*include the header*/
$title="Peacesara | Resources";
include("include/header.php");
?>
<hr>
        
        <hr>
        
        <!-- Report Summary List -->
        <h1 align="middle">Report Summary</h1>

        <!-- /.Report 1 -->
        <div class="row">
        <?php
        if(isset($_GET['ID'])) {
    $reportid = $_GET['ID'];
                            //Build the query to use to fetch records
                            $query = "SELECT reportid, Date, Time, Description FROM reports where reportid=$reportid";

                            //Fetch records from MySQL
                            $result = $conn->query($query); 
                            if ($conn->error) {
                              die("Query failed: " . $conn->error);
                            }
                            //If there are records fetched, iterate through the data set
                            if ($result->num_rows) {    
                              while ($row = mysqli_fetch_assoc($result)) {
                            
                        ?>
            <div class="col-md-5">
                <h2>Service Downtime</h2>
                <h4>Date Submitted: <?php echo $row['Date'] . " " . $row['Time']?></h4>
                <p class="ab"><?php echo $row['Description'] ?></p>
            </div>
            <?php
                            }
                            } else {
                              echo "No article to show.";
                            }}
                            
                        ?>
        </div>

        <hr>


<hr>
<?php
//include the header
include("include/footer.php");
?>