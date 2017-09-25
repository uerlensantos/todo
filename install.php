<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Instalador</title>
</head>
<body>
  Iniciando a instalação...<br>
  <?php
    echo "Conectando ao banco.. ";
    include("conecta_db.php");
    echo "Feito <br>";

    echo "criando tabelas.. ";
    $query1 = "CREATE TABLE IF NOT EXISTS `todo` (`id` int(11) NOT NULL AUTO_INCREMENT, `desc` varchar(200) NOT NULL, `date` date NOT NULL, `status` int(2) NOT NULL, PRIMARY KEY (`id`))";
    $x = mysqli_query($con, $query1);   

    if($x==1){
      echo "Pronto... a base de dados foi criada com sucesso!  <br> <a href='index.php'> Vamos lá! </a>";
    }
    else{
      echo "ops... algo deu errado e não foi possível finalizar a operação. Verique os dados de conexão, se o servidor de bando esta disponivel e tente novamente. <br>";
    }

    mysqli_close($con);
  ?>
</body>
</html>
