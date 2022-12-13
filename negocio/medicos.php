<?php  
class Medicos extends Datos{
	public $Nombres;
	public $Apellidos;
	public $FechaNac;
	public $Dui;
	public $Genero;
	public $Especialidad;
	public $JVPM;
	public $Telefono;
	public $Usuario;
	public $Pass;
	public $TipoUsuario;

	public function TotalRegistros( $paBuscar ){
		$Regex = new MongoDB\BSON\Regex( $paBuscar );
		return $this->Conectar()->medicos->count(['$or' => [
			['nombres' => $Regex],
			['apellidos' => $Regex],
			['jvpm' => $Regex],
			['especialidad' => $Regex]
		]]);
	}

	public function ListarMedicos( $paBuscar ){
		$Regex = new MongoDB\BSON\Regex( $paBuscar );
		return $this->Conectar()->medicos->find(['$or' => [
			['nombres' => $Regex],
			['apellidos' => $Regex],
			['jvpm' => $Regex],
			['especialidad' => $Regex]
		]]);
	}

	public function BuscarPorId( $paId ){
		return $this->Conectar()->medicos->find(
			array(
				"_id"=> new MongoDB\BSON\ObjectId( $paId )
			)
		);
	}

	public function Actualizar( $paId ){
		$this->Conectar()->medicos->updateOne(
			[
				"_id"=> new MongoDB\BSON\ObjectId( $paId )],
			[
				'$set'=>[	
					'nombres'=> addslashes($this->Nombres),
					'apellidos'=> addslashes($this->Apellidos),
					'fechanac'=> addslashes($this->FechaNac),
					'dui'=> addslashes($this->Dui),
					'genero'=> addslashes($this->Genero),
					'especialidad'=> addslashes($this->Especialidad),
					'jvpm'=> addslashes($this->JVPM),
					'telefono'=> addslashes($this->Telefono),
					'usuario'=> addslashes($this->Usuario),
					'pass'=> addslashes($this->Pass),
					'tipousuario'=> addslashes($this->TipoUsuario)
				]			
			]);
		return true;
	}

	public function Agregar(){
		$this->Conectar()->medicos->insertOne([
			'nombres'=> addslashes($this->Nombres),
			'apellidos'=> addslashes($this->Apellidos),
			'fechanac'=> addslashes($this->FechaNac),
			'dui'=> addslashes($this->Dui),
			'genero'=> addslashes($this->Genero),
			'especialidad'=> addslashes($this->Especialidad),
			'jvpm'=> addslashes($this->JVPM),
			'telefono'=> addslashes($this->Telefono),
			'usuario'=> addslashes($this->Usuario),
			'pass'=> addslashes($this->Pass),
			'tipousuario'=> addslashes($this->TipoUsuario)
		]);
		return true;
	}

	public function Eliminar( $paId ){
		$this->Conectar()->medicos->deleteOne(
			array(
				"_id"=> new MongoDB\BSON\ObjectId( $paId )
			)
		);
		return true;
	}	
}?>