        <?php
        //Connect to MySQL
        require_once("database/connect.php");
        //include the header
        $title="TrackMyPLDT | AddMaintenance";
        include("include/header.php");
        ?>
        <div class="panel-body">
         <div class="title">
          <h1>Internet Downtime History</h1>
        </div>
        <div class="container">
          <div class="dizz thumbnail col-lg-12">
            <table class="table table-bordered table-hover">
              <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Remarks</th>
                <th>Downtime Start Date</th>
                <th>Downtime Start Time</th>
                <th>Location</th>
                <th></th>
              </thead>
              <tbody class="row clearfix">
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

                      <tr >
                       <td>       

                        <?php echo "<h3>".$row["MaintenanceID"]."</h3>"; ?>
                      </td>
                      <td height="20%">
                        <input type="hidden" name="MaintenanceID" value="<?php echo $row["Title"] ?>">  
                        <input class="input form-control" type="text" name="Title" value="<?php echo $row["Title"] ?>"> 
                      </td>
                      <td>      
                        <textarea class="input form-control" type="textbox" name="Remarks" rows="1">
                          <?php echo $row["Remarks"] ?>
                        </textarea>
                      </td>
                      <td>      
                        <input class="input form-control" type="date" name="DowntimeStartDate" value="<?php echo $row["DowntimeStartDate"] ?>"> 
                      </td>
                      <td>     
                        <input class="input form-control" type="time" name="DowntimeStartTime" value="<?php echo $row["DowntimeStartTime"] ?>">  
                      </td>
                      <td>   
                        <select class="input form-control" id="Location" name="Location">
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
                        </select>                                                    
                      </td>

                      <td class="row">
                        <button class='btn btn-success' type='submit' name='refresh' title="Refresh><i class="fa fa-refresh"></i></button>
                        <a href="updatemaintenance.php?ID1=<?php echo $row['MaintenanceID'] ?>" class="btn btn-danger" role="button" title="Delete"><i class="fa fa-trash-o" onclick="myFunction()"></i></a>    
                      </td>
                    </tr>
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
          </tbody>
        </table>
      </div>
    </div>
    <br>

    <script>
      function myFunction() {
      confirm("Press a button!");
    }
  </script>


  <hr>
  <?php
        //include the header

  include("include/footer.php");
  ?>
