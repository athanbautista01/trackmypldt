<?php
//Connect to MySQL
require_once("database/connect.php");
include("include/requireLogin.php");
$title="TrackMyPLDT | ";
include("include/header.php");


?>
<hr>
<div class="row">
  <div class="col-lg-12">
    <div class="col-lg-3">
      <ul class="list-group">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['qtd'] == 2){
          $qid = $_SESSION['userid'];
          $qld = $_SESSION['qtd'];
          echo '
          <li class="list-group-item active">My Account</li>
          <li class="list-group-item"><a href="billing.php">Billing Statements</a></li>
          <li class="list-group-item"><a href="internet.php">Internet Downtime Reports</a></li>
          <li class="list-group-item"><a href="maintenance.php">Maintenance</a></li>
          <li class="list-group-item"><a href="include/logout.php">Logout</a></a></li>
          ';
        } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['qtd'] == 1){
          echo '
          <li class="list-group-item active">My Account</li>
          <li class="list-group-item"><a href="Lusers.php">Users</a></li>
          /*<li class="list-group-item"><a href="billing.php">Billing Statements</a></li>*/
          <li class="list-group-item"><a href="Linternet.php">Internet Downtime Reports</a></li>
          <li class="list-group-item"><a href="Lmaintenance.php">Maintenance</a></li>
          <li class="list-group-item"><a href="include/logout.php">Logout</a></a></li>
          ';
        } else{
          ?>
          <script>
            alert('Incorrect username or password.');
            window.location.href='login.php';
          </script>
          <?php
        }
        ?>

      </ul>
    </div>
    <div class="col-lg-9">
      <div class="panel panel-danger"  align="left">
        <div class="panel-heading"><h4><b>Detailed Internet Downtime Report</b></h4></div>
        <div class="panel-body">
          <div class="col-lg-12">
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
                <h2>Service Downtime</h2>
                <h4>Date Submitted: <?php echo $row['Date'] . " " . $row['Time']?></h4>
                <p class="ab"><?php echo $row['Description'] ?></p>
            <?php
                            }
                            } else {
                              echo "No article to show.";
                            }}
                            
                        ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>       
</div>
<hr>
<?php
//include the header
include("include/footer.php");
?>