        <?php
        //Connect to MySQL
        require_once("database/connect.php");
        //include the header
        $title="TrackMyPLDT | AddMaintenance";
        include("include/header.php");

        if (isset($_POST["submit"])) {               //process this block if submitted from the Add Student page
        $Title = $_POST["Title"];
        $Remarks = $_POST["Remarks"];
        $DowntimeStartDate = $_POST["DowntimeStartDate"];
        $DowntimeStartTime = $_POST["DowntimeStartTime"];
        $Location = $_POST["Location"];    

        //Build the query to use to insert the new record
        $query = "INSERT INTO maintenance (Title, Remarks, DowntimeStartDate, DowntimeStartTime, Location, DateAdded) VALUES ('$Title', '$Remarks', '$DowntimeStartDate', 
        '$DowntimeStartTime', '$Location', NOW())";

        //Insert new student into MySQL
        if ($conn->query($query) === TRUE) {
            $message = "Created user with id: " . $conn->insert_id;
        } else {
            die ("Insert failed: ". $conn->error);
        }
    }

        ?>

        <hr>
        <div class="title">
                    <h1>Add Maintenance</h1>
                </div>
        <div class="container">
                <div class="dizz thumbnail col-lg-9">

                    <!-- Tab panes -->
                    <div class="tab-content">
                              <form id='AddMaintenance' action='#' method='post' accept-charset='UTF-8' align="left">
                            <br>       

                    <div class="form-group">
                        <label class="control-label col-lg-3" align="right">
                            Title</label>
                            <div class="col-lg-9">
                                <input class="input form-control" type="text" id="Title" name="Title" required />
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3" align="right">
                            Remarks</label>
                            <div class="col-lg-9">
                                <input class="input form-control" type="text" id="Remarks" name="Remarks" required />
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3" align="right">
                          Downtime Start Date</label>
                            <div class="col-lg-9">
                                <input class="input form-control" type="date" id="DowntimeStartDate" name="DowntimeStartDate" required />
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-lg-3" align="right">
                           Downtime Start Time</label>
                            <div class="col-lg-9">
                                <input class="input form-control" type="time" id="DowntimeStartTime" name="DowntimeStartTime" required />
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-lg-3" align="right">
                            Location</label>
                            <div class="col-lg-9">
                                <select class="input form-control" id="Location" name="Location">
                                     <option value="City"></option>
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
        
        
        <hr>
        <?php
        //include the header

        include("include/footer.php");
        ?>
</div>