<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="..\css\consultar.css">
    <title>Document</title>
</head>
<body>
     <div class="container">
    <?php

include_once("conexao.php");

function consultarHospedePorCpf($cpf) {
    $conexao = conectar("bdhotel"); 

    $sql = "SELECT * FROM hospede WHERE cpf = :cpf";

    $pstmt = $conexao->prepare($sql);
    $pstmt->bindValue(":cpf", $cpf);
    $pstmt->execute();

    echo "<table border=1><tr><th>CPF</th><th>Nome</th><th>Sobrenome</th><th>Sexo</th><th>Data de Nascimento</th></tr>";

    while ($linha = $pstmt->fetch()) {
        echo "<tr>";
        echo "<td>". $linha["cpf"]. "</td>";
        echo "<td>". $linha["nome"]. "</td>";
        echo "<td>". $linha["sobrenome"]. "</td>";
        echo "<td>". $linha["sexo"]. "</td>";
        echo "<td>". $linha["dataNascimento"]. "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
    $conexao = encerrar();
}


function listarTodosHospedes() {
    $conexao = conectar("bdhotel");

    $sql = "SELECT * FROM hospede";

    $pstmt = $conexao->prepare($sql);
    $pstmt->execute();

    echo "<table border=1><tr><th>CPF</th><th>Nome</th><th>Sobrenome</th><th>Sexo</th><th>Data de Nascimento</th></tr>";

    while ($linha = $pstmt->fetch()) {
        echo "<tr>";
        echo "<td>". $linha["cpf"]. "</td>";
        echo "<td>". $linha["nome"]. "</td>";
        echo "<td>". $linha["sobrenome"]. "</td>";
        echo "<td>". $linha["sexo"]. "</td>";
        echo "<td>". $linha["dataNascimento"]. "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
    $conexao = encerrar();
}


function formularioConsultaCpf() {
    echo '<form name="consultaCpf" method="post" action="#">
            <label for="cpf">Digite o CPF do hóspede:</label><br>
            <input type="text" name="cpf" id="cpf" required><br>
            <input type="submit" name="botaoCpf" value="Consultar">
          </form>';
}

function formularioListarTodos() {
    echo '<form name="listarTodos" method="post" action="#">
            <input type="submit" name="botaoListar" value="Listar Todos os Hóspedes">';
    echo '<a href="/Hotel/telas/index.php" class="botao">Voltar</a>';        
    echo  '</form>';
  
}

if (isset($_POST['botaoCpf'])) {
    $cpf = $_POST['cpf'];
    consultarHospedePorCpf($cpf);
   echo '<a href="/Hotel/telas/index.php" class="botao">Voltar</a>';   
} elseif (isset($_POST['botaoListar'])) {
    listarTodosHospedes();

       echo '<div class="centralizar">
    <a href="/Hotel/telas/index.php" class="botao">Voltar</a>
</div>';   
} else {
    formularioConsultaCpf();
    formularioListarTodos();
}


?>
</div>
</body>
</html>





