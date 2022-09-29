<?php 

include '../manager/config/_database/database.php';
$ansid= $_GET['ansid'];

$arrans = explode(',', $ansid);

$arransfiltered = array_filter(array_unique($arrans));

foreach($arransfiltered as $y){

    $sqly= "SELECT id, question, questiontype, correct_ans FROM ".$prefix."questions WHERE id = '$y'";
    $resulty =  $conn->query($sqly) or die(mysqli_error($conn));
    $rowy = $resulty->fetch_array();

    if($rowy['correct_ans']==""){
        exit();
    }
}
    $boxcont = '<div class="quest" style="color: #666;"><b>Correct answers to questions</b><br /><br />';

    foreach($arransfiltered as $x){
        $sql= "SELECT id, question, questiontype, correct_ans FROM ".$prefix."questions WHERE id = '$x'";
        $result =  $conn->query($sql) or die(mysqli_error($conn));
        $row = $result->fetch_array();

        $boxcont .='<b><i>'.$row['question'].'</i></b><br /><i><b>Answer:&nbsp;</b>'.str_replace('~', ', ', $row['correct_ans']).' </i><br /><br />';
        
    }

$boxcont .= '<br /></div>';
echo $boxcont;

$conn->close();

?>