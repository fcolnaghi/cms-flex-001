<?php
/**
 * 
 * Descri��o: Classe Respons�vel por popular o usu�rio
 * 
 * @author fernando
 * @version 1.0
 *
 * @changes
 * 1.0 - Vers�o inicial
 */
class Usuario {
	
	private $idusuario;
	private $nome;
	private $sobrenome;
	private $login;
	private $senha;
	private $email;
	private $dataCadastro;
	private $status;
	private $id_perfil;
	private $nomeCompleto;
	
	/*
	 * @return the $nomeCompleto
	 */
	public function getNomeCompleto() {
		return ucwords($this->nome." ".$this->sobrenome);
	}

	public function getIdusuario() {
		return $this->idusuario;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @return the $sobrenome
	 */
	public function getSobrenome() {
		return $this->sobrenome;
	}

	/**
	 * @return the $login
	 */
	public function getLogin() {
		return $this->login;
	}

	/**
	 * @return the $senha
	 */
	public function getSenha() {
		return $this->senha;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return the $dataCadastro
	 */
	public function getDataCadastro() {
		return $this->dataCadastro;
	}

	/**
	 * @return the $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param $idusuario the $idusuario to set
	 */
	public function setIdusuario($idusuario) {
		$this->idusuario = $idusuario;
	}

	/**
	 * @param $nome the $nome to set
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/**
	 * @param $sobrenome the $sobrenome to set
	 */
	public function setSobrenome($sobrenome) {
		$this->sobrenome = $sobrenome;
	}

	/**
	 * @param $login the $login to set
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

	/**
	 * @param $senha the $senha to set
	 */
	public function setSenha($senha) {
		$this->senha = $senha;
	}

	/**
	 * @param $email the $email to set
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @param $dataCadastro the $dataCadastro to set
	 */
	public function setDataCadastro($dataCadastro) {
		$this->dataCadastro = $dataCadastro;
	}

	/**
	 * @param $status the $status to set
	 */
	public function setStatus($status) {
		$this->status = $status;
	}
	
	/**
	 * @return the $id_perfil
	 */
	public function getId_perfil() {
		return $this->id_perfil;
	}

	/**
	 * @param $id_perfil the $id_perfil to set
	 */
	public function setId_perfil($id_perfil) {
		$this->id_perfil = $id_perfil;
	}


	
	
}

?>