<?php
//Connect to MySQL
require_once("database/connect.php");
include("include/requireLogin.php");
$title="TrackMyPLDT | Profile";
include("include/header.php");
?>
<hr>
<?php
            //Build the query to use to fetch records
$qid = $_SESSION['userid'];
$qld = $_SESSION['qtd'];
$query="SELECT `UserID`, `UserTypeID`, `AccountNo`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `Birthdate`, `Address`, `ContactNo`, `Email` FROM `users` WHERE UserID=$qid";
                    //Fetch records from MySQL
$result = $conn->query($query); 
if ($conn->error) {
  die("Query failed: " . $conn->error);
}
                    //If there are records fetched, iterate through the data set
if ($result->num_rows) {    
  while ($row = mysqli_fetch_assoc($result)) { 
    ?>
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
                      <li class="list-group-item"><a href="include/billing.php">Billing Statements</a></li>
                      <li class="list-group-item"><a href="include/internet.php">Internet Downtime Reports</a></li>
                      <li class="list-group-item"><a href="maintenance.php">Maintenance</a></li>
                      <li class="list-group-item"><a href="include/logout.php">Logout</a></a></li>
                      ';
                  } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['qtd'] == 1){
                    echo '
                    <li class="list-group-item active">My Account</li>
                    <li class="list-group-item"><a href="include/users.php">Users</a></li>
                    <li class="list-group-item"><a href="include/Lbilling.php">Billing Statements</a></li>
                    <li class="list-group-item"><a href="include/Linternet.php">Internet Downtime Reports</a></li>
                    <li class="list-group-item"><a href="include/Lmaintenance.php">Maintenance</a></li>
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
                        <h2><?php echo $row['FirstName'] ?> <?php echo $row['LastName'] ?></h2>
                        <h3>Account No: <?php echo $row['AccountNo'] ?></h3>
                        <h3>Email: <?php echo $row['Email'] ?></h3>
                        <h3>Birthdate: <?php echo $row['Birthdate'] ?></h3>
                        <h3>Address: <?php echo $row['Address'] ?></h3>
                        <h3>Contact: <?php echo $row['ContactNo'] ?></h3>
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
}}
//include the header
include("include/footer.php");
?>