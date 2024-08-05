<?php
include 'conn.php';

$id = $_GET['id'];

$sqlUpdate = "SELECT * FROM tarefas WHERE id = $id";
$resultUpdate = mysqli_query($conn, $sqlUpdate);
$linhaUpdate = mysqli_fetch_assoc($resultUpdate);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    
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
            <h1 class="display-4 text-center mb-5">Editar Tarefa</h1>
        </header>

        <main>
            <form action="salvar-edicao.php?id=<?=$linhaUpdate['id'];?>" method="post" class="col-md-6 offset-3">
                <fieldset class="border p-4 mt-5">
                    <legend class="w-50 h6-display-5 text-center"><?=$linhaUpdate['tarefa'];?></legend>
                    
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" class="form-control" name="id" maxlength="50" value="<?=$linhaUpdate['id'];?>" disabled>
                    </div>

                    <div class="form-group">
                        <label>Tarefa:</label>
                        <input type="text" class="form-control" name="tarefa" maxlength="50" value="<?=$linhaUpdate['tarefa'];?>" required>
                    </div>

                    <div class="form-group">
                        <label>Descrição:</label>
                        <textarea name="descricao" class="form-control" maxlength="150" required><?=$linhaUpdate['desc'];?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Prazo:</label>
                        <input type="date" name="prazo" class="form-control" value="<?=$linhaUpdate['prazo'];?>" maxlength="20">
                    </div>

                    <div>
                        <fieldset class="border mb-3 p-1">
                            <legend class="w-auto h6">Prioridade</legend>
                            <label>Baixa</label>
                            <input type="radio" name="prioridade" value="baixa" <?=($linhaUpdate['prioridade'] == 'baixa') ? 'checked' : '';?>>
                            <label>| Média</label>
                            <input type="radio" name="prioridade" value="media" <?=($linhaUpdate['prioridade'] == 'media') ? 'checked' : '';?>>
                            <label>| Alta</label>
                            <input type="radio" name="prioridade" value="alta" <?=($linhaUpdate['prioridade'] == 'alta') ? 'checked' : '';?>>
                        </fieldset>
                    </div>

                    <div>
                        <label for="">Tarefa Concluída:</label>
                        <input type="checkbox" name="tarefa_concluida" value="concluido" <?=($linhaUpdate['situacao'] == 'concluido') ? 'checked' : '';?>>
                        <br>
                        <label for="">Lembrete por e-mail:</label>
                        <input type="checkbox" name="lembrete">
                    </div>

                    <div class="col-sm-12 text-center">
                        <input type="submit" value="Salvar" class="btn btn-primary">
                    </div>
                </fieldset>
            </form>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
