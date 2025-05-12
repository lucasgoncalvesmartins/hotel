<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="..\css\alterarH.css">
    <title>Document</title>
</head>

<body>
    <?php
    function conectar($bd, $usuario, $senha)
    {
        return new PDO("mysql:host=localhost; dbname=$bd", $usuario, $senha);
    }

    function encerrar()
    {
        return null;
    }

    function consultarPorCPF($cpf)
    {
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede WHERE cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();

        if ($linha = $pstmt->fetch()) {
            echo "<h2>Registro encontrado</h2>";
            echo '<div class="container">';
            echo '<form method="post" action="alterarH.php">';
            echo 'CPF: <input type="text" name="cpf" value="' . $linha["cpf"] . '" readonly><br><br>';
            echo 'Nome: <input type="text" name="nome" value="' . $linha["nome"] . '"><br><br>';
            echo 'Sobrenome: <input type="text" name="sobrenome" value="' . $linha["sobrenome"] . '"><br><br>';
            echo 'Data de Nascimento: <input type="date" name="datanascimento" value="' . $linha["dataNascimento"] . '"><br><br>';
            echo '<input type="submit" name="alterar" value="Alterar">';
            echo '<a href="/Hotel/telas/index.php" class="botao">Voltar</a>';
            echo '</form>';
            echo '</div>';
        } else {
            echo "<script>alert('Erro: Hóspede não encontrado.');</script>";
        }

        $conexao = encerrar();
    }

    function alterar($cpf, $nome, $sobrenome, $datanascimento)
    {
        $conexao = conectar("bdhotel", "root", "");
        $sql = "UPDATE hospede SET nome = :nome, sobrenome = :sobrenome, dataNascimento = :datanascimento WHERE cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->bindValue(":sobrenome", $sobrenome);
        $pstmt->bindValue(":datanascimento", $datanascimento);
        $pstmt->execute();
         echo "<script>alert('Cadastro alterado com sucesso!!');</script>";

        $conexao = encerrar();
    }

    if (isset($_POST['buscar'])) {
        consultarPorCPF($_POST['cpf']);
    } else
    if (isset($_POST['alterar'])) {
        alterar($_POST['cpf'], $_POST['nome'], $_POST['sobrenome'], $_POST['datanascimento']);
        echo '<div class="centralizar">
    <a href="/Hotel/telas/index.php" id="botao">Voltar</a>
</div>';
    } else {
        echo '<h2>Consultar Hóspede por CPF</h2>';
        echo '<div class="container">';
        echo '<form method="post" action="alterarH.php">
        CPF: <input type="text" name="cpf" required>
        <input type="submit" name="buscar" value="Buscar">';
        echo '<div class="centralizar">
    <a href="/Hotel/telas/index.php" id="botao">Voltar</a>
</div>';
        echo '</form>';
        echo '</div>';
    }
    ?>

</body>

</html>