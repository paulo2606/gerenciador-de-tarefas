<?php 

include 'conn.php';

$id = $_GET['id'];
$delete = "DELETE FROM tarefas WHERE id = $id;";
$result = mysqli_query($conn, $delete);

header('location: index.php');


