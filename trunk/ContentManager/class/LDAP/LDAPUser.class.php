<?php
/**
 * Classe para popular um usuário vindo do LDAP
 * @author fernando
 *
 */
class LDAPUser {
	
	public $givenName;
	public $sn;
	public $cn;
	public $uid;
	public $userPassword;
	public $uidNumber;
	public $homeDirectory;
	public $homePhone;
	public $grupo;
	public $gidNumber;
	public $mail;
	public $shadowexpire;
	public $officePhone;
	public $loginShell;
	public $employeeNumber;
	public $jpegPhoto;
	
	
	
	/**
	 * @return the $givenName
	 */
	public function getGivenName() {
		return $this->givenName;
	}
	/**
	 * @param $jpegPhoto the $jpegPhoto to set
	 */
	public function setJpegPhoto($jpegPhoto) {
		$this->jpegPhoto = $jpegPhoto;
	}

	/**
	 * @return the $jpegPhoto
	 */
	public function getJpegPhoto() {
		return $this->jpegPhoto;
	}

	/**
	 * @param $loginShell the $loginShell to set
	 */
	public function setLoginShell($loginShell) {
		$this->loginShell = $loginShell;
	}

	/**
	 * @return the $loginShell
	 */
	public function getLoginShell() {
		return $this->loginShell;
	}

	/**
	 * @param $officePhone the $officePhone to set
	 */
	public function setOfficePhone($officePhone) {
		$this->officePhone = $officePhone;
	}

	/**
	 * @return the $officePhone
	 */
	public function getOfficePhone() {
		return $this->officePhone;
	}

	/**
	 * @param $shadowexpire the $shadowexpire to set
	 */
	public function setShadowexpire($shadowexpire) {
		$this->shadowexpire = $shadowexpire;
	}

	/**
	 * @return the $shadowexpire
	 */
	public function getShadowexpire() {
		return $this->shadowexpire;
	}


	/**
	 * @return the $sn
	 */
	public function getSn() {
		return $this->sn;
	}

	/**
	 * @return the $cn
	 */
	public function getCn() {
		return $this->cn;
	}

	/**
	 * @return the $uid
	 */
	public function getUid() {
		return $this->uid;
	}

	/**
	 * @return the $userPassword
	 */
	public function getUserPassword() {
		return $this->userPassword;
	}

	/**
	 * @return the $uidNumber
	 */
	public function getUidNumber() {
		return $this->uidNumber;
	}

	/**
	 * @return the $homeDirectory
	 */
	public function getHomeDirectory() {
		return $this->homeDirectory;
	}

	/**
	 * @return the $homePhone
	 */
	public function getHomePhone() {
		return $this->homePhone;
	}

	/**
	 * @return the $grupo
	 */
	public function getGrupo() {
		return $this->grupo;
	}

	/**
	 * @return the $gidNumber
	 */
	public function getGidNumber() {
		return $this->gidNumber;
	}

	/**
	 * @return the $mail
	 */
	public function getMail() {
		return $this->mail;
	}

	/**
	 * @param $givenName the $givenName to set
	 */
	public function setGivenName($givenName) {
		$this->givenName = $givenName;
	}

	/**
	 * @param $sn the $sn to set
	 */
	public function setSn($sn) {
		$this->sn = $sn;
	}

	/**
	 * @param $cn the $cn to set
	 */
	public function setCn($cn) {
		$this->cn = $cn;
	}

	/**
	 * @param $uid the $uid to set
	 */
	public function setUid($uid) {
		$this->uid = $uid;
	}

	/**
	 * @param $userPassword the $userPassword to set
	 */
	public function setUserPassword($userPassword) {
		$this->userPassword = $userPassword;
	}

	/**
	 * @param $uidNumber the $uidNumber to set
	 */
	public function setUidNumber($uidNumber) {
		$this->uidNumber = $uidNumber;
	}

	/**
	 * @param $homeDirectory the $homeDirectory to set
	 */
	public function setHomeDirectory($homeDirectory) {
		$this->homeDirectory = $homeDirectory;
	}

	/**
	 * @param $homePhone the $homePhone to set
	 */
	public function setHomePhone($homePhone) {
		$this->homePhone = $homePhone;
	}

	/**
	 * @param $grupo the $grupo to set
	 */
	public function setGrupo($grupo) {
		$this->grupo = $grupo;
	}

	/**
	 * @param $gidNumber the $gidNumber to set
	 */
	public function setGidNumber($gidNumber) {
		$this->gidNumber = $gidNumber;
	}

	/**
	 * @param $mail the $mail to set
	 */
	public function setMail($mail) {
		$this->mail = $mail;
	}
	/**
	 * @param $employeeNumber the $employeeNumber to set
	 */
	public function setEmployeeNumber($employeeNumber) {
		$this->employeeNumber = $employeeNumber;
	}

	/**
	 * @return the $employeeNumber
	 */
	public function getEmployeeNumber() {
		return $this->employeeNumber;
	}

	
	
	
}

?>