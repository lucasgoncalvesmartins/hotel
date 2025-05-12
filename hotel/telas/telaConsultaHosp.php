<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Hóspede</title>

   <link rel="stylesheet" href="../css/consultaHosp.css">

</head>
<body>
    <div class="container">
        <h2>Consulta de Hóspede</h2>
        <form action="../acoes/consultar.php" method="post">
            
                <label for="cpf">Digite o CPF do hóspede:</label>
                <input type="text" name="cpf" id="cpf" required>
                <button type="submit" name="botaoCpf" 
                class="botao">Consultar</button>
                
        </form>
        
     <a href="/Hotel/telas/index.php" class="botao">Voltar</a>


  
    </div>
</body>
</html>
