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
			   $linha = $result[0];
			   $this->setIdusuario($linha['idusuario']);
			   $this->setDeslogin($linha['deslogin']);
			   $this->setSenha($linha['senha']);
			   $this->setCadastro(new DateTime($linha['dtcadastro']));

			}

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