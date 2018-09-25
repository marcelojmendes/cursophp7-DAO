<?php 

require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

// transformo em um arquivo JSON
//echo json_encode($usuarios);

// esse metodo carrega somente um usuario.
#$rayldo = new Usuario();
#$rayldo->loadById(3);
#echo $rayldo;

// esse metodo carrega uma lista de usuarios
#$lista = Usuario::getList();
#echo json_encode($lista);

// Carrega uma lista de usuarios buscando pelo login
//$busca = Usuario::search("T");
//echo json_encode($busca);

#------ Carrega um usuario usando o login e senha
$usuario = new Usuario();
$usuario->login("RAYLDO","123456");

echo $usuario;
?>