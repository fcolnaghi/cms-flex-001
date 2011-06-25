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
	private $login;
	private $nome_completo;
	private $senha;
	private $email;
	private $data_cadastro;
	private $cep;
	private $endereco;
	private $bairro;
	private $cidade;
	private $estado;
	private $numero;
	private $complemento;
	private $cpf;
	private $telefone_1;
	private $telefone_2;
	private $news;
	private $status;
	
	/**
	 * @return the $idusuario
	 */
	public function getIdusuario() {
		return $this->idusuario;
	}

	/**
	 * @return the $login
	 */
	public function getLogin() {
		return $this->login;
	}

	/**
	 * @return the $nome_completo
	 */
	public function getNome_completo() {
		return $this->nome_completo;
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
	 * @return the $data_cadastro
	 */
	public function getData_cadastro() {
		return $this->data_cadastro;
	}

	/**
	 * @return the $cep
	 */
	public function getCep() {
		return $this->cep;
	}

	/**
	 * @return the $endereco
	 */
	public function getEndereco() {
		return $this->endereco;
	}

	/**
	 * @return the $bairro
	 */
	public function getBairro() {
		return $this->bairro;
	}

	/**
	 * @return the $cidade
	 */
	public function getCidade() {
		return $this->cidade;
	}

	/**
	 * @return the $estado
	 */
	public function getEstado() {
		return $this->estado;
	}

	/**
	 * @return the $numero
	 */
	public function getNumero() {
		return $this->numero;
	}

	/**
	 * @return the $complemento
	 */
	public function getComplemento() {
		return $this->complemento;
	}

	/**
	 * @return the $cpf
	 */
	public function getCpf() {
		return $this->cpf;
	}

	/**
	 * @return the $telefone_1
	 */
	public function getTelefone_1() {
		return $this->telefone_1;
	}

	/**
	 * @return the $telefone_2
	 */
	public function getTelefone_2() {
		return $this->telefone_2;
	}

	/**
	 * @return the $news
	 */
	public function getNews() {
		return $this->news;
	}

	/**
	 * @return the $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param field_type $idusuario
	 */
	public function setIdusuario($idusuario) {
		$this->idusuario = $idusuario;
	}

	/**
	 * @param field_type $login
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

	/**
	 * @param field_type $nome_completo
	 */
	public function setNome_completo($nome_completo) {
		$this->nome_completo = $nome_completo;
	}

	/**
	 * @param field_type $senha
	 */
	public function setSenha($senha) {
		$this->senha = $senha;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @param field_type $data_cadastro
	 */
	public function setData_cadastro($data_cadastro) {
		$this->data_cadastro = $data_cadastro;
	}

	/**
	 * @param field_type $cep
	 */
	public function setCep($cep) {
		$this->cep = $cep;
	}

	/**
	 * @param field_type $endereco
	 */
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}

	/**
	 * @param field_type $bairro
	 */
	public function setBairro($bairro) {
		$this->bairro = $bairro;
	}

	/**
	 * @param field_type $cidade
	 */
	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}

	/**
	 * @param field_type $estado
	 */
	public function setEstado($estado) {
		$this->estado = $estado;
	}

	/**
	 * @param field_type $numero
	 */
	public function setNumero($numero) {
		$this->numero = $numero;
	}

	/**
	 * @param field_type $complemento
	 */
	public function setComplemento($complemento) {
		$this->complemento = $complemento;
	}

	/**
	 * @param field_type $cpf
	 */
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}

	/**
	 * @param field_type $telefone_1
	 */
	public function setTelefone_1($telefone_1) {
		$this->telefone_1 = $telefone_1;
	}

	/**
	 * @param field_type $telefone_2
	 */
	public function setTelefone_2($telefone_2) {
		$this->telefone_2 = $telefone_2;
	}

	/**
	 * @param field_type $news
	 */
	public function setNews($news) {
		$this->news = $news;
	}

	/**
	 * @param field_type $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}
}

?>