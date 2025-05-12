<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\consultar.css">
    <title>Document</title>
</head>
<body>
    <?php 
function conectar($bd, $usuario, $senha) {
    return new PDO("mysql:host=localhost; dbname=$bd", $usuario, $senha);
}

function listarControlesEHospedes() {
    $conexao = conectar("bdhotel", "root", "");
    $sql = "SELECT h.cpf, h.nome, h.sobrenome, h.sexo, h.dataNascimento, 
                   c.paisOrigem, c.previsaoEstadia, c.ciasAereas
            FROM hospede h
            INNER JOIN controle c ON h.cpf = c.hospedeCpf";
    $pstmt = $conexao->prepare($sql);
    $pstmt->execute();

    if ($pstmt->rowCount() > 0) {
        echo "<table border='1'>
                <thead>
                    <tr>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Sexo</th>
                        <th>Data de Nascimento</th>
                        <th>País de Origem</th>
                        <th>Previsão de Estadia</th>
                        <th>Companhias Aéreas</th>
                    </tr>
                </thead>
                <tbody>";
        
       
        while ($linha = $pstmt->fetch()) {
            echo "<tr>
                    <td>" . $linha["cpf"] . "</td>
                    <td>" . $linha["nome"] . "</td>
                    <td>" . $linha["sobrenome"] . "</td>
                    <td>" . $linha["sexo"] . "</td>
                    <td>" . $linha["dataNascimento"] . "</td>
                    <td>" . $linha["paisOrigem"] . "</td>
                    <td>" . $linha["previsaoEstadia"] . "</td>
                    <td>" . $linha["ciasAereas"] . "</td>
                  </tr>";
        }

        echo "</tbody></table>";

    } else {
        echo "<p>Nenhum dado encontrado.</p>";
    }

    $conexao = encerrar();
}

function encerrar() {
    return null;
}

listarControlesEHospedes();
?>
            <a href="/Hotel/telas/index.php" class="botao">Voltar</a>
</body>
</html>