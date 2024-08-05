<?php 
 
 include 'conn.php';

 $tarefa = $_POST['tarefa'];
 $descricao = $_POST['descricao'];
 $prazo = $_POST['prazo'];
 $prioridade = $_POST['prioridade'];
 $situacao = $_POST['tarefa_concluida'];

 $query = "INSERT INTO tarefas(`tarefa`, `desc`, `prazo`, `prioridade`, `situacao`) VALUES('$tarefa', '$descricao', '$prazo', '$prioridade', '$situacao');";
            
 $result = mysqli_query($conn, $query);

 header("location: index.php");
