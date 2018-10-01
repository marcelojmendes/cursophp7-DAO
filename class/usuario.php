<?php 

		class Usuario {
		// depois de criar os atributos private.. colocar os metodos get e set de cada um
			private $idusuario;
			private $deslogin;
			private $senha;
			private $dtcadastro;

			public function getIdusuario(){
				return $this->idusuario;
			}
			public function setIdusuario($valueUser){

		        $this->idusuario = $valueUser;  
			}

			public function getDeslogin(){
				return $this->deslogin;
			}
			public function setDeslogin($valueLogin){

				$this->deslogin = $valueLogin;
			}

			public function getSenha(){
				return $this->senha;
			}
			public function setSenha($valueSenha){

				$this->senha = $valueSenha;
			}
			public function getCadastro(){
				return $this->dtcadastro;
			}
			public function setCadastro($valueCadastro){
				$this->dtcadastro = $valueCadastro;
			}
		// Criando um metodo que tras o id do usuario e exibi para mim
			public function loadById($id){

				$sql = new Sql();

				$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id)); #igual valor =>

				// validar
				if (count($result) > 0) {
					# se ele existi, ou seja, se for mais que 0 existe...
				   $this->setData($result[0]);

				}

			}
	// metodo para trazer meus dados cmo uma Lista..
			public static function getList(){
				$sql = new Sql();
				return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
			}

            public static function search($login){
            	$sql = new Sql();
            	return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
                  
                  ':SEARCH'=>"%".$login."%"

            	));

            }
            // agora vou trazer so os dados que forem autenticados
            public function login($usuario, $senha){

            	$sql = new Sql();
            	$result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND senha = :SENHA", array(

            		":LOGIN"=>$usuario,
            		"SENHA"=>$senha

            	));

            	if (count($result) > 0) {
            		# code...
            		
            		$this->setData($result[0]);
            	}
            	else {
            		throw new Exception("Login e/ou senha inválidos");
            		
            	}
            }

        public function setData($dados){
        	    $this->setIdusuario($dados['idusuario']);
        		$this->setDeslogin($dados['deslogin']);
        		$this->setSenha($dados['senha']);
        		$this->setCadastro(new DateTime($dados['dtcadastro']));
        }


            public function INSERT(){
            	$sql = new Sql();
            	$result = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(

            		':LOGIN'=>$this->getDeslogin(),
            		':PASSWORD'=>$this->getSenha()

            	));

            	if (count($result) > 0) {
            		# code...
            		$this->setData($result[0]);	
            	}
            }

            public function UPDATE($login, $password){

                $this->setDeslogin($login);
                $this->setSenha($password);

            	$sql = new Sql();
            	$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, senha = :PASSWORD WHERE idusuario = :ID", array(

            		':LOGIN'=>$this->getDeslogin(),
            		':PASSWORD'=>$this->getSenha(),
            		':ID'=>$this->getIdusuario()

            	));
            }

            public function DELETE(){
            	$sql = new Sql();
            	$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
            		':ID'=>$this->getIdusuario()
            	));

            	$this->setIdusuario(0);
            	$this->setDeslogin("");
            	$this->setSenha("");
            	$this->setCadastro(new DateTime());
            }

            // ao inves dele trazer meu objeto, ele tras minha string e no formato JSON
			public function __toString(){
				return json_encode(array(
					"idusuario"=>$this->getIdusuario(),
					"deslogin"=>$this->getDeslogin(),
					"senha"=>$this->getSenha(),
					"dtcadastro"=>$this->getCadastro()->format("d/m/Y H:i:s")
				));
			}
		}

?>