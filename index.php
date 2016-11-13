<?php
	//Connect to MySQL
require_once("database/connect.php");
	//include the header
$title="Peacesara | Homepage";
include("include/header.php");
?>
<hr>
<div class="col-lg-12">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/p1.jpg" alt="...">
      </div>
      <div class="item">
        <img src="img/p2.jpg" alt="...">
      </div>
      <div class="item">
        <img src="img/p3.jpg" alt="...">
      </div>
    </div>
  </div>
</div>
<div class="col-lg-6">
	<hr>
	<a class="btn btn-default" href="discussion-new.php" role="button">Start Discussion</a>
	<hr>
  <h2><a href="discussion.php">Ongoing Discussions</a></h2>
  <div class="thumbnail" style="height: 190px">
    <div class="col-lg-4">
      <br>
      <div class="z text-center">
        <img height="115px" width= "125px" src="img/debate1.jpg" alt="Image">
      </div>
      <br>
    </div>
    <div class="col-lg-8">
      <div class="z text-center">
        <h3><a href="#">War and Peace: "Sometimes violence is needed to bring peace.” Do you agree with this?</a></h3>
      </div>
    </div>
  </div> 
  <div class="thumbnail" style="height: 190px">
    <div class="col-lg-4">
      <br>
      <div class="z text-center">
        <img height="115px" width= "125px" src="img/debate1.jpg" alt="Image">
      </div>
      <br>
    </div>
    <div class="col-lg-8">
      <div class="z text-center">
        <h3><a href="#">War and Peace: "Sometimes violence is needed to bring peace.” Do you agree with this?</a></h3>
      </div>
    </div>
  </div> 
  <div class="thumbnail" style="height: 190px">
    <div class="col-lg-4">
      <br>
      <div class="z text-center">
        <img height="115px" width= "125px" src="img/debate1.jpg" alt="Image">
      </div>
      <br>
    </div>
    <div class="col-lg-8">
      <div class="z text-center">
        <h3><a href="#">War and Peace: "Sometimes violence is needed to bring peace.” Do you agree with this?</a></h3>
      </div>
    </div>
  </div> 
</div>
<div class="col-lg-6">
	<hr>
	<a class="btn btn-default" href="events-action.php" role="button">Take Action</a>
	<hr>
  <h2><a href="events.php">Events</a></h2>
  <?php
  //Build the query to use to fetch records
  $query = "SELECT event.EventID, event.EventImage, event.EventTitle, event.EventDate, event.EventDesc
  FROM event LIMIT 3"; 

  //Fetch records from MySQL
  $result = $conn->query($query); 
  if ($conn->error) {
    die("Query failed: " . $conn->error);
  }
  //If there are records fetched, iterate through the data set
  if ($result->num_rows) {    
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="thumbnail" style="height: 190px">
        <div class="col-lg-4">
          <br>
          <div class="z text-center">
            <img height="115px" width= "125px" src="<?php echo $row['EventImage'] ?>" alt="Image">
          </div>
          <br>
        </div>
        <div class="col-lg-8">
          <div class="z text-center">
            <h3><a href="events.php"><?php echo $row['EventTitle'] ?></a></h3>
            <h5><?php echo $row['EventDesc'] ?></h5>
          </div>
        </div>
      </div>        
      <?php
    }
  } else {
    echo "No event to show.";
  }

  ?>
</div>
</div>
<hr>
<?php
    //include the footer
include("include/footer.php");
?>