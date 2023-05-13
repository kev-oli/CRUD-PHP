<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="2">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Exercicio 01</title>

</head>

<body>

  <div class="title">

    <div class="title1">
      <h1>SALÃO </h1>
    </div>

    <div class="title2">
      <h1>SERVIÇO </h1>
    </div>
  </div>

  <div class="conteiner">
  <div class="conteinerSalao">

    <div class="salao">
      <?php
      header('Content-Type: text/html; charset=UTF-8');
      // dados para conexão com base de dados MySql
      $host = "localhost";
      $user = "root";
      $pass = "root";
      $banco = "banco";
      // criando a linha de conexão
      $conexao = mysqli_connect($host, $user, $pass, $banco)
        or die("Problemas com a conexão do Banco de Dados");
      // enviando uma solicitação de consulta a tabela
      $info = mysqli_query($conexao, "select * from tb_salao ");
      if (!$info) {
        die('Query Inválida: ' . mysqli_error($conexao));
      }
      //fechando a conexão
      mysqli_close($conexao);
      // criando o documento XML de forma manual
      $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';
      $xml .= '<array>';
      $xml .= '<salao>';
      //Retorna uma matriz que corresponde a
//linha obtida e move o ponteiro interno dos dados adiante.
      while ($dados = mysqli_fetch_array($info)) {
        // cria os elementos nós do XML com os dados
      
        $xml .= '<tb_salao>';
        $xml .= '<salao_id>' . $dados['salao_id'] . '</salao_id>';
        $xml .= '<salao_nome>' . $dados['salao_nome'] . '</salao_nome>';
        $xml .= '<salao_end>' . $dados['salao_end'] . '</salao_end>';
        $xml .= '<salao_fone>' . $dados['salao_fone'] . '</salao_fone>';
        $xml .= '<salao_email>' . $dados['salao_email'] . '</salao_email>';
        $xml .= '</tb_salao>';
      }
      //finaliza o documento
      $xml .= '</salao>';
      $xml .= '</array>';


      //fazendo a leitura do documento
      $xml = simplexml_load_string($xml);
      foreach ($xml->salao->tb_salao as $tb_salao) {
        echo "<strong>ID:</strong> " . utf8_decode($tb_salao->salao_id) . "<br /> ";
        echo "<strong>Nome:</strong> " . utf8_decode($tb_salao->salao_nome) . "<br />";
        echo "<strong>Endereço:</strong> " . utf8_decode($tb_salao->salao_end) . "<br />";
        echo "<strong>Telefone:</strong> " . utf8_decode($tb_salao->salao_fone) . "<br />";
        echo "<strong>Email:</strong> " . utf8_decode($tb_salao->salao_email) . "<br />";
        echo "<br />";
      }
      ?>

    </div>
    </div>
    <div class="conteinerServico">
    <div class="servico">

      <?php
      // TABELA SERVICO
      
      header('Content-Type: text/html; charset=UTF-8');
      // dados para conexão com base de dados MySql
      $host = "localhost";
      $user = "root";
      $pass = "root";
      $banco = "banco";
      // criando a linha de conexão
      $conexao = mysqli_connect($host, $user, $pass, $banco)
        or die("Problemas com a conexão do Banco de Dados");
      // enviando uma solicitação de consulta a tabela
      $info = mysqli_query($conexao, "select * from view_salao");
      if (!$info) {
        die('Query Inválida: ' . mysqli_error($conexao));
      }
      //fechando a conexão
      mysqli_close($conexao);
      // criando o documento XML de forma manual
      $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';
      $xml .= '<array>';
      $xml .= '<servico>';
      //Retorna uma matriz que corresponde a
//linha obtida e move o ponteiro interno dos dados adiante.
      while ($dados = mysqli_fetch_array($info)) {
        // cria os elementos nós do XML com os dados
        $xml .= '<tb_servico>';
        $xml .= '<servico_id>' . $dados['servico_id'] . '</servico_id>';
        $xml .= '<servico_nome>' . $dados['servico_nome'] . '</servico_nome>';
        $xml .= '<servico_valor>' . $dados['servico_valor'] . '</servico_valor>';
        $xml .= '<fk_salao_id>' . $dados['fk_salao_id'] . '</fk_salao_id>';

        $xml .= '</tb_servico>';
      }
      //finaliza o documento
      $xml .= '</servico>';
      $xml .= '</array>';
      //fazendo a leitura do documento
      $xml = simplexml_load_string($xml);

      foreach ($xml->servico->tb_servico as $tb_servico) {
        echo "<strong>ID:</strong> " . utf8_decode($tb_servico->servico_id) . "<br />";
        echo "<strong>Serviço:</strong> " . utf8_decode($tb_servico->servico_nome) . "<br />";
        echo "<strong>Valor:</strong> " . utf8_decode($tb_servico->servico_valor) . "<br />";
        echo "<strong>Profissional:</strong> " . utf8_decode($tb_servico->fk_salao_id) . "<br />";
        echo "<br />";
        echo "<br />";
      }

      ?>

 
  </div>
  </div>
  </div>
</body>

</html>