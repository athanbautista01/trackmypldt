        <?php
        //Connect to MySQL
        require_once("database/connect.php");
        //include the header
        $title="Peacesara | Login";
        include("include/header.php");

        $quser = "";
$qpassword = "";
$panelColor = "";
if (isset($_POST["submitlogin"])) { 
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query="SELECT `UserID`, `UserTypeID`, `AccountNo`, `FirstName`, `MiddleName`, `LastName`, `Suffix`, `Birthdate`, `Address`, `ContactNo`, `Email`, `Password`, `DateAdded`, `DateModified` FROM `users` WHERE Email='$email' && Password='$password'";
    
    //Execute query
    $result = $conn->query($query);     //result set is returned in an associative array
    
    if ($result->num_rows) {        
      while ($row = mysqli_fetch_assoc($result)) {
         $qid = $row['UserID'];
         $qtd = $row['UserTypeID'];
         $quser = $row['Email'];
         $qpassword = $row['Password'];
     }
 }
 
 
 if ($_POST['email'] == $quser && 
    $_POST['password'] == $qpassword) {
    $_SESSION['loggedin'] = true;
$_SESSION['timeout'] = time();
$_SESSION['email'] = $quser;

$userQuery = "select userid, lastname, firstname from users where userid='$qid'";

    //Execute query
    $result = $conn->query($userQuery);     //result set is returned in an associative array
    if ($result->num_rows) {
        while ($row = mysqli_fetch_assoc($result)) {  
            $qfirstname = $row['firstname'];
            $qlastname = $row['lastname'];
            $userid = $row['userid'];
        }
    }
    
    $_SESSION['displayName'] = $qfirstname." ".$qlastname;
    $_SESSION['firstName'] = $qfirstname;
    $_SESSION['lastName'] = $qlastname;
    $_SESSION['userid'] = $userid;
    $_SESSION['qtd'] = $qtd;

    if($qtd == '1'){
        ?>
        <script>
            window.location.href='profile.php';
        </script>
        <?php
    }elseif($qtd == '2'){
        ?>
        <script>
            window.location.href='profile.php';
        </script>
        <?php
    }elseif($qtd != '1'|| $qtd != '2') {
        session_destroy();
        ?>
        <script>
            alert('Invalid email/password.');
            window.location.href='login.php';
        </script>
        <?php
    }
}else {
    session_destroy();
    ?>
    <script>
        alert('Incorrect email address or password.');
        window.location.href='login.php';
    </script>
    <?php
}
}
?>
<hr>
<div class="container">
    <center>
        <div class="dizz thumbnail col-md-4 col-md-offset-4">
            <!-- Nav tabs -->
            <h1>LOGIN</h1>
            <!-- <form role="form" action="include/process-login.php" method="post" class="login-form"> -->
            <form role="form" action="" name="registerForm" id="registerForm" method="post" class="registration-form">
                <br>
            <div class="form-group">
                <label class="sr-only" form="email">Email</label>
                <input type="text" name="email" placeholder="Email" class="form-username form-control" id="form-email" required>
            </div>
            <div class="form-group">
                <label class="sr-only" form="password">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password" required>
            </div>
            <!--<input type="submit" name="submitlogin" class="btn" value="Sign in!" />-->
            <button type="submit" name="submitlogin" class="btn btn-default">Sign in!</button>
        </form>
    </div>
</center>
</div>
<hr>
<?php
        //include the header
include("include/footer.php");
?>