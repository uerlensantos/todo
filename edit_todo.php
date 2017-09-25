<!DOCTYPE html>
<html>
<head>
  <title>To-Do List - Edição</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
  <link rel="stylesheet" href="jquery/css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <script src="jquery/js/jquery.js"></script>
  <script src="jquery/js/jquery-ui.js"></script>
  <script src="js/script.js"></script>

  <style type="text/css">
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

  </style>
</head>
<body>
  <?php
  include("conecta_db.php");

  $q = "SELECT * FROM todo WHERE id=".$_GET['id'];
  $x = mysqli_query($con, $q);
  $row = mysqli_fetch_array($x);

  echo "<div class='container'>";
  echo "<form class='form-myform form-search' action='actions.php?acao=edit' method='post'>";
  echo "<fieldset>";
  echo "<h2>Edição</h2>";
  echo "<input class='input-block-level' type='text' name='id' value='".$row['id']."' readonly='readonly' />";
  echo "<input class='input-block-level' type='text' name='desc' value='".$row['desc']."' />";
  echo "<input class='input-block-level' type='text' name='date' value='".$row['data']."' id='datepicker' />";
  echo "<div style='text-align: center;'>";
  echo "<input class='btn btn-large btn-primary' type='submit' value='Atualizar'>";
  echo "<div>";
  echo "</fieldset>";
  echo "</form>";
  echo "</div>";

  mysqli_close($con);
  ?>
<footer>
        <div class="container">
            <p>TODO List - Entrevista Teknisa &copy; Todos os direitos reservados!</p>
        </div>
        
    </footer>
</body>
</html>
