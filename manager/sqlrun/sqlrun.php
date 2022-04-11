<?php

include 'database.php';

$conn->query('SET foreign_key_checks = 0');
if ($result = $mysqli->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $conn->query('DROP TABLE IF EXISTS '.$row[0]);
    }
}

$conn->query('SET foreign_key_checks = 1');


$output = shell_exec($conn . '/sql.sql');
echo $output;

$sql = file_get_contents('sql.sql');

echo $sql;

$qr = $conn->exec($sql);

echo  $qr;

$conn->close();
