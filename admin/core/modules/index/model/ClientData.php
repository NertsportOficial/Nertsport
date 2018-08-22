<?php
class ClientData {
	public static $tablename = "cliente";



	public function ClientData(){
		$this->NOMBRE = "";	
		$this->APELLIDO = "";
		$this->CORREO = "";
		$this->PASSWORD = "";
		$this->CREADO_EN = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (NOMBRE,APELLIDO,TELEFONO,DIRECCION,CORREO,PASSWORD,CREADO_EN) ";
		echo $sql .= "value (\"$this->NOMBRE\",\"$this->APELLIDO\",\"$this->TELEFONO\",\"$this->DIRECCION\",\"$this->CORREO\",\"$this->PASSWORD\",$this->CREADO_EN)";
		Executor::doit($sql);
	}

	public function add_client(){
		$sql = "insert into ".self::$tablename." (NOMBRE,APELLIDO,DIRECCION,CORREO,TELEFONO,CREADO_EN) ";
		$sql .= "value (\"$this->NOMBRE\",\"$this->APELLIDO\",\"$this->DIRECCION\",\"$this->CORREO\",\"$this->TELEFONO\",$this->CREADO_EN)";
		Executor::doit($sql);
	}
	public static function delById($ID_CLIENTE){
		$sql = "delete from ".self::$tablename." where ID_CLIENTE=$ID_CLIENTE";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_CLIENTE=$this->ID_CLIENTE";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ClientData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nick=\"$this->nick\",NOMBRE=\"$this->NOMBRE\",CORREO=\"$this->CORREO\",FOTO=\"$this->FOTO\",PASSWORD=\"$this->PASSWORD\",ESTATUS_ID=".$this->status->id.",usertype_id=".$this->usertype->id.",ADMIN=$this->is_admin,is_verified=$this->is_verified,created_at=$this->created_at where id=$this->id";
		Executor::doit($sql);
	}

	public function getFullname(){ return $this->NOMBRE." ".$this->APELLIDO; }

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