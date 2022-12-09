<?php  
class Pacientes extends Datos {
	//Atributos de la clase
	public $Id;
	public $Nombres;
	public $Apellidos;
	public $FechaNac;
	public $TipoSangre;
	public $Telefono;
	public $Enfermedad;
	public $Direccion;

	//Metodos
	public function TotalRegistros(){
		return $this->Conectar()->pacientes->count();
	}

	public function ListarPacientes(){
		return $this->Conectar()->pacientes->find();
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
					'tiposangre'=> addslashes($this->TipoSangre),
					'telefono'=> addslashes($this->Telefono),
					'enfermedad'=> addslashes($this->Enfermedad),
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
			'tiposangre'=> addslashes($this->TipoSangre),
			'telefono'=> addslashes($this->Telefono),
			'enfermedad'=> addslashes($this->Enfermedad),
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