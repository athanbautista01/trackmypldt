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
        <div class="panel-heading"><h4><b>Scheduled Maintenance/Downtime</b></h4></div>
        <div class="panel-body">
          <div class="col-lg-12 gg">
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
                <form action="updatemaintenance.php?ID=<?php echo $row['MaintenanceID'] ?>" method="post">
                  <div class="dizz thumbnail col-lg-12">
                    <h3>Title: </h3><input type="hidden" name="MaintenanceID" value="<?php echo $row["Title"] ?>">  
                    <input class="input form-control" type="text" name="Title" value="<?php echo $row["Title"] ?>"> <br>
                    <h3>Remarks: </h3><textarea class="input form-control" type="textbox" name="Remarks" rows="1">
                    <?php echo $row["Remarks"] ?>
                  </textarea><br>
                  <h3>Downtime Start Date: </h3><input class="input form-control" type="date" name="DowntimeStartDate" value="<?php echo $row["DowntimeStartDate"] ?>"> <br>
                  <h3>Downtime Start Time: </h3><input class="input form-control" type="time" name="DowntimeStartTime" value="<?php echo $row["DowntimeStartTime"] ?>">  <br>
                  <h3>Location: </h3><select class="input form-control" id="Location" name="Location">
                  <option value="<?php echo $row["Location"] ?>">Antipolo City</option>
                  <option value="Antipolo City">Antipolo City</option>
                  <option value="Bacoor City">Bacoor City</option>
                  <option value="Batangas City">Batangas City</option>
                  <option value="Cagayan de Oro">Cagayan de Oro</option>
                  <option value="Cavite City">Cavite City</option>
                  <option value="Davao City">Davao City</option>
                  <option value="Las Piñas City">Las Piñas City</option>
                  <option value="Makati City">Makati City</option>
                  <option value="Manila City">Manila City</option>
                  <option value="Caloocan City">Caloocan City</option>
                  <option value="Tarlac City">Tarlac City</option>
                  <option value="Quezon City">Quezon City</option>
                </select>         <br>
                <h3></h3><button class='btn btn-success' type='submit' name='refresh' title="Refresh><i class="fa fa-refresh"></i></button>
                <a href="updatemaintenance.php?ID1=<?php echo $row['MaintenanceID'] ?>" class="btn btn-danger" role="button" title="Delete"><i class="fa fa-trash-o" onclick="myFunction()"></i></a><br>
              </form>

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
