<?php 
class Consultas extends Datos {
	public $IdMedico;
	public $IdPaciente;
	public $Fecha;
	public $Consulta;
	public $Antecedentes;
	public $Impresion;
	public $Plan;

	public function ListarConsultas( $paBuscar ){
		$Regex = new MongoDB\BSON\Regex( $paBuscar );
		return $this->Conectar()->consultas->find(['$or' => [
			['fecha' => $Regex]
		]]);
	}

	public function TotalRegistros( $paBuscar ){
		$Regex = new MongoDB\BSON\Regex( $paBuscar );
		return $this->Conectar()->consultas->count(['$or' => [
			['fecha' => $Regex]
		]]);
	}

	public function BuscarPorId( $paId ){
		return $this->Conectar()->consultas->find(
			array(
				"_id"=> new MongoDB\BSON\ObjectId( $paId )
			)
		);
	}

	public function Agregar(){
		$this->Conectar()->consultas->insertOne([
			'idmedico'=> new MongoDB\BSON\ObjectId($this->IdMedico),
			'idpaciente'=> new MongoDB\BSON\ObjectId($this->IdPaciente),
			'fecha'=> addslashes($this->Fecha),
			'consulta'=> addslashes($this->Consulta),
			'antecedentes'=> addslashes($this->Antecedentes),
			'impresion'=> addslashes($this->Impresion),
			'plan'=> addslashes($this->Plan)
		]);

		return true;
	}

	public function Actualizar( $paId ){
		$this->Conectar()->consultas->updateOne(
			[
				"_id"=> new MongoDB\BSON\ObjectId( $paId )],
			[
				'$set' => [
					'fecha'=> addslashes($this->Fecha),
					'consulta'=> addslashes($this->Consulta),
					'antecedentes'=> addslashes($this->Antecedentes),
					'impresion'=> addslashes($this->Impresion),
					'plan'=> addslashes($this->Plan)
				]
			]);
		return true;
	}

	public function Eliminar( $paId ){
		$this->Conectar()->consultas->deleteOne(
			array(
				"_id"=> new MongoDB\BSON\ObjectId( $paId )
			)
		);
		return true;
	}

}

 ?>