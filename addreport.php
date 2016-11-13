        <?php
        //Connect to MySQL
        require_once("database/connect.php");
        //include the header
        $title="TrackMyPLDT | AddReports";
        include("include/header.php");



        if (isset($_POST["submit"])) {               
        //process this block if submitted from the Add Student page
        $Date = $_POST["Date"];
        $Time = $_POST["Time"];
        $Description = $_POST["Description"];
    
        //Build the query to use to insert the new record
        $query = "INSERT INTO reports (Date, Description, Time) VALUES ('$Date', '$Description', '$Time')";

        //Insert new student into MySQL
        if ($conn->query($query) === TRUE) {
            $message = "Created user with id: " . $conn->insert_id;
        } else {
            die ("Insert failed: ". $conn->error);
        }
}

        ?>

        <hr>
        <div class="container">
                <div class="dizz thumbnail col-lg-9">

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
        <hr>
        <?php
        //include the header

        include("include/footer.php");
        ?>
