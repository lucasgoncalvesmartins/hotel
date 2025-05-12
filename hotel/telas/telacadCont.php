<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Informações de Estadia</title>
  
  <link rel="stylesheet" href="../css/controle.css">
</head>
<body>
  <div class="container">
  <h2>Informações de Estadia</h2>
  <form action="../acoes/inserirCont.php" method="POST">
    <label>CPF do Hóspede:</label><br>
    <input type="text" name="hospedeCpf" required><br>

    <label>País de Origem:</label><br>
    <input type="radio" name="paisOrigem" value="Brasil" required>Brasil
    <input type="radio" name="paisOrigem" value="Argentina">Argentina
    <input type="radio" name="paisOrigem" value="Paraguai">Paraguai
    <input type="radio" name="paisOrigem" value="Uruguai">Uruguai
    <input type="radio" name="paisOrigem" value="Chile">Chile
    <input type="radio" name="paisOrigem" value="Peru">Peru<br><br>

    <label>Previsão de Estadia:</label><br>
    <select name="previsaoEstadia">
      <option value="3 dias">3 dias</option>
      <option value="5 dias">5 dias</option>
      <option value="1 semana">1 semana</option>
      <option value="2 semanas">2 semanas</option>
      <option value="3 semanas ou mais">3 semanas ou mais</option>
    </select><br>

    <label>Companhias Aéreas Utilizadas:</label><br>
    <input type="checkbox" name="ciasAereas[]" value="GOL">GOL <br>
    <input type="checkbox" name="ciasAereas[]" value="AZUL">AZUL
    <br>
    <input type="checkbox" name="ciasAereas[]" value="TRIP">TRIP
    <br>
    <input type="checkbox" name="ciasAereas[]" value="AVIANCA">AVIANCA
    <br>
    <input type="checkbox" name="ciasAereas[]" value="RISSETTI">RISSETTI
    <br>
    <input type="checkbox" name="ciasAereas[]" value="GLOBAL">GLOBAL<br><br>

    <input type="submit" name="botao" value="Cadastrar"><br><br>

    <div class="centralizar">
    <a href="../telas/index.php" id="botao">Voltar</a>
    </div>
  
  </form>
</div>
</body>
</html>
