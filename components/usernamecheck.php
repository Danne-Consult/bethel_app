<?php

    require '../manager/config/_database/database.php';
    $username=$_GET['username'];

    $sql="SELECT shortname FROM ".$prefix."user WHERE shortname LIKE '$username'";
    $result =  $conn->query($sql);
    $rws = mysqli_num_rows($result);
    if($rws>0){
        echo "1";
    }else{
        echo "0";
    };

    $conn->close();
