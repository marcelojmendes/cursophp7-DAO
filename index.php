<?php 

require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

// transformo em um arquivo JSON
//echo json_encode($usuarios);

$rayldo = new Usuario();

$rayldo->loadById(3);

echo $rayldo;
?>