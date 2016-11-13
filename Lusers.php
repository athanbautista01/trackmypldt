<?php
//Connect to MySQL
require_once("database/connect.php");
include("include/requireLogin.php");
$title="TrackMyPLDT | ";
include("include/header.php");


?>
<hr>
<div class="panel-body">
         <div class="title">
          <h1>List of Users</h1>
        </div>

        <div class="container">
          <div class="dizz thumbnail col-lg-12">
            <table class="table table-bordered table-hover">
              <thead>
                <th>User ID</th>
                <th>User Type</th>
                <th>Account No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Suffix</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Password</th>
              </thead>
              <tbody class="row clearfix">
                <?php
                                //Build the query to use to fetch records
                $query = "SELECT users.UserID, usertype.UserType, users.AccountNo, users.FirstName, users.LastName, users.Suffix, users.Address, users.ContactNo, users.Email, users.Password FROM users INNER JOIN usertype on users.UserTypeID = usertype.UserTypeID";

                $result = $conn->query($query); 
                if ($conn->error) {
                  die("Query failed: " . $conn->error);
                }

                if ($result->num_rows) {    
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
             

                    <tr>
                      <td>      
                        <input class="input form-control" type="text" name="UserID" value="<?php echo $row["UserID"] ?>"> 
                      </td>
                      <td>
                        <input class="input form-control" type="text" name="UserType" value="<?php echo $row["UserType"] ?>">
                      </td>
                      <td>
                        <input class="input form-control" type="text" name="AccountNo" value="<?php echo $row["AccountNo"] ?>"> 
                      </td>
                      <td>
                        <input class="input form-control" type="text" name="FirstName" value="<?php echo $row["FirstName"] ?>"> 
                      </td>
                       <td>
                        <input class="input form-control" type="text" name="LastName" value="<?php echo $row["LastName"] ?>"> 
                      </td>
                       <td>
                        <input class="input form-control" type="text" name="Suffix" value="<?php echo $row["Suffix"] ?>"> 
                      </td>
                      <td>      
                        <textarea class="input form-control" type="textbox" name="Address" rows="1">
                          <?php echo $row["Address"] ?>
                        </textarea>
                      </td>
                       <td>
                        <input class="input form-control" type="number" name="ContactNo" value="<?php echo $row["ContactNo"] ?>"> 
                      </td>
                       <td>
                        <input class="input form-control" type="text" name="Email" value="<?php echo $row["Email"] ?>"> 
                      </td>
                       <td>
                        <input class="input form-control" type="text" name="Password" value="<?php echo $row["Password"] ?>"> 
                      </td>
                    </tr>
                  </form>

                  <?php
                }
              } else {
                echo "<tr>
                <td colspan='6'>
                  <h3 class='text-center'>THERE IS NO USER AVAILABLE</h3>
                  <br>
                  <a hre
                </td>
              </tr>";
            }
            ?>

          </tbody>
        </table>
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