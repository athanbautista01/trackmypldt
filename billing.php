<?php
//Connect to MySQL
require_once("database/connect.php");
include("include/requireLogin.php");
$title="TrackMyPLDT | Billing";
include("include/header.php");
?>
<hr>
<div class="row">
  <div class="col-lg-12">
    <div class="col-lg-3">
      <ul class="list-group">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['qtd'] == 2){
          $qid = $_SESSION['userid'];
          $qld = $_SESSION['qtd'];
          echo '
          <li class="list-group-item active">My Account</li>
          <li class="list-group-item"><a href="billing.php">Billing Statements</a></li>
          <li class="list-group-item"><a href="internet.php">Internet Downtime Reports</a></li>
          <li class="list-group-item"><a href="maintenance.php">Maintenance</a></li>
          <li class="list-group-item"><a href="include/logout.php">Logout</a></a></li>
          ';
        } elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['qtd'] == 1){
          echo '
          <li class="list-group-item active">My Account</li>
          <li class="list-group-item"><a href="Lusers.php">Users</a></li>
          /*<li class="list-group-item"><a href="billing.php">Billing Statements</a></li>*/
          <li class="list-group-item"><a href="Linternet.php">Internet Downtime Reports</a></li>
          <li class="list-group-item"><a href="Lmaintenance.php">Maintenance</a></li>
          <li class="list-group-item"><a href="include/logout.php">Logout</a></a></li>
          ';
        } else{
          ?>
          <script>
            alert('Incorrect username or password.');
            window.location.href='login.php';
          </script>
          <?php
        }
        ?>

      </ul>
    </div>
    <div class="col-lg-9">
      <div class="panel panel-danger"  align="left">
        <div class="panel-heading"><h4><b>BILLING SUMMARY</b></h4></div>
        <div class="panel-body">
          <div class="col-lg-12 text-center">
            <div class="thumbnail1">

              <p>Select Month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <select name="Month" onchange="showUser(this.value)">
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select> </p>
                <br>
                <div id="txtHint"><b>Billing Statement will be shown here.</b></div>
              </div>
              <form>
               <center>
                 <table style="width:40%" border="1">
                  <tr>
                   <td bgcolor="#eee"><b>Service Name:</b></td>
                   <td><b>Broadband / Landline</b></td>
                 </tr>
                 <tr>
                  <td bgcolor="#eee">Bill Period:</td>
                  <td>December, 2016</td>
                </tr>
                <tr>
                  <td bgcolor="#eee">Balance from Previous Bill:</td>
                  <td>P 1,295.00</td>
                </tr>
                <tr>
                  <td bgcolor="#eee">Status:</td>
                  <td>Paid</td>
                </tr>
                <tr>
                 <td bgcolor="#eee">Payment Due Date:</td>
                 <td>January 15, 2017</td>
               </tr>
               <tr>
                <td bgcolor="#eee">Amount Due:</td>
                <td>P 1170.00</td>
              </tr>
              <tr>
               <td bgcolor="#eee">Rebates (Internet Downtime):</td>
               <td>P 100.00</td>
             </tr>
             <tr>
              <td bgcolor="#eee">Period:</td>
              <td>11/12/16 - 11/19/16</td>
            </tr>
            <tr>
              <td bgcolor="#eee">Late Payment Fee:</td>
              <td>P 0.00</td>
            </tr>
            <tr>
              <td bgcolor="#eee">Value Added Tax:</td>
              <td>P 130.00</td>
            </tr>
            <tr>
             <td bgcolor="#eee"><b>Total Amount Due:</b></td>
             <td><b>P 1200.00</b></td>
           </tr>
         </table>
       </center>
     </form>
   </div>
 </div>
</div>
</div>
</div>
</div>
</div>       
</div>
<hr>
<?php
//include the header
include("include/footer.php");
?>