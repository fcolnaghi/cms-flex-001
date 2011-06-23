<?php

class Categoria {
	
	private $id_categoria;
	private $id_categoria_pai;
	private $categoria;
	
	function __construct() {
	
	}
	
	function __destruct() {
	
	}
	
	/**
	 * @return the $id_categoria
	 */
	public function getId_categoria() {
		return $this->id_categoria;
	}

	/**
	 * @return the $id_categoria_pai
	 */
	public function getId_categoria_pai() {
		return $this->id_categoria_pai;
	}

	/**
	 * @return the $categoria
	 */
	public function getCategoria() {
		return $this->categoria;
	}

	/**
	 * @param $id_categoria the $id_categoria to set
	 */
	public function setId_categoria($id_categoria) {
		$this->id_categoria = $id_categoria;
	}

	/**
	 * @param $id_categoria_pai the $id_categoria_pai to set
	 */
	public function setId_categoria_pai($id_categoria_pai) {
		$this->id_categoria_pai = $id_categoria_pai;
	}

	/**
	 * @param $categoria the $categoria to set
	 */
	public function setCategoria($categoria) {
		$this->categoria = $categoria;
	}

	
	
}

?>