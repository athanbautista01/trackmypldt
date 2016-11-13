        <?php
            //Connect to MySQL
            require_once("database/connect.php");
            //include the header
            $title="PLDT Home Fiber | Billing";
            include("include/header.php");
        ?>

        <section>
            <div class="container">

                <div class="col-lg-12 heading text-center">
                    <h2>FORUM</h2>
                </div>
                <div class="col-lg-12" align="left">
                        <?php
                            //Build the query to use to fetch records
                            $query = "SELECT forum.forumID, forum.Title, forum.Description, users.FirstName, users.LastName 
                            FROM users INNER JOIN forum ON forum.UserID = users.UserID"; 
                            
                            //Fetch records from MySQL
                            $result = $conn->query($query); 
                            if ($conn->error) {
                              die("Query failed: " . $conn->error);
                            }
                            //If there are records fetched, iterate through the data set
                            if ($result->num_rows) {    
                              while ($row = mysqli_fetch_assoc($result)) {
                            
                        ?>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <br>
                            <div class="z text-center">
                                <a href="forumdetails.php?ID=<?php echo $row['forumID'] ?>">
                                <h5><?php echo $row['Title'] ?></h5>
                                <h5><?php echo $row['Description'] ?></h5>
                                <p>By <b><?php echo $row['FirstName'] ?> <?php echo $row['LastName'] ?> </b>
                                </p></a>
                            </div>
                            <br>
                        </div>
                        <?php
                            }
                            } else {
                              echo "No forum to show.";
                            }
                            
                        ?>
                </div>
            </div>
        </section>

        <?php
            include("include/footer.php");
        ?>
