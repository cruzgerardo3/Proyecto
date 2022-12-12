<?php 
class Consultas extends Datos {
	public $IdMedico;
	public $IdPaciente;
	public $Fecha;
	public $Consulta;
	public $Antecedentes;
	public $Impresion;
	public $Plan;

	public function ListarConsultas(){
		return $this->Conectar()->consultas->find();
	}

	public function TotalRegistros(){
		return $this->Conectar()->consultas->count();
	}
}

 ?>