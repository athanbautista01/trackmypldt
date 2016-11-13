<?php
        require_once("database/connect.php");
        $userid = isset($_SESSION['userid']) ? $_SESSION['userid']: null;
        if($userid == null){
            ?>
            <script>
                alert('You need to sign in first! Thank you.');
                window.location.href='login.php';
            </script>
            <?php
        }
?>