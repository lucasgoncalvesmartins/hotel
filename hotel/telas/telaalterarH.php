<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>alterar Hóspede</title>
    <link rel="stylesheet" href="../css/alterarH.css"> 
</head>
<body>
    <div class="container">
        <h2>Buscar Hóspede para Alteração</h2>
        <form action="../acoes/alterarH.php" method="post">
            <label for="cpf">CPF do Hóspede:</label><br>
            <input type="text" id="cpf" name="cpf" required><br><br>

            <input type="submit" name="buscar" value="Buscar">
        </form>

        <a href="/Hotel/telas/index.php" id="botao">Voltar</a>


    </div>
</body>
</html>