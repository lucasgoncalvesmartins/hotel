<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="..\css\excluir.css">
    <title>Document</title>
</head>
<body>
    <?php
function conectar($bd, $usuario, $senha) {
    return new PDO("mysql:host=localhost;dbname=$bd", $usuario, $senha);
}

function excluirHospede($cpf) {
    $conexao = conectar("bdhotel", "root", "");
    $sqlControle = "DELETE FROM controle WHERE hospedeCpf = :cpf";
    $pstmtControle = $conexao->prepare($sqlControle);
    $pstmtControle->bindValue(":cpf", $cpf);
    $pstmtControle->execute();
    
    $sqlHospede = "DELETE FROM hospede WHERE cpf = :cpf";
    $pstmtHospede = $conexao->prepare($sqlHospede);
    $pstmtHospede->bindValue(":cpf", $cpf);
    $pstmtHospede->execute();
    
    echo "<script>alert('cliente excluido com sucesso!!');</script>";

    
    $conexao = encerrar();
}

function encerrar() {
    return null;
}

if (isset($_POST['excluir'])) {
    $cpf = $_POST['cpf'];

    if (isset($_POST['excluirControle'])) {
        $excluirControle = true;
    } else {
        $excluirControle = false;
    }

    excluirHospede($cpf);  

    echo '<br>
            <div class="centralizar">
             <a href="/Hotel/telas/index.php" class="botao">Voltar</a>
              </div>';
} else {
    echo '<h2>Excluir Hóspede</h2>
    <form method="post" action="#">
        CPF: <input type="text" name="cpf" required><br><br>
        <input type="submit" name="excluir" value="Excluir"><br><br>
        <div class="centralizar">
            <a href="/Hotel/telas/index.php" class="botao">Voltar</a>
        </div>  
    </form>';
}
?>


</body>
</html>