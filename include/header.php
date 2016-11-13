<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>PLDT</title>

  <!-- Bootstrap -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom css -->
  <link href="assets/custom/css/style.css" rel="stylesheet">
  <!-- Fonts -->
  <link href="font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400;300' rel='stylesheet' type='text/css'>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <!-- Custom js -->
  <script src="assets/custom/js/custom.js"></script>
</head>
<body>
  <div class="site-wrapper" id="main">

    <div class="site-wrapper-inner">

      <div class="container">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
            <a href="index.php">
              <h2 class="masthead-brand"><img height="70px" src="img/pldt.png">&nbsp;TrackMyPLDT</h2>
              </a>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="index.php">HOME</a></li>
                  <li><a href="forums.php">FORUMS</a></li>
                  <li><a href="about.php">ABOUT US</a></li>
                  <?php
                   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                  $qid = $_SESSION['userid'];
                  $qld = $_SESSION['qtd'];
                  $name = $_SESSION['firstName'];
                    echo "<li><a href='profile.php'>$name</a></li>";
                  } else {
                    echo "<li><a href='login.php'>LOGIN</a></li>";
                  }
                  ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>