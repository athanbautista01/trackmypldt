<?php
    
    session_start();
    $host = "localhost";
    $user = "pldt";
    $password = "trackmypldt";
    $database = "trackmypldt";

    /*$host = "ap-cdbr-azure-southeast-b.cloudapp.net";
    $user = "bebc90aabc7f02";
    $password = "3e901204";
    $database = "trackmypldt";*/
    //Connect to MySQL
    $conn = new mysqli($host, $user, $password, $database);
    // Check connection
    if ($conn->connect_error) {
?>
        <script>
        //die("Connection failed: " . $conn->connect_error);
        alert('Error while connecting to database, sorry for inconvenience. Thank You!');
    </script>
<?php
    }
?>