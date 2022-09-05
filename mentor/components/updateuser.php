<?php
    session_start();
    if(isset($_POST['updatestudent'])) {

        require '../../manager/config/_database/database.php';
        date_default_timezone_set("Africa/Nairobi");
        $currdatetime= date("y-m-d h:i:s");
		
        $usercode=mysqli_real_escape_string($conn,$_POST['usercode']);
        $namex=mysqli_real_escape_string($conn,$_POST['namex']);
        $emailx=mysqli_real_escape_string($conn,$_POST['emailx']);
        $genderx=mysqli_real_escape_string($conn,$_POST['genderx']);
        $datebirthx=mysqli_real_escape_string($conn,$_POST['datebirthx']);
        $countyx=mysqli_real_escape_string($conn,$_POST['countyx']);
        $inschoolx=mysqli_real_escape_string($conn,$_POST['inschoolx']);
        $edulevel=mysqli_real_escape_string($conn,$_POST['edulevel']);
        $schoolname=mysqli_real_escape_string($conn,$_POST['schoolname']);
        
        $progprev=mysqli_real_escape_string($conn,$_POST['progprev']);
        $progby=mysqli_real_escape_string($conn,$_POST['progby']);
        $yesprogprev=mysqli_real_escape_string($conn,$_POST['yesprogprev']);
        $passwordx=mysqli_real_escape_string($conn,$_POST['passwordx']);
        $repasswordx=mysqli_real_escape_string($conn,$_POST['repasswordx']);
        $usertype='stud';

        $password="";
        if(isset($passwordx)){
            if(!$passwordx==$repasswordx){
                header("location: ../update-student.php?user=".$usercode."&error=passwordmissmatch");
            }
            $password= base64_encode(hash('sha256',$repasswordx));
        }
        
        $registrarid= $_SESSION['userid'];
        
        $sql1="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode='$registrarid'";
        $result1 =  $conn->query($sql1);
        $rws1 =  $result1->fetch_array();
   
        $sql="UPDATE ".$prefix."user SET username='$namex', email='$emailx', password='$passwordx', gender='$genderx', dateofbirth='$datebirthx', county='$countyx', inschool='$inschoolx', schoollevel='$edulevel', schoolname='$schoolname', progprev='$progprev', progby='$progby',yesprogprev='$yesprogprev', user_type='$usertype', mentor='$rws1[0]' WHERE usercode='$usercode'"; 
        echo $sql;
        
        if($result=$conn->query($sql)){
            header("location: ../update-student.php?user=".$usercode."&success=Student updated");
        }else{
            header("location: ../update-student.php?user=".$usercode."&error=Unable to update student. Please contact the administrator");
        }
        
    }
    $conn->close();
?>