
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\alterarC.css">
    <title>Document</title>
</head>
<body>
    <?php
function conectar($bd, $usuario, $senha) {
    return new PDO("mysql:host=localhost;dbname=$bd", $usuario, $senha);
}

function encerrar() {
    return null;
}

function consultarControlePorCPF($cpf) {
    $conexao = conectar("bdhotel", "root", "");
    $sql = "SELECT * FROM controle WHERE hospedeCpf = :cpf";
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->execute();

    if ($linha = $pstmt->fetch()) {
        echo "<h2>Dados encontrados</h2>";
         echo '<div class="container">';
        echo '<form method="post" action="alterarC.php">';
        echo 'CPF: <input type="text" name="cpf" value="'.$linha["hospedeCpf"].'" readonly><br><br>';
        echo 'País de Origem: <input type="text" name="paisOrigem" value="'.$linha["paisOrigem"].'"><br><br>';
        echo 'Previsão de Estadia: <input type="text" name="previsaoEstadia" value="'.$linha["previsaoEstadia"].'"><br><br>';
        echo 'Companhias Aéreas: <input type="text" name="ciasAereas" value="'.$linha["ciasAereas"].'"><br><br>';
        echo '<input type="submit" name="alterar" value="Alterar">';
        echo '<div class="centralizar">
    <a href="/Hotel/telas/index.php" id="botao">Voltar</a>
</div>';
        echo '</form>';
        echo '</div>';
    } else {
        echo "<script>alert('Erro: Dados não encontrados para o CPF informado.');</script>";
    
    }

    $conexao = encerrar();
}

function alterarControle($cpf, $paisOrigem, $previsaoEstadia, $ciasAereas) {
    $conexao = conectar("bdhotel", "root", "");
    $sql = "UPDATE controle SET paisOrigem = :paisOrigem, previsaoEstadia = :previsaoEstadia, ciasAereas = :ciasAereas WHERE hospedeCpf = :cpf";
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->bindValue(":paisOrigem", $paisOrigem);
    $pstmt->bindValue(":previsaoEstadia", $previsaoEstadia);
    $pstmt->bindValue(":ciasAereas", $ciasAereas);
    $pstmt->execute();
    echo "<script>alert('Registro alterado com sucesso!!!');</script>";
    $conexao = encerrar();
}

if (isset($_POST['buscar'])) {
    consultarControlePorCPF($_POST['cpf']);
} elseif (isset($_POST['alterar'])) {
    alterarControle($_POST['cpf'], $_POST['paisOrigem'], $_POST['previsaoEstadia'], $_POST['ciasAereas']);
    echo '<br><form method="post" action="index.php">
            <input type="submit" value="buscar">
             <div class="centralizar">
            <a href="/Hotel/telas/index.php" class="botao">Voltar</a>
            </div>
          </form>';
} else {
    echo '<h2>Consultar Controle por CPF</h2>
    <form method="post" action="alterarC.php">
        CPF: <input type="text" name="cpf" required>
        <input type="submit" name="buscar" value="buscar">
        <div class="centralizar">
    <a href="/Hotel/telas/index.php" id="botao">Voltar</a>
</div>
    </form>';
}
?>

</body>
</html>


