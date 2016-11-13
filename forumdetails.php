        <?php
            /*Connect to MySQL*/
            require_once("database/connect.php");
            //include the header
            $title="PLDT Home Fiber | Billing";
            include("include/header.php");
        ?>
        
              <h1 align="center">FORUMS</h1>
              <hr>

              <div class="col-lg-6">

                <div align="left">
             </div>
                  <?php
                            //Build the query to use to fetch records
                            $query = "SELECT forum.ForumID, forum.UserID, forum.Title, forum.Description, comment.CommentID, comment.UserID 
                            FROM comment INNER JOIN forum ON forum.UserID = comment.UserID"; 
                            
                            //Fetch records from MySQL
                            $result = $conn->query($query); 
                            if ($conn->error) {
                              die("Query failed: " . $conn->error);
                            }
                            //If there are records fetched, iterate through the data set
                            if ($result->num_rows) {    
                              while ($row = mysqli_fetch_assoc($result)) {
                            
                        ?>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                  <br>
                  <div class="z text-center">
                    <a href="include/blogpost.php?ID=<?php echo $row['ForumID'] ?>">
                      <h3><?php echo $row['Title'] ?></h3>
                      <h5><?php echo $row['CommentID'] ?></h5>
                     
                      </p></a>
                    </div>
                    <br>
                  </div>

              <hr>

<?php
}}
            include("include/footer.php");
        ?>

  </html>
