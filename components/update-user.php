<?php
if(isset($_REQUEST['submit_stud'])){
	
	ini_set("display_errors",1);
    session_start();
    $current_user=$_SESSION['userid'];
    require '../manager/config/_database/database.php';
	
	$pass1=  mysqli_real_escape_string($conn,$_REQUEST['pass1']);
    $pass2=  mysqli_real_escape_string($conn,$_REQUEST['pass2']);
		
		$sql1 = "SELECT organization, aboutme FROM ".$prefix."user WHERE usercode = '$current_user'";
		$result1 = $conn->query($sql1);
		$rowl = $result1->fetch_array();
		
		if($mybio==$rowl["aboutme"]){
			echo "same1";
		}else{
			$sql3="UPDATE ".$prefix."user SET aboutme='$mybio' WHERE usercode = '$current_user'";
			$conn->query($sql3);
		}
		
		if( $organization == $rowl["organization"]){
			echo "same2";
		}else{
			$sql4="UPDATE ".$prefix."user SET organization='$organization' WHERE usercode = '$current_user'";
			$conn->query($sql4);
			
			echo "same21";
		}
		
		if($pass1=="" && $pass2==""){
			
		}else{
			if($pass1==$pass2){
				$password= base64_encode(hash('sha256',$pass2));
				$sqlpass="UPDATE ".$prefix."user SET password='$password' WHERE usercode = '$current_user'";
				$conn->query($sqlpass);
				
			}else{
				header("location:../update-profile.php?error=password mismatch");
			}	
		}
		
        $Destination = '../userfiles/avatars';

        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'placeholder.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
			header("location:../update-profile.php?update&status=success");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE ".$prefix."user SET avatar='$NewImageName' WHERE usercode = '$current_user'";
       
        $result = $conn->query("SELECT * FROM ".$prefix."user WHERE usercode = '$current_user'");
        if( $result->num_rows > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                $conn->query($sql5);
				
				 header("location:../update-profile.php?update&status=success");
            }
        } 
        else {
			header("location:../update-profile.php?error=Cannot update profile");
            
        }  
        
 
}	

if(isset($_REQUEST['submit_ment'])){
	
	ini_set("display_errors",1);
    session_start();
    $current_user=$_SESSION['userid'];
    require '../manager/config/_database/database.php';
	
	$pass1=  mysqli_real_escape_string($conn,$_REQUEST['pass1']);
		
		$sql1 = "SELECT password FROM ".$prefix."mentor WHERE usercode = '$current_user'";
		$result1 = $conn->query($sql1);
		$rowl = $result1->fetch_array();
		
		if($pass1=="" && $pass2==""){
			
		}else{
			if($pass1==$pass2){
				$password= base64_encode(hash('sha256',$pass2));
				$sqlpass="UPDATE ".$prefix."mentor SET password='$password' WHERE usercode = '$current_user'";
				$conn->query($sqlpass);
				
			}else{
				header("location:../update-profile.php?error=password mismatch");
			}	
		}
		
        $Destination = '../userfiles/avatars';

        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'placeholder.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
			header("location:../update-profile.php?update&status=success");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE ".$prefix."mentor SET avatar='$NewImageName' WHERE usercode = '$current_user'";
       
        $result = $conn->query("SELECT * FROM ".$prefix."mentor WHERE usercode = '$current_user'");
        if( $result->num_rows > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                $conn->query($sql5);
				
				 header("location:../update-profile.php?update&status=success");
            }
        } 
        else {
			header("location:../update-profile.php?error=Cannot update profile");
            
        }  
        
 
}	
?>