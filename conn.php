<?php 

$host = 'localhost';
$user = 'root';
$password = 'root';
$bd = 'gerenciador_de_tarefas';
$port = 3306;

$conn = mysqli_connect($host, $user, $password, $bd, $port);

header('Locarion: index.php');

// if (mysqli_connect_errno()) {
//     die('Erro para conectar:' . mysqli_connect_error());
// }else{
//     echo 'conexão feita com sucesso!';
// }
