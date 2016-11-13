<?php
//Connect to MySQL
require_once("database/connect.php");
//include the header
$title="Peacesara | Discussion Details";
include("include/header.php");
?>
<hr>
<section>
    <div class="container">

        <div class="col-lg-12 heading text-center">
            <h2>LIST OF DISCUSSION</h2>
        </div>
        <div class="col-lg-12">
            <?php
                                //Build the query to use to fetch records
            $query = "SELECT DiscussionID, UserID, Title, Description, Image, DateAdded 
            FROM discussion";

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

                    <div class="col-md-8">
                     <center><img class="img-responsive" src="<?php echo $row['Image'] ?>" alt="" height="300"
                         width="700"></center>
                     </div>

                     <div class="col-md-4">
                         <a href="discussion-details.php?ID=<?php echo $row['DiscussionID'] ?>"><h5><b>Title: </b><?php echo $row['Title'] ?></h5></a>
                         <p class="desc"><b>Description: </b><?php echo $row['Description'] ?></p>
                     </div>
                     <?php
                 }
             } else {
              echo "No discussion to show.";
          }
          
          ?>
          <div class="col-lg-12">
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</section>

<hr>
<?php
//include the header
include("include/footer.php");
?>