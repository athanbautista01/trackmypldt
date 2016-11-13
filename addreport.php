<?php
//Connect to MySQL
require_once("database/connect.php");
include("include/requireLogin.php");
$title="TrackMyPLDT | ";
include("include/header.php");

if (isset($_POST["submit"])) {               
        //process this block if submitted from the Add Student page
        $Date = $_POST["Date"];
        $Time = $_POST["Time"];
        $Description = $_POST["Description"];
        $qid = $_SESSION['userid'];
    
        //Build the query to use to insert the new record
        $query = "INSERT INTO reports (UserID, Date, Description, Time) VALUES ('$qid', '$Date', '$Description', '$Time')";

        //Insert new student into MySQL
        if ($conn->query($query) === TRUE) {
            $message = "Created user with id: " . $conn->insert_id;
        } else {
            die ("Insert failed: ". $conn->error);
        }
}
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
        <div class="panel-heading"><h4><b>View User Profile</b></h4></div>
        <div class="panel-body">
          <div class="col-lg-12">
<!-- Tab panes -->
                    <div class="tab-content">
                              <form id='AddReports' action='#' method='post' accept-charset='UTF-8' align="left">
                              <h1>Service Downtime</h1>
                            <br>     

                    <div class="form-group">
                        <label class="control-label col-lg-3" align="right">
                            Downtime Start Date</label>
                            <div class="col-lg-9">
                                <input class="input form-control" type="date" id="Date" name="Date" required />
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-lg-3" align="right">
                            Downtime Start Time</label>
                            <div class="col-lg-9">
                                <input class="input form-control" type="time" id="Time" name="Time" required />
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-lg-3" align="right">
                            Description</label>
                            <div class="col-lg-9">
                                <input class="input form-control" type="text" id="Description" name="Description" required />
                            </div>
                        </div>

                                <!--<input type="submit" name="submitlogin" class="btn" value="Sign in!" />-->

                                <div align = "right">
                                <br>
                                <button type="submit" name="submit" class="btn btn-default" >Submit</button>
                                </div>
                            </form>
                        </div>
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