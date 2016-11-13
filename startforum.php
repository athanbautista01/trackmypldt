        <?php
            //Connect to MySQL
            require_once("database/connect.php");
            //include the header
            $title="PLDT Home Fiber | Billing";
            include("include/header.php");

            if (isset($_POST["submit"])) {               
        //process this block if submitted from the Add Student page
              $Title = $_POST["Title"];
              $Description = $_POST["Description"];
              //$DateID = $_POST["DateID"];
              //$TimeID = $_POST["TimeID"];

        //Build the query to use to insert the new record
              //$query = "INSERT INTO forum (Title, Description, Date, Time) VALUES ('$Title', '$Description', '$Date',  '$Time')";
              $query = "INSERT INTO forum (Title, Description) VALUES ('$Title', '$Description')";

              if ($conn->query($query) === TRUE) {
                $message = "Created user with id: " . $conn->insert_id;
              } else {
                die ("Insert failed: ". $conn->error);
              }
            }

        ?>

          <div class="row">
            
            
<div align="center">
      <div style="width:50%">
        <h1>START A FORUM</h1>
        <hr>
        <table style="width:100%">
        <form id='Start-Forum' action='#' method='post' accept-charset='UTF-8'>
            <tr>
              <td>Title:  </td>
              <td><input class="form-control" type="text" name="Title"></td><br>
            </tr>
            <tr>
              <td>Description:  </td>
              <td>
                <textarea class="form-control" name="Description" cols="25" rows="3"></textarea>
              </td>
            </tr>

          </table>
          <button onclick="forum.php" type="submit" name="submit" class="btn btn-custom">Submit</button>

          <hr>

        </form>

          <div class="cover-container">
            <div class="cover-container mastfoot">
              <div class="inner">
                <p>Copyright &copy; #PLDT88HACK | <a href="#">Team Kinchana</a> 2016. All Rights Reserved</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
  </html>
