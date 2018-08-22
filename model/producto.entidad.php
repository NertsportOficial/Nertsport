<?php
// Clase socio, donde se definen las variables que se usaran en las funciones
class Producto
{
	private $COD_PRODUCTO;
	private $NOMPRO;
	private $MARCA;
	private $TALLA;
	private $PRECIO;
	private $DESCRIPCION;
	private $COLOR;
	private $FOTO;
	
// Estas dos funciones se encargan de 
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}