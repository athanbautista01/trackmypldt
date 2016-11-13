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
    <div class="carousel-inner" role="listbox" align="center">
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

<hr>
<?php
    //include the footer
include("include/footer.php");
?>
</div>