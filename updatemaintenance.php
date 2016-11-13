        <?php
        //Connect to MySQL
        require_once("database/connect.php");
        //include the header
        $title="TrackMyPLDT | AddMaintenance";
        include("include/header.php");

    
    if(isset($_GET['ID'])) {
    $MaintenanceID = $_GET['ID'];
    $Title = $_POST["Title"];
        $Remarks = $_POST["Remarks"];
        $DowntimeStartDate = $_POST["DowntimeStartDate"];
        $DowntimeStartTime = $_POST["DowntimeStartTime"];
        $Location = $_POST["Location"];

    
    $query = "UPDATE maintenance set Title='$Title', Remarks='$Remarks', DowntimeStartDate='$DowntimeStartDate', DowntimeStartTime='$DowntimeStartTime', Location='$Location', DateModified='now()' where MaintenanceID='$MaintenanceID'";
    
        //Insert new student into MySQL
        if ($conn->query($query) === TRUE) {
?>
<script>
    //alert('Successfully Deleted!.');
    window.location.href='maintenance.php';
</script>
<?php
    } else {
?>
<script>
    alert('Error while updating incart pet/pet supplies.');
    window.location.href='maintenance.php';
</script>
        <?php
        }}elseif(isset($_GET['ID1'])) {
    $MaintenanceID = $_GET['ID1'];
    
    $query = "DELETE FROM maintenance WHERE MaintenanceID='$MaintenanceID'";
    
        //Insert new student into MySQL
        if ($conn->query($query) === TRUE) {
?>
<script>
    alert('Successfully Deleted!.');
    window.location.href='maintenance.php';
</script>
<?php
    } else {
?>
<script>
    alert('Error while deleting scheduled maintenance.');
    window.location.href='maintenance.php';
</script>
<?php
        }
    } 
        ?>