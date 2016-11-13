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
          <li class="list-group-item"><a href="Dmaintenance.php">Maintenance</a></li>
          <li class="list-group-item"><a href="include/logout.php">Logout</a></a></li>
          ';
        } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['qtd'] == 1){
          echo '
          <li class="list-group-item active">My Account</li>
          <li class="list-group-item"><a href="Lusers.php">Users</a></li>
          /*<li class="list-group-item"><a href="billing.php">Billing Statements</a></li>*/
          <li class="list-group-item"><a href="Linternet.php">Internet Downtime Reports</a></li>
          <li class="list-group-item"><a href="maintenance.php">Maintenance</a></li>
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
        <div class="panel-heading"><h4><b>Scheduled Maintenance/Downtime</b></h4></div>
        <div class="panel-body">
          <div class="col-lg-12 gg">
          <form action="updatemaintenance.php?ID=<?php echo $row['MaintenanceID'] ?>" method="post">
            <?php
                                //Build the query to use to fetch records
            $query = "SELECT MaintenanceID, Title, Remarks, DowntimeStartDate, DowntimeStartTime, Location FROM maintenance";


                                //Fetch records from MySQL
            $result = $conn->query($query); 
            if ($conn->error) {
              die("Query failed: " . $conn->error);
            }


                                //If there are records fetched, iterate through the data set
            if ($result->num_rows) {    
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                
                  <div class="dizz thumbnail col-lg-12">
                    <h3>Title: <?php echo $row["Title"] ?></h3><br>
                    <h3>Remarks: <?php echo $row["Remarks"] ?></h3><br>
                  <h3>Downtime Start Date: <?php echo $row["DowntimeStartDate"] ?></h3><br>
                  <h3>Downtime Start Time: <?php echo $row["DowntimeStartTime"] ?></h3><br>
                  <h3>Location: <?php echo $row["Location"] ?></h3><br>
              </form>
              </div>
              <?php
            }
          } else {
            echo "<tr>
            <td colspan='6'>
              <h3 class='text-center'>YOUR HISTROY IS EMPTY</h3>
              <br>
              <a hre
            </td>
          </tr>";
        }
        ?>
        </div>
    </div>
  </div>
</div>
<hr>
<?php
//include the header
include("include/footer.php");
?>
