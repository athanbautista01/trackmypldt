        <?php
            //Connect to MySQL
            //require_once("database/connect.php");
            //include the header
            $title="PLDT Home Fiber | Billing";
            include("include/header.php");
        ?>

          <!-- List of information wherein a user can see their billing details -->
          <div class="row">
            
            <h3 align="center">BILL SUMMARY</h3>

            <br>
            <script>
              function showUser(str) {
                if (str == "") {
                  document.getElementById("txtHint").innerHTML = "";
                  return;
                } else { 
                  if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET","getuser.php?q="+str,true);
          xmlhttp.send();
        }
      }
    </script>
            <center>
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
                    </h4>
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


              <div class="col-lg-2 col-md-1 col-sm-1 text-center"></div>
            </center>
      </div>

      <hr>





          <div class="cover-container">
            <div class="cover-container mastfoot">
              <div class="inner">
                <p>Copyright &copy; #PeaceHACK | <a href="#">Team Kinchana</a> 2016. All Rights Reserved</p>
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
