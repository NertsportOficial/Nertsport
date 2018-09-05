<?php
class ClientData {
	//Esta clase se encarga de las consultas y operaciones relacionadas con la tabla "Cliente"
	public static $tablename = "cliente";

	public function ClientData(){
		$this->NOMBRE = "";	
		$this->APELLIDO = "";
		$this->CORREO = "";
		$this->PASSWORD = "";
		$this->CREADO_EN = "NOW()";
	}
	//Esta funcion agrega nuevos registros a la tabla
	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE,APELLIDO,TELEFONO,DIRECCION,CORREO,PASSWORD,CREADO_EN) ";
		echo $sql .= "value (\"$this->NOMBRE\",\"$this->APELLIDO\",\"$this->TELEFONO\",\"$this->DIRECCION\",\"$this->CORREO\",\"$this->PASSWORD\",$this->CREADO_EN)";
		Executor::doit($sql);
	}
	//Esta funcion agrega los registros en caso de que algunosd e los campos no se usen
	public function add_client(){
		$sql = "insert into ".self::$tablename." (NOMBRE,APELLIDO,DIRECCION,CORREO,TELEFONO,CREADO_EN) ";
		$sql .= "value (\"$this->NOMBRE\",\"$this->APELLIDO\",\"$this->DIRECCION\",\"$this->CORREO\",\"$this->TELEFONO\",$this->CREADO_EN)";
		Executor::doit($sql);
	}
	//Esta funciona elimina registros de la tabla usando el identificador proporcionado
	public static function delById($ID_CLIENTE){
		$sql = "delete from ".self::$tablename." where ID_CLIENTE=$ID_CLIENTE";
		Executor::doit($sql);
	}
	// Esta funcion elimina registros de la tabla
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_CLIENTE=$this->ID_CLIENTE";
		Executor::doit($sql);
	}
	//Esta funcion actualiza los registros de la tabla dependiendo de los requerimientos del usuario
	public function update(){
		$sql = "update ".self::$tablename." set nick=\"$this->nick\",NOMBRE=\"$this->NOMBRE\",CORREO=\"$this->CORREO\",FOTO=\"$this->FOTO\",PASSWORD=\"$this->PASSWORD\",ESTATUS_ID=".$this->status->id.",usertype_id=".$this->usertype->id.",ADMIN=$this->is_admin,is_verified=$this->is_verified,created_at=$this->created_at where id=$this->id";
		Executor::doit($sql);
	}
	//Esta funcion obtiene el nombre de los registros de la tabla "Operacion_tipo"
	public function getFullname(){ return $this->NOMBRE." ".$this->APELLIDO; }
	//Esta funcion selecciona los registros de la tabla que concuerden con el identificador dado
	public static function getById($ID_CLIENTE){
		$sql = "select * from ".self::$tablename." where ID_CLIENTE=$ID_CLIENTE";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ClientData();
		while($r = $query[0]->fetch_array()){
			$data->ID_CLIENTE = $r['ID_CLIENTE'];
			$data->NOMBRE = $r['NOMBRE'];
			$data->APELLIDO = $r['APELLIDO'];
			$data->CORREO = $r['CORREO'];
			$data->DIRECCION = $r['DIRECCION'];
			$data->TELEFONO = $r['TELEFONO'];
			$data->PASSWORD = $r['PASSWORD'];
			$data->CREADO_EN = $r['CREADO_EN'];
			$data->avatar = $r['avatar'];
			$found = $data;
			break;
		}
		return $found;
	}
	//Esta funcion selecciona los registros de la tabla que concuerden con el email dado
	public static function getByEmail($CORREO){
		$sql = "select * from ".self::$tablename." where CORREO=\"$CORREO\"";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ClientData();
			$array[$cnt]->ID_CLIENTE = $r['ID_CLIENTE'];
			$array[$cnt]->NOMBRE = $r['NOMBRE'];
			$array[$cnt]->APELLIDO = $r['APELLIDO'];
			$array[$cnt]->CORREO = $r['CORREO'];
			$array[$cnt]->PASSWORD = $r['PASSWORD'];
			$array[$cnt]->CREADO_EN = $r['CREADO_EN'];
			$cnt++;
		}
		return $array;
	}
	//Esta funcion selecciona todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename."";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ClientData();
			$array[$cnt]->ID_CLIENTE = $r['ID_CLIENTE'];
			$array[$cnt]->NOMBRE = $r['NOMBRE'];
			$array[$cnt]->APELLIDO = $r['APELLIDO'];
			$array[$cnt]->DIRECCION = $r['DIRECCION'];
			$array[$cnt]->TELEFONO = $r['TELEFONO'];
			$array[$cnt]->CORREO = $r['CORREO'];
			$array[$cnt]->PASSWORD = $r['PASSWORD'];
			$array[$cnt]->CREADO_EN = $r['CREADO_EN'];
			$array[$cnt]->avatar = $r['avatar'];
			$cnt++;
		}
		return $array;
	}
	//Esta funcion selecciona los registros de tabla que coincidan con la busqueda del usuario
	public static function getLike($Q){
		$sql = "select * from ".self::$tablename." where NOMBRE like '%$Q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ClientData();
			$array[$cnt]->ID_CLIENTE = $r['ID_CLIENTE'];
			$array[$cnt]->NOMBRE = $r['NOMBRE'];
			$array[$cnt]->CORREO = $r['CORREO'];
			$array[$cnt]->PASSWORD = $r['PASSWORD'];
			$array[$cnt]->CREADO_EN = $r['CREADO_EN'];
			$cnt++;
		}
		return $array;
	}


}

?>