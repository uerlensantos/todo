<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
  include("conecta_db.php");
  
  $acao = $_GET["acao"];
  
  switch ($acao){
      case "add":
          $q = "INSERT INTO todo (`todo`.`desc`, `todo`.`data`, `todo`.`status`) VALUES('".$_POST['desc']."', '".$_POST['date']."', 0)";
          break;
      case "check":
          $q = "UPDATE todo SET `todo`.`status`=1 WHERE `todo`.`id`=".$_GET['id'];
          break;
      
      case "edit":
          $q = "UPDATE todo SET `todo`.`desc`='".$_POST['desc']."', `todo`.`data`='".$_POST['date']."' WHERE `todo`.`id`=".$_POST['id'];
          break;
      
      case "delete":
          $q = "DELETE FROM `todo` WHERE `todo`.`id`=".$_GET['id'];
          break;
  }
  
  
  $x = mysqli_query($con, $q);

  if($x == 1) {
    header('Location: index.php');
  }
  else {
    /* TODO: Error report */
  }

  mysqli_close($con);
  ?>
</body>
</html>
