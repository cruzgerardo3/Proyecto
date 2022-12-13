<?php  
class Pacientes extends Datos {
	//Atributos de la clase
	public $Id;
	public $Nombres;
	public $Apellidos;
	public $FechaNac;
	public $Genero;
	public $TipoSangre;
	public $Telefono;
	public $Enfermedad;
	public $Peso;
	public $Altura;
	public $Direccion;

	//Metodos
	public function TotalRegistros( $paBuscar ){
		$Regex = new MongoDB\BSON\Regex( $paBuscar );
		return $this->Conectar()->pacientes->count(['$or' => [
			['nombres' => $Regex],
			['apellidos' => $Regex]
		]]);
	}

	public function ListarPacientes( $paBuscar ){
		$Regex = new MongoDB\BSON\Regex( $paBuscar );
		return $this->Conectar()->pacientes->find(['$or' => [
			['nombres' => $Regex],
			['apellidos' => $Regex]
		]]);
	}

	public function BuscarPorId( $paId ){
		return $this->Conectar()->pacientes->find(
			array(
				"_id"=> new MongoDB\BSON\ObjectId( $paId )
			)
		);
	}

	public function Actualizar(){
		$this->Conectar()->pacientes->updateOne(
			[
				"_id"=> new MongoDB\BSON\ObjectId( $this->Id )],
			[
				'$set' => [
					'nombres'=> addslashes($this->Nombres),
					'apellidos'=> addslashes($this->Apellidos),
					'fechanac'=> addslashes($this->FechaNac),
					'genero'=> addslashes($this->Genero),
					'tiposangre'=> addslashes($this->TipoSangre),
					'telefono'=> addslashes($this->Telefono),
					'enfermedad'=> addslashes($this->Enfermedad),
					'peso'=> addslashes($this->Peso),
					'altura'=> addslashes($this->Altura),
					'direccion'=> addslashes($this->Direccion)
				]
			]);
		return true;
	}

	public function Agregar(){
		$this->Conectar()->pacientes->insertOne([
			'nombres'=> addslashes($this->Nombres),
			'apellidos'=> addslashes($this->Apellidos),
			'fechanac'=> addslashes($this->FechaNac),
			'genero'=> addslashes($this->Genero),
			'tiposangre'=> addslashes($this->TipoSangre),
			'telefono'=> addslashes($this->Telefono),
			'enfermedad'=> addslashes($this->Enfermedad),
			'peso'=> addslashes($this->Peso),
			'altura'=> addslashes($this->Altura),
			'direccion'=> addslashes($this->Direccion)
		]);

		return true;
	}

	public function Eliminar( $paId ){
		$this->Conectar()->pacientes->deleteOne(
			array(
				"_id"=> new MongoDB\BSON\ObjectId( $paId )
			)
		);
		return true;
	}
}?>