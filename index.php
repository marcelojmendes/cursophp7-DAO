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
#$usuario = new Usuario();
#$usuario->login("RAYLDO","123456");
#echo $usuario;

// CHAMANDO PROCEDURE DO BANCO.. INSERT
//$aluno = new Usuario("aluno", "123@#");

// agora para mandar os dados acima para o banco, basta chamar o METODO INSERT
//$aluno->INSERT();

//echo $aluno;
 
// UPDATE...
//$usuario = new Usuario();

// carrega o usuario de id 4
//$usuario->loadById(4); 

// agora altera-lo passando os valores para minhas variaveis
//$usuario->UPDATE("Analista", "!@$#%*");
//echo $usuario;

$usuario = new Usuario();

$usuario->loadById(4);

$usuario->DELETE();

echo $usuario;
?>