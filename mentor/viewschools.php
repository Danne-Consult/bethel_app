<?php 
 ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	
	require '../manager/config/_database/database.php'; 
	
	$registrarid= $_SESSION['userid'];		
	$sql2="SELECT mentor_id FROM ".$prefix."mentor WHERE usercode='$registrarid'";

	$result2 =  $conn->query($sql2);
	$rws2 =  $result2->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" href="../assets/css/flexslider.css">
	<link rel="stylesheet" href="../assets/css/menuscript.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<script src="../assets/js/jquery.min.js"></script>
</head>


<body class="inner">

	<div class="container12">
		<article>
			<h3>View Schools</h3>
			<div class="row">
				<div class="col-md-12">
					<?php 

						$sqlx = "SELECT * FROM ".$prefix."schools WHERE enterby='$rws2[0]'";
						$resultx =  $conn->query($sqlx);

						if($resultx->num_rows == 0){
								echo "<p>No Users Added!</p>";
						}else{
							echo"<table id='datable' class='display'>
							<thead>
							<tr>
								<th>School Names</th>
								<th>Update/Delete</th>
							</tr>
							</thead>
							<tbody>";
							
							while($rowx = $resultx->fetch_array()){
							echo "<tr>
									<td>".$rowx['schoolname']."</td>
									<td><a title='Update' href='update-user.php?user=".$rowx['id']."'><i class='fa fa-edit' aria-hidden='true'></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a class='delete' title='Delete' href='components/deleteuser.php?user=".$rowx['id']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
									</tr>";
							};
							
							echo "</tbody></table>";
						}
						$conn->close();
					?>
				</div>
			</div>
		</article>
	</div>
		
	
</div>
</body>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	 <script>
	    $(document).ready(function() {
            $('#datable').DataTable();
			
			$(".delete").click(function(){
				return confirm("Are you sure you want to delete this record?");	
			});
			
			$('#morefield').click(function(){
				$('.testcont').append('<div class="qanda"><div class="quest"><label>Question</label><br /><textarea name="question[]"></textarea></div><div class="ans"><label>Answer</label><br /><input type="text" name="answer[]" /></div><div class="del"><i id="deletefield" class="fa fa-trash" aria-hidden="true"></i></div></div>');
			});
			$(document).on('click','#deletefield', function(){
				$(this).closest(".qanda").remove();
			});
        })
	 </script>
</html>