<?php
    session_start();
    if(isset($_GET['schoolid'])) {
        require '../../manager/config/_database/database.php';
        $registrarid= $_SESSION['userid'];
        
        $sql1="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode='$registrarid'";
        $result1 =  $conn->query($sql1);
        $rws1 =  $result1->fetch_array();

        $schoolcode = $_GET['schoolid'];
        $sql="Delete FROM ".$prefix."schools WHERE id='$schoolcode' AND enterby='$rws1[0]'";

        if($conn->query($sql)){
            header("location: ../viewschools.php?success=Student deleted!");
        }else{
            header("location: ../viewschools.php?&error=Unable to delete student. Please contact the administrator");
        }
    }