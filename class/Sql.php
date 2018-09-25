<?php 

class Sql extends PDO{

	private $conexao;

	public function __construct(){

		$this->conexao = new PDO("mysql: host=localhost;dbname=dbphp7", "root", "");
	}
#isso chama-se metodos
	private function setParametros($statment, $parameters = array()){

		foreach ($parameters as $key => $value) {
			# code...
			$this->setParam($statment, $key, $value);
		}

	}
#isso chama-se metodo setParam
	private function setParam($statment, $key, $value){

		$statment->bindParam($key, $value);
	}
#isso chama-se metodo query
	public function query($rawQuery, $params = array()){

		$stmt = $this->conexao->prepare($rawQuery);

		$this->setParametros($stmt, $params);
        
        $stmt->execute();
		return $stmt;
    }
#isso é meu metodo select
    public function select($rawQuery, $params = array()):array
    {

    	$stmt = $this->query($rawQuery, $params);

    	return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}