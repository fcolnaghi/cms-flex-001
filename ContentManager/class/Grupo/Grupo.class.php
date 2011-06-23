<?php
/**
 * Grupo
 * @author fernando
 *
 */
class Grupo {
	public $id_grupo;
	public $id_grupo_pai;
	public $descricao;
	
	/**
	 * @return the $idgrupo
	 */
	public function getId_grupo() {
		return $this->id_grupo;
	}

	/**
	 * @return the $idgrupo_pai
	 */
	public function getId_grupo_pai() {
		return $this->id_grupo_pai;
	}

	/**
	 * @return the $descricao
	 */
	public function getDescricao() {
		return $this->descricao;
	}

	/**
	 * @param $idgrupo the $idgrupo to set
	 */
	public function setId_grupo($id_grupo) {
		$this->id_grupo = $id_grupo;
	}

	/**
	 * @param $idgrupo_pai the $idgrupo_pai to set
	 */
	public function setId_grupo_pai($id_grupo_pai) {
		$this->id_grupo_pai = $id_grupo_pai;
	}

	/**
	 * @param $descricao the $descricao to set
	 */
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	
	
	
}
?>