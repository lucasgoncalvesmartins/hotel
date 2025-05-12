<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Hóspede</title>
   <link rel="stylesheet" href="../css/hospede.css">
</head>
<body>
  
  <div class="container">
  <form action="../acoes/inserir.php" method="POST">
     <h2>Cadastro de Hóspede</h2>
    <label>CPF:</label><br>
    <input type="text" name="cpf" required><br>

    <label>Nome:</label><br>
    <input type="text" name="nome" required><br>

    <label>Sobrenome:</label><br>
    <input type="text" name="sobrenome" required><br>

    <label>Sexo:</label><br>
    <select name="sexo">
      <option value="M">Masculino</option>
      <option value="F">Feminino</option>
    </select><br>

    <label>Data de Nascimento:</label><br>
    <input type="date" name="dataNascimento"><br><br>

    <input type="submit" name="botao" value="Cadastrar"><br><br>

    <a href="../telas/index.php" class="botao">Voltar</a>
  
 
  </form>
  </div>
</body>
</html>
