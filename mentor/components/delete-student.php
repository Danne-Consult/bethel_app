<?php
    session_start();
    if(isset($_GET['user'])) {
        require '../../manager/config/_database/database.php';
        $registrarid= $_SESSION['userid'];
        
        $sql1="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode='$registrarid'";
        $result1 =  $conn->query($sql1);
        $rws1 =  $result1->fetch_array();

        $usercodex = $_GET['user'];
        $sql="Delete FROM ".$prefix."user WHERE usercode='$usercodex' AND mentor='$rws1[0]'";

        if($conn->query($sql)){
            header("location: ../viewstudents?success=Student deleted!");
        }else{
            header("location: ../viewstudents.php?&error=Unable to delete student. Please contact the administrator");
        }
    }