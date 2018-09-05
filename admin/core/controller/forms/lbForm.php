<?php
//Esta clase se encarga de la construccion y validacion de formularios
class lbForm {
	//Esta funcion define la variable "field" como un vector
	public function lbForm(){
		$this->field = array();
	}
	//Esta funcion valida la creacion de nuevos campos cuando es ejecutada
	public function addField($name,$field){
		$this->field[$name] = $field;
	}
	//Esta funcion interpreta la creacion del campo y la devuelve  
	public function render($field){
		return $this->getField($field)->render();
	}
	//Esta funcion etiqueda los campos creados
	public function label($field){
		return $this->getField($field)->renderLabel();

	}
	//Esta funcion selecciona los campos creados
	public function getField($name){
		$field = $this->field[$name]['type'];
		$field->setName($name);
		return $field;
	}
}
?>