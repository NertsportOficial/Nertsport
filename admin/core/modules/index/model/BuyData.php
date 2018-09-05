<?php
//Esta clase se encarga de las consultas a la tabla "Comprar"
class BuyData {
	public static $tablename = "comprar";


	public function BuyData(){
		$this->title = "";
		$this->content = "";
		$this->FOTO = "";
		$this->user_id = "";
		$this->ES_PUBLICO = "0";
		$this->CREADO_EN = "NOW()";
	}
	// Esta funcion identifica el estado de la compra cuando es solicitada
	public function getStatus(){ return StatusData::getById($this->ESTATUS_ID);}
	// Esta funcion identifica el cliente relacionado con la compra cuando es solicitado
	public function getClient(){ return ClientData::getById($this->CLIENTE_ID);}
	//Esta funcion  agrega los registros a la base de datos desde el formulario correspondiente
	public function add(){
		$sql = "insert into ".self::$tablename." (CODIGO,CLIENTE_ID,CREADO_EN,ESTATUS_ID) ";
		$sql .= "value (\"$this->CODIGO\",\"$this->CLIENTE_ID\",$this->CREADO_EN,$this->ESTATUS_ID)";
		return Executor::doit($sql);
	}
	// Esta funcion elimina registros usando el Id que se le proporciona cuendo es solicitada
	public static function delById($ID_COMPRA){
		$sql = "delete from ".self::$tablename." where ID_COMPRA=$ID_COMPRA";
		Executor::doit($sql);
	}
	// Esta funcion elimina registros sin nesecidad de un  identificador proporcionado
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_COMPRA=$this->ID_COMPRA";
		Executor::doit($sql);
	}

	// Esta funcion actualiza los registros de la base de datos
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->NOMBRE\" where ID_COMPRA=$this->ID_COMPRA";
		Executor::doit($sql);
	}
	// Esta funcion cambia el estado de las compras a "Cancelado"
	public function cancel(){
		$sql = "update ".self::$tablename." set ESTATUS_ID=5 where ID_COMPRA=$this->ID_COMPRA";
		Executor::doit($sql);
	}
	// Esta funcion cambia el estado de las compras dependiendo de la que se seleccione
	public function change_status(){
		$sql = "update ".self::$tablename." set ESTATUS_ID=\"$this->ESTATUS_ID\" where ID_COMPRA=$this->ID_COMPRA";
		Executor::doit($sql);
	}
	// Esta funcion selecciona registros de la tabla usando el identificador proporcionado
	public static function getById($ID_COMPRA){
		$sql = "select * from ".self::$tablename." where ID_COMPRA=$ID_COMPRA";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}
	// Esta funcion selecciona registros de la tabla usando el codigo del producto usado
	public static function getByCode($ID_COMPRA){
		$sql = "select * from ".self::$tablename." where CODIGO=\"$ID_COMPRA\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}
	// Esta funcion selecciona registros de la tabla dependiendo del "Nombre corto" del producto
	public static function getByPreffix($ID_COMPRA){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$ID_COMPRA\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}
	// Esta funcion slecciona todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}
	// Esta funcion calcula el valor de una compra usando su precio unitario y la cantidad de productos agregados 
	public  function getTotal(){
		$products = BuyProductData::getAllByBuyId($this->ID_COMPRA);
		$total=0;
		foreach ($products as $px) {
			$p = ProductData::getById($px->PRODUCTO_ID);
			$total+=$p->PRECIO*$px->Q;
		}
		return $total;
	}
	//Esta funcion selecciona los registros de la tabla asignados a un usuario en especifico
	public static function getAllByClientId($ID_CLIENTE){
		$sql = "select * from ".self::$tablename." where CLIENTE_ID=$ID_CLIENTE";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}
	// Esta funcion selecciona los registros de la tabla que tienen el estado de "Es publico"
	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ES_PUBLICO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}

}

?>