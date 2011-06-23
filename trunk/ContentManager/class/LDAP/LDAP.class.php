<?php

/**
 * Classe de controle para usuÃ¡rios no LDAP
 * @author fernando
 *
 */
class LDAP {
	
	protected $ldapport = 389;
	protected $ldaphost = "172.16.0.1";
	protected $ldaphost_mirror = "172.16.0.2";
	protected $conn = null;
	
	public function LDAP() {
		// specify the LDAP server to connect to
		if(!$this->conn) {
			$this->conn = ldap_connect($this->ldaphost) or die("HOST PRINCIPAL NÃO CONSEGUIU SE CONECTAR");						 
			ldap_set_option($this->conn,LDAP_OPT_PROTOCOL_VERSION, 3);
			
			if(!$conn = @ldap_bind($this->conn)) {
				$this->conn = ldap_connect($this->ldaphost_mirror) or die("HOST MIRROR NÃO CONSEGUIU SE CONECTAR");
				ldap_set_option($this->conn,LDAP_OPT_PROTOCOL_VERSION, 3);
				
				$conn = @ldap_bind($this->conn) or die ("Não foi possível fazer a conexão.");
			} 	
		}	

 		return $this->conn;
	}  
		
	public function getUsuarioPorUID($usuario) {
		$resultado = self::cleanUpEntry(ldap_get_entries($this->conn, self::pesquisaUsuario("(uid=".$usuario.")")));
		
		return self::toObject($resultado);
	}
	
	public function getUsuarioPorCN($usuario) {
		$resultado = self::cleanUpEntry(ldap_get_entries($this->conn, self::pesquisaUsuario("(cn=".$usuario.")")));
		
		return self::toObject($resultado);
	}
	
	private function pesquisaUsuario($filtro) {
		$retorno = ldap_search($this->conn,"dc=crvnatural,dc=com,dc=br", "(&(objectClass=posixAccount)".$filtro.")" ) or die ("Error in search"); //(objectclass=posixGroup)
		return $retorno;
	}
	
	private function pesquisaGidGrupo($grupo) {
		$retorno = ldap_search($this->conn,"dc=crvnatural,dc=com,dc=br", "(&(objectclass=posixGroup)(cn=".$grupo."))" ) or die ("Error in search"); //(objectclass=posixGroup)
		$retorno = ldap_get_entries($this->conn, $retorno);
		
		return $retorno[0]['gidnumber'][0];
	}
	
	private function pesquisaGrupos() {
		$retorno = ldap_search($this->conn,"dc=crvnatural,dc=com,dc=br", "(&(objectclass=posixGroup)(cn=*))" ) or die ("Error in search"); //(objectclass=posixGroup)
		//$retorno = ldap_get_entries($this->conn, $retorno);
		return $retorno;
	}
	
	private function pesquisaGrupoGid($gid) {
		$retorno = ldap_search($this->conn,"dc=crvnatural,dc=com,dc=br", "(&(objectclass=posixGroup)(gidNumber=".$gid."))" ) or die ("Error in search"); //(objectclass=posixGroup)
		$retorno = ldap_get_entries($this->conn, $retorno);
		
		return $retorno[0]['cn'][0];
	}
	
	public function listarTodosUsuariosGrupo($grupo) {
		$gid = self::pesquisaGidGrupo($grupo);
		$filtro = "(gidnumber=".$gid.")(cn=*)";
		
		return self::cleanUpEntry(ldap_get_entries($this->conn, self::pesquisaUsuario($filtro)));
	}
	
	public function getGrupo($gid) {
		return self::pesquisaGrupoGid($gid);
	}
	
	
	/**
	 * Captura a entrada dos LDAP_GET_ENTRIES que vem de um Array para uma liste de Objetos LDAPUser
	 * @param $resultado
	 * @return Array(Object LDAPUser);
	 */
	private function toObject($resultado) {
		$retorno = array();
		
		foreach ($resultado as $chave => $valor) {
			$objeto = new LDAPUser();
			foreach($valor as $key => $value) {
				if(!is_array($value)) {
					$campo = "set".ucfirst($key);
					if($key == "gidnumber") {
						$objeto->$campo($value);		
						$objeto->setGrupo(self::getGrupo($value));
					} else {	
						$objeto->$campo($value);
					}
				}
			}
			array_push($retorno, $objeto);
		}	

		return $retorno;
	}
	
	public function listarTodosUsuarios() {
		$filtro = "(cn=*)";		
		$resultado = self::cleanUpEntry(ldap_get_entries($this->conn, self::pesquisaUsuario($filtro)));
		
		return self::toObject($resultado);
	}
	
	public function listarTodosGrupos() {
			
		$resultado = self::cleanUpEntry(ldap_get_entries($this->conn, self::pesquisaGrupos()));
		
		return self::toObject($resultado);
	}
		
	private function cleanUpEntry( $entry ) {
		$retEntry = array();
		
		for ( $i = 0; $i < $entry['count']; $i++ ) {
			if (is_array($entry[$i])) {
				$subtree = $entry[$i];
				//This condition should be superfluous so just take the recursive call
				//adapted to your situation in order to increase perf.
				if ( ! empty($subtree['dn']) and ! isset($retEntry[$subtree['dn']])) {
					$retEntry[$subtree['dn']] = self::cleanUpEntry($subtree);
				}else {
					$retEntry[] = self::cleanUpEntry($subtree);
				}
			} else {
				$attribute = $entry[$i];
				if ( $entry[$attribute]['count'] == 1 ) {
					$retEntry[$attribute] = $entry[$attribute][0];
				} else {
					for ( $j = 0; $j < $entry[$attribute]['count']; $j++ ) {
						$retEntry[$attribute][] = $entry[$attribute][$j];
					}
				}
			}
		}
		
		return $retEntry;
	}
	
	public function userLogin($usuario, $senha) {

	    $username = trim($usuario);
    	$password = trim($senha);

	    $ds = $this->conn;
    	    
	    $search = ldap_search($ds, "dc=crvnatural,dc=com,dc=br", "uid=$username");
	    
	    //Make sure only ONE result was returned -- if not, they might've thrown a * into the username.  Bad user!
	    if( ldap_count_entries($ds,$search) != 1 )
	    {
	    	$_SESSION['type'] = 'erro';
	        $_SESSION['message'] = "Os dados informados sÃ£o invÃ¡lidos";
	        return false;
	    }
	    
	    $info = ldap_get_entries($ds, $search);
	    
	    //Pega o DN completo do usuÃ¡rio e tenta se logar ao LDAP, se for um usuÃ¡rio vÃ¡lido vai permitir logar,
	    //se nÃ£o BadUser
	    $bind = @ldap_bind($ds, $info[0]['dn'], $password);
	    if( !$bind || !isset($bind))
	    {
	    	$_SESSION['type'] = 'erro';
	        $_SESSION['message'] = "Falha ao tentar logar no sistema. <b>Login</b> ou <b>Senha</b> incorretos!";
	        return false;
	    }
	    
	    //Now verify the previous search using their credentials.
	    $search = ldap_search($ds, "dc=crvnatural,dc=com,dc=br", "uid=$username");
	        
	    $info = ldap_get_entries($ds, $search);
	    if( $username == $info[0]['uid'][0] ) {
	        $_SESSION['login'] = self::getUsuarioPorUID($username);     
	        return true;
	    } else {
	    	$_SESSION['type'] = 'erro';
	        $_SESSION['message'] = "Usuário não existe";
	        return false;
	    }
	}
}
?>