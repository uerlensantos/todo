<?php

$con = mysqli_connect("localhost", "user", "password", "database name");


if(!$con) {
    echo "Ops... deu algo errado na conexão com o banco! <br>";
    exit;
}

?>
