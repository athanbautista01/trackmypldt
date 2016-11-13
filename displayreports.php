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

        <!-- /.Report 1 -->
        <div class="row">
            <div class="col-lg-12">
                        <div class="col-lg-3">
                            <ul class="list-group">
                                <li class="list-group-item active">Reports</li>
                                <li class="list-group-item"><a href="include/editprofile?ID=<?php echo $qid ?>">Service Downtime</a></li>
                                <li class="list-group-item"><a href="sellpet">Other Problem</a></li>
                                <li class="list-group-item"><a href="include/createBlog">Other Problem</a></li>
                                <li class="list-group-item"><a href="include/viewappointment">Other Problem</a></li>
                                <li class="list-group-item"><a href="account/cart">Other Problem</a></li>
                                <li class="list-group-item"><a href="account/wishlist">Other Problem</a></li>
                                <li class="list-group-item"><a href="account/pending">Other Problem</a></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                                <h1 align="left">Report Summary</h1>

            <?php

                            //Build the query to use to fetch records
                            $query = "SELECT reportid, Date, Time, Description FROM reports";

                            //Fetch records from MySQL
                            $result = $conn->query($query); 
                            if ($conn->error) {
                              die("Query failed: " . $conn->error);
                            }
                            //If there are records fetched, iterate through the data set
                            if ($result->num_rows) {    
                              while ($row = mysqli_fetch_assoc($result)) {
                            
                        ?>

            <div class="col-md-10" align="left">
                <h3><a href="reportSummaryDetails.php?ID=<?php echo $row['reportid'] ?>">Service Downtime / <?php echo $row['Date'] . " / " . $row['Time'] ?></a>
                </h3>
            </div>


                        <?php
                            }
                            } else {
                              echo "No article to show.";
                            }
                            
                        ?>
        </div>

        <hr>
</div>
<hr>

<hr>
<?php
//include the header
include("include/footer.php");
?>