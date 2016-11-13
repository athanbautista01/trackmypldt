        <?php
        //Connect to MySQL
        require_once("database/connect.php");
        //include the header
        $title="Peacesara | Discussion Details";
        include("include/header.php");
        ?>
        <hr>
        <div class="container">
            <div class="col-lg-6">
                <?php
                /*$ID = $_GET['ID'];*/
                $query= "select DiscussionID, UserID, Title, Description, Image, Video, pro, con from discussion where DiscussionID=1";
                                        //Fetch records from MySQL
                $result = $conn->query($query); 
                if ($conn->error) {
                  die("Query failed: " . $conn->error);
              }
                                        //If there are records fetched, iterate through the data set
              if ($result->num_rows) {    
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <h2 class="dDesc"><?php echo $row['Title'] ?></h2>
                    <p class="dDesc"><?php echo $row['Description'] ?></p>
                    <br>
                    <img class="img-responsive" src="<?php echo $row['Image'] ?>">
                    <br><br>
                    <div class="col-lg-12">
                        <span class="badge"><?php echo $row['pro'] ?></span>&nbsp;<a class="btn btn-success" href="include/increment-count.php?CountID=PRO&DiscussionID=<?php echo $row['DiscussionID'] ?>" role="button">PRO</a> 
                        &nbsp;&nbsp;
                        <a class="btn btn-danger" href="include/increment-count.php?CountID=CON&DiscussionID=<?php echo $row['DiscussionID'] ?>" role="button">CON</a>&nbsp;<span class="badge"><?php echo $row['con'] ?></span>
                        <?php }} ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h2 class="bg-success">PRO</h2>
                    <form action="include/submitOpinion.php" method="post">
                        <textarea class="input form-control" rows="3" type="text" name="comment" required placeholder="Input opinion for this topic." class="input form-control"></textarea>
                        <input type="submit" name="submitPro" value="Submit" class="btn btn-default" />
                        <a class="btn btn-default" href="index.php">Cancel</a>
                    </form>
                    <hr>
                    <div class="gg">
                    <?php
                $query= "SELECT u.Firstname, u.LastName, u.Image, c.Comment, c.DateAdded FROM User u INNER JOIN Discussion d ON u.UserID = d.UserID INNER JOIN Comment c ON u.UserID = c.UserID WHERE d.DiscussionID = '1' AND c.ComTypeID=1 ORDER BY c.DateAdded DESC";
                                        //Fetch records from MySQL
                $result = $conn->query($query); 
                if ($conn->error) {
                  die("Query failed: " . $conn->error);
              }
                                        //If there are records fetched, iterate through the data set
              if ($result->num_rows) {    
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-lg-12">
                            <img alt="User Image" height="50px" src="<?php echo $row['Image'] ?>">
                            <small><?php echo $row['Firstname'] ?> <?php echo $row['LastName'] ?></small><br><br>
                            <p>"<?php echo $row['Comment'] ?>"</p>
                            <small><?php echo $row['DateAdded'] ?></small>
                            <hr>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <h2 class="bg-danger">CON</h2>
                    <form action="include/submitOpinion.php" method="post">
                        <textarea class="input form-control" rows="3" type="text" name="comment" required placeholder="Input opinion for this topic." class="input form-control"></textarea>
                        <input type="submit" name="submitCon" value="Submit" class="btn btn-default" />
                        <a class="btn btn-default" href="index.php">Cancel</a>
                    </form>
                    <hr>
                    <div class="gg">
                    <?php
                $query= "SELECT a.Firstname, a.LastName, a.Image, b.Comment, b.DateAdded FROM User a INNER JOIN Discussion f ON a.UserID = f.UserID INNER JOIN Comment b ON a.UserID = b.UserID WHERE f.DiscussionID = '1' AND b.ComTypeID = 2 ORDER BY b.DateAdded DESC";
                                        //Fetch records from MySQL
                $result = $conn->query($query); 
                if ($conn->error) {
                  die("Query failed: " . $conn->error);
              }
                                        //If there are records fetched, iterate through the data set
              if ($result->num_rows) {    
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-lg-12">
                            <img alt="User Image" height="50px" src="<?php echo $row['Image'] ?>">
                            <small><?php echo $row['Firstname'] ?> <?php echo $row['LastName'] ?></small><br><br>
                            <p>"<?php echo $row['Comment'] ?>"</p>
                            <small><?php echo $row['DateAdded'] ?></small>
                            <hr>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                
            </div>
            <hr>
            <?php
        //include the header
            include("include/footer.php");
            ?>