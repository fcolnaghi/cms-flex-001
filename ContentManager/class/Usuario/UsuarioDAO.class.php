<?php
/**
 * @author fernando
 * @version 1.0
 * @copyright Fernando Colnaghi Ribeiro LTDA
 *
 * @changes
 * 1.0 - Versão inicial
 */
class UsuarioDAO extends ConexaoDB {
	
	public function UsuarioDAO() {
		parent::$conexao = ConexaoDB::getInstance();
	}
	
	
	/**
	 * Carrega as informa��es do usu�rio apartir da tabela config_users
	 * @method carregarDadosUsuario
	 * @param $usuario
	 * @return Usuario
	 */
	public function carregarDadosUsuario($usuario) {
		try {

			$sql = "SELECT * FROM usuario WHERE login=?";

			$stmt = parent::$conexao->prepare($sql);	
			$stmt->bindValue(1,$usuario);
			$stmt->execute();
			
			return ConexaoDB::montaObjeto($stmt, "Usuario");
			
		} catch (PDOException $e) {
			$this->mostrarErros($e);
		}
	}

	public function listaUsuarios() {
		try {

			$sql = "SELECT * FROM usuario";

			$stmt = parent::$conexao->prepare($sql);	
			$stmt->execute();
			
			return ConexaoDB::montaLista($stmt, "Usuario");
			
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
		
		$label = new i18n();
		
		try {
			
			$sql = "SELECT * FROM usuario WHERE login= ? and senha = ?";

			$stmt = parent::$conexao->prepare($sql);	
			$stmt->bindValue(1,$login);
			$stmt->bindValue(2,md5($senha));
			
			$stmt->execute();
			
			if($stmt->rowCount() > 0) {
				$_SESSION['login'] = $this->montaObjeto($stmt ,"Usuario");
				return true;
			} else {
				$_SESSION['type'] = "erro";
				$_SESSION['message'] = $label->getTextoVar("erro.usuario.invalido");
				return false;
			}
						
		} catch (PDOException $e) {
			$this->mostrarErros($e);
		}
		
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