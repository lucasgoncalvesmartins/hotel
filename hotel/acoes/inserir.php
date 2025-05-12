<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php 
function conectar($bd,$usuario, $senha){
    return new PDO("mysql:host=localhost; dbname=$bd", $usuario, $senha);

}

function inserir($cpf,$nome,$sobrenome, $sexo, $dataNascimento){
    $conexao = conectar("bdhotel", "root", "");
    $sql = "INSERT INTO hospede (cpf,nome,sobrenome, sexo, datanascimento) values (:cpf,:nome,:sobrenome,:sexo, :dataNascimento)";
    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf",$cpf);
    $pstmt->bindValue(":nome",$nome);
    $pstmt->bindValue(":sobrenome",$sobrenome);
    $pstmt->bindValue(":sexo",$sexo);
    $pstmt->bindValue(":dataNascimento",$dataNascimento);
    $pstmt->execute();
    $conexao=encerrar();
}

if (isset($_POST['botao'])) {
if (isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['sexo'])
    && isset($_POST['dataNascimento'])  
    ) {
    $cpf = $_POST['cpf'];
    $nome  = $_POST['nome'];
    $sobrenome   = $_POST['sobrenome'];
    $sexo   = $_POST['sexo'];
    $dataNascimento    = $_POST['dataNascimento'];

    inserir($cpf,$nome,$sobrenome, $sexo, $dataNascimento);

    echo "<script>alert('cliente cadastrado com sucesso!!');</script>";
    
} else {
     echo "<script>alert('Erro: dados incompletos.');</script>";
}
}

function encerrar(){
    return null;

}

?>
</body>
</html>