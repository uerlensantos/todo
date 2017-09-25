<!DOCTYPE HTML>
<html>
<head>
  <title>To-Do List - Gerêncie suas atividades</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
  <link rel="stylesheet" href="jquery/css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <meta name="keywords" content="Gerenciar, Gerenciamento, TODO, TO-DO, Lista, Tarefas, Organização" />
    <meta name="robots" content="index, follow"> 

  
  

  <script src="jquery/js/jquery.js"></script>
  <script src="jquery/js/jquery-ui.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="#">To-Do</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li><a href="about.html">Sobre</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
    <main>
  <div class="container">
    <div class="hero-unit">
        
    </div>

    <div class="row">
      <div class="span6">
        <legend>To-Do List</legend>
        <?php
        include("conecta_db.php");
        $x = mysqli_query($con, "SELECT * FROM todo WHERE `todo`.`status`=0 ORDER BY `data`");
        echo "
        <table class='table table-hover'>
          <thead>
            <tr>
              <th>Descrição</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          ";
        if(mysqli_num_rows($x) == 0) {
          echo "<tr>";
          echo "<td>ops... nada por aqui! :-(</td>";
          echo "<td>-</td>";
          echo "<td>-</td>";
          echo "</tr>";
        }
        else {
          

          while($row = mysqli_fetch_array($x)) {
            $d = date('Y-m-d');
            if($d == $row['data']) {
              $display_date = 'Hoje';
            }
            else {
              $display_date = $row['data'];
            }
            echo "<tr>";
            echo "<td>".$row['desc']."</td>";
            echo "<td>".$display_date."</td>";
            echo "<td><a href='actions.php?acao=check&id=".$row['id']."'>Check</a> | <a href='edit_todo.php?id=".$row['id']."'>edit</a> | <a href='actions.php?acao=delete&id=".$row['id']."'>delete</a>";
            echo "</tr>";
          }
        }

        $x = mysqli_query($con, "SELECT * FROM todo WHERE `todo`.`status`=1");
        if(mysqli_num_rows($x) == 0) {
          echo "</tbody>";
          echo "</table>";
        }
        else {
          while($row = mysqli_fetch_array($x)) {
            echo "<tr>";
            echo "<td><strike>".$row['desc']."</strike></td>";
            echo "<td><strike>".$row['data']."</strike></td>";
            echo "<td><a href='actions.php?acao=delete&id=".$row['id']."'>delete</a>";
            echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
        }

        
        ?>
      </div>

      <div class="span3">
        <form class="form-search form-myform" action="actions.php?acao=add" method="post">
          <fieldset>
            <h3>Adicionar novo</h3>
            <div class="">
              <input class="input-block-level" type="text" name="desc" placeholder="Descrição..." />
              <input class="input-block-level" type="text" name="date" placeholder="Data..." id="datepicker" />
              <input class="btn btn-large btn-primary" type="submit" value="Salvar">
            </div>
          </fieldset>
        </form>
      </div>

      

    </div>
  </div>
  </main>
    <footer>
        <div class="container">
            <p>TODO List - Entrevista Teknisa &copy; Todos os direitos reservados!</p>
        </div>
        
    </footer>
  <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>



