<?php
//Esta clase se encarga de las consultas y operaciones relacionadas con la tabla "Comprar_producto"
class BuyProductData {
	public static $tablename = "comprar_producto";


	public function BuyProductData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}
	//Esta funcion selecciona los registros de la tabla "producto" asignados a una compra en especifico
	public function getProduct() { return ProductData::getById($this->PRODUCTO_ID);}
	//Esta funcion agrega nuevos registros a la tabla
	public function add(){
		$sql = "insert into ".self::$tablename." (COMPRA_ID,PRODUCTO_ID,Q) ";
		$sql .= "value (\"$this->COMPRA_ID\",$this->PRODUCTO_ID,$this->Q)";
		return Executor::doit($sql);
	}
	//Esta funcion elimina registros usando el identificador proporcionado
	public static function delById($ID_COMPRA_PRO){
		$sql = "delete from ".self::$tablename." where ID_COMPRA_PRO=$ID_COMPRA_PRO";
		Executor::doit($sql);
	}
	//Esta funcion elimina registros sin usar el identificador
	public function del(){
		$sql = "delete from ".self::$tablename." where ID_COMPRA_PRO=$this->ID_COMPRA_PRO";
		Executor::doit($sql);
	}
	//Esta funcion actualiza registros de la tabla cuando se le solicita
	public function update(){
		$sql = "update ".self::$tablename." set NOMBRE=\"$this->NOMBRE\" where ID_COMPRA_PRO=$this->ID_COMPRA_PRO";
		Executor::doit($sql);
	}
	//Esta funcion selecciona registros de la tabla usando el identificador proporcionado
	public static function getById($ID_COMPRA_PRO){
		$sql = "select * from ".self::$tablename." where ID_COMPRA_PRO=$ID_COMPRA_PRO";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyProductData());
	}
	//Esta funcion selecciona registros de la tabla usando el "Nombre corto" del mismo
	public static function getByPreffix($ID_COMPRA_PRO){
		$sql = "select * from ".self::$tablename." where NOMBRE_CORTO=\"$ID_COMPRA_PRO\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyProductData());
	}
	//Esta funcion selecciona todos los registros de la tabla
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyProductData());
	}
	//Esta funcion selecciona los registros de la tabla usando el identificador de la tabla "Comprar"
	public static function getAllByBuyId($ID_COMPRA_PRO){
		$sql = "select * from ".self::$tablename." where COMPRA_ID=$ID_COMPRA_PRO";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyProductData());
	}
	//Esta funcion selecciona los registros usando el campo "Es publico"
	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where ES_PUBLICO=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyProductData());
	}

}

?>