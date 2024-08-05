<?php 

include 'conn.php';

$id = $_GET['id'];

$tarefa = $_POST['tarefa'];
$desc = $_POST['descricao'];
$prazo = $_POST['prazo'];
$prioridade = $_POST['prioridade'];
$situacao = $_POST['tarefa_concluida'];

$query = "UPDATE tarefas SET `tarefa` = '$tarefa', `desc` = '$desc', `prazo` = '$prazo', `prioridade` = '$prioridade', `situacao` = '$situacao' WHERE `id` = $id";

$result = mysqli_query($conn, $query);

header('location: index.php');
