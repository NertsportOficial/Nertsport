<?php
class UserData {
	public static $tablename = "administrador";

	public  function createForm(){
		$form = new lbForm();
	    $form->addField("NOMBRES",array('type' => new lbInputText(array("label"=>"Nombre")),"validate"=>new lbValidator(array())));
	    $form->addField("APELLIDOS",array('type' => new lbInputText(array("label"=>"Apellido")),"validate"=>new lbValidator(array())));
	    $form->addField("CORREO",array('type' => new lbInputText(array()),"validate"=>new lbValidator(array())));
	    $form->addField("PASSWORD",array('type' => new lbInputPassword(array()),"validate"=>new lbValidator(array())));
	    return $form;

	}

	public function Userdata(){
		$this->NOMBRES = "";
		$this->APELLIDOS = "";
		$this->CORREO = "";
		$this->PASSWORD = "";
		$this->CREADO_EN = "NOW()";
	}

	public function add(){
		$sql = "insert into administrador (NOMBRES,APELLIDOS,USUARIO,CORREO,PASSWORD,CREADO_EN) ";
		$sql .= "value (\"$this->NOMBRES\",\"$this->APELLIDOS\",\"$this->USUARIO\",\"$this->CORREO\",\"$this->PASSWORD\",$this->CREADO_EN)";
		Executor::doit($sql);
	}

	public static function delById($ID_ADMIN){
		$sql = "delete from ".self::$tablename." where ID_ADMIN=$ID_ADMIN";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_ADMIN=$this->ID_ADMIN";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set USUARIO=\"$this->USUARIO\",NOMBRES=\"$this->NOMBRES\",CORREO=\"$this->CORREO\",APELLIDOS=\"$this->APELLIDOS\",ADMIN=$this->ADMIN,ACTIVO=$this->ACTIVO where ID_ADMIN=$this->ID_ADMIN";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set PASSWORD=\"$this->PASSWORD\" where ID_ADMIN=$this->ID_ADMIN";
		Executor::doit($sql);
	}

	public static function getById($ID_ADMIN){
		$sql = "select * from ".self::$tablename." where ID_ADMIN=$ID_ADMIN";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query[0]->fetch_array()){
			$data->ID_ADMIN = $r['ID_ADMIN'];
			$data->NOMBRES = $r['NOMBRES'];
			$data->APELLIDOS = $r['APELLIDOS'];
			$data->USUARIO = $r['USUARIO'];
			$data->CORREO = $r['CORREO'];
			$data->PASSWORD = $r['PASSWORD'];
			$data->CREADO_EN = $r['CREADO_EN'];
			$data->ADMIN = $r['ADMIN'];
			$data->ACTIVO = $r['ACTIVO'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getByMail($CORREO){
		echo $sql = "select * from ".self::$tablename." where CORREO=\"$CORREO\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query->fetch_array()){
			$data->ID_ADMIN = $r['ID_ADMIN'];
			$data->NOMBRES = $r['NOMBRES'];
			$data->CORREO = $r['CORREO'];
			$data->CREADO_EN = $r['CREADO_EN'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->ID_ADMIN = $r['ID_ADMIN'];
			$array[$cnt]->NOMBRES = $r['NOMBRES'];
			$array[$cnt]->APELLIDOS = $r['APELLIDOS'];
			$array[$cnt]->USUARIO = $r['USUARIO'];
			$array[$cnt]->CORREO = $r['CORREO'];
			$array[$cnt]->PASSWORD = $r['PASSWORD'];
			$array[$cnt]->ACTIVO = $r['ACTIVO'];
			$array[$cnt]->ADMIN = $r['ADMIN'];
			$array[$cnt]->CREADO_EN = $r['CREADO_EN'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($Q){
		$sql = "select * from ".self::$tablename." where NOMBRES like '%$Q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->ID_ADMIN = $r['ID_ADMIN'];
			$array[$cnt]->NOMBRES = $r['NOMBRES'];
			$array[$cnt]->CORREO = $r['CORREO'];
			$array[$cnt]->PASSWORD = $r['PASSWORD'];
			$array[$cnt]->CREADO_EN = $r['CREADO_EN'];
			$cnt++;
		}
		return $array;
	}


}

?>