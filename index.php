<?php

include 'conn.php';

$query = 'SELECT * FROM tarefas ORDER BY prazo';
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas Tarefas</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- font awasome (icones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- script font awasome (icones) -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
</head>

<body>

    <div class="container">
        <header>
            <h1 class="display-3 text-center mb-4">Suas Tarefas</h1>
            <a href="nova-tarefa.php" class="btn btn-outline-primary col-sm-2 offset-5 mb-5">Nova Tarefa</a>
        </header>

        <main>
            
            <div class="row d-flex justify-content-center flex-wrap">
                <?php

                    while ($linha = mysqli_fetch_assoc($result)) {
                        $data = date('d/m/Y', strtotime($linha['prazo']));

                        // definir card em vermelho com data vencida
                        $dataAtual = date('d/m/Y');
                        $prazo = $linha['prazo'];
                        $dataVencida = $data <= $dataAtual ? 'background-color: #ee9999;' : '';
                      
                ?>
                    <div class="card m-2" style="width: 22rem; <?= $dataVencida?>">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $linha['tarefa']; ?></h5>
                            <hr>
                            <p><?= $linha['desc']; ?></p>
                            <p class="mb-0"><b>Prazo:</b> <?= $data; ?></p>
                            <p class="mb-0"><b>Prioridade:</b> <?= $linha['prioridade']; ?></p>
                            <?= ($linha['situacao']) == 'concluido' ? '<i class="fa-regular fa-calendar-check mr-2" style="color: #37c339;"></i>' : '<i class="fa-regular fa-clock mr-2" style="color: #d53434;"></i>' ?>
                            <a href="editar.php?id=<?= $linha['id']; ?>" class="mr-2"><i class="fa-solid fa-pen-to-square " style="color: #143876;"></i></a>
                            <a href="excluir.php?id=<?= $linha['id']; ?>"><i class="fa-solid fa-trash " style="color: #c83232;"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>

</body>

</html>