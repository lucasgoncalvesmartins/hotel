<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
function conectar($bd, $usuario, $senha) {
    return new PDO("mysql:host=localhost; dbname=$bd", $usuario, $senha);
}

function inserirCont($cpf, $paisOrigem, $previsaoEstadia, $ciasAereas) {
    $conexao = conectar("bdhotel", "root", "");
    $ciasAereasStr = implode(", ", $ciasAereas); 

    $sql = "INSERT INTO controle (hospedeCpf, paisOrigem, previsaoEstadia, ciasAereas)
            VALUES (:cpf, :paisOrigem, :previsaoEstadia, :ciasAereas)";
    
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->bindValue(":paisOrigem", $paisOrigem);
    $pstmt->bindValue(":previsaoEstadia", $previsaoEstadia);
    $pstmt->bindValue(":ciasAereas", $ciasAereasStr);
    
    $executado = $pstmt->execute();

    if ($executado) {
        echo "<script>alert('Dados de controle inseridos com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao inserir dados.');</script>";
    }

    echo '<a href="/Hotel/telas/index.php" class="botao">Voltar</a>';

    $conexao = encerrar();
}

if (isset($_POST['botao'])) {
    if (isset($_POST['hospedeCpf']) && isset($_POST['paisOrigem']) && isset($_POST['previsaoEstadia']) && isset($_POST['ciasAereas'])) {
        $cpf = $_POST['hospedeCpf'];  
        $paisOrigem = $_POST['paisOrigem'];
        $previsaoEstadia = $_POST['previsaoEstadia'];
        $ciasAereas = $_POST['ciasAereas']; 

        inserirCont($cpf, $paisOrigem, $previsaoEstadia, $ciasAereas);
    } else {
               echo "<script>alert('Erro: dados incompletos.');</script>";
    }
}

function encerrar() {
    return null;
}
?>

</body>
</html>