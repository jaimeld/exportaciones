<?php 

class Usuario{
	private $nidacceso;
	private $snombre;
	private $susuario;
	private $sclave;
	
	function __construct($snom,$susr,$sclave){
		$this->snombre=$snom;
		$this->susuario=$susr;
		$this->sclave=md5($sclave);
	}
	public function getNombre(){
		return $this->snombre;
	}

	public function getIdacceso(){
		return $this->nidacceso;
	}
	
	function VerificaUsuario(){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombre from acceso
		where nomusuario=:usr";

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->susuario);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return true; else return false;

	}

	function VerificaAcceso(){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombre from acceso
		where nomusuario=:usr and pwdusuario=:pwd";

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->susuario);
		$querysel->bindParam(':pwd',$this->sclave);

		$datos=$querysel->execute();

		if ($querysel->rowcount()==1){
			$this->snombre=$querysel->fetchColumn();
			
			return true;
		}
		else{
			return false;
		}


	}
	    public function ModificaClave($nuevaClave){
        /*Llamado a la función que crea la instancia del objeto PDO*/
        
        $db= dbconnect();
        
        /*Declaración de la sentencia SQL que se requiere ejecutar*/
        $squery="update usuarios set clave=:pwd where usuario=:usr";
        
        /*Instancia del objeto que realizará el query*/
        $queryseleccion=$db->prepare($squery);
        
        $queryseleccion->bindParam(":usr",$this->nomusuario);
        $queryseleccion->bindParam(":pwd",$nuevaClave);
        
        $resultado=$queryseleccion->execute();
        
        return $resultado;
        
    }

}
?>