<?php
/**
 * @author fernando
 * @version 1.0
 * @copyright Fernando Colnaghi Ribeiro LTDA
 *
 * @changes
 * 1.0 - Versão inicial
 */
class CategoriaDAO extends ConexaoDB {
	
	public function CategoriaDAO() {
		parent::$conexao = ConexaoDB::getInstance();
	}
	
	public function listarCategoria() {
		try {

			$sql = "SELECT * FROM categoria";

			$stmt = parent::$conexao->prepare($sql);	
			$stmt->execute();
			
			return ConexaoDB::montaLista($stmt, "Categoria");
			
		} catch (PDOException $e) {
			$this->mostrarErros($e);
		}
		
		
	}
	/**
	 * Carrega as informa��es do usu�rio apartir da tabela config_users
	 * @method login
	 * @param $usuario
	 * @return Usuario
	 */
	public function login($login, $senha) {
		try {
			
			$sql = "SELECT * FROM usuario WHERE login= ? and senha = ?";

			$stmt = parent::$conexao->prepare($sql);	
			$stmt->bindValue(1,$login);
			$stmt->bindValue(2,md5($senha));
			
			$stmt->execute();
			
			return $this->montaObjeto($stmt ,"Usuario");
			
		} catch (PDOException $e) {
			$this->mostrarErros($e);
		}
		
		return ConexaoDB::montaObjeto($stmt, "Usuario");
	}
	
	public function inserirUsuario($objUsuario) {
		$this->sqlInsert($objUsuario,"idusuario","usuario");
	}
	
	public function atualizarUsuario($objUsuario) {
		
		$indice = 'id_usuario';
		$tabela = 'usuarios';
		
		$this->sqlUpdate($objUsuario,$indice,$tabela);
	}
}

?>