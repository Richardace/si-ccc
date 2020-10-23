<?php

class CorreoDAO
{

	public function validarCorreoAutorizado($email)
	{
		$db = new Connect;

		$validarCorreo = $db->prepare("SELECT * FROM correoautorizado WHERE email=:email");
		$validarCorreo->execute([
			':email'   => $email
		]);

		$correos = NULL;
		while ($row = $validarCorreo->fetch(PDO::FETCH_ASSOC)) {
			$correos[] = $row;
		}
		return $correos;
	}

	public function newCorreo($email)
	{

		$db = new Connect;

		$insertNewCorreo = $db->prepare("INSERT INTO correoautorizado (email) VALUES (:email)");
		$insertNewCorreo->execute([
			':email'   => $email
		]);

		return $insertNewCorreo;
	}

	public function getCorreos()
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM correoautorizado ORDER BY id');
		$consulta->execute();
		$correos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$correos[] = $row;
		}
		return $correos;
	}

	public function getCorreo($id)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM correoautorizado WHERE id=:id');
		$consulta->execute([
			':id'   => $id
		]);
		$correos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$correos[] = $row;
		}
		return $correos;
	}

	public function getCorreoByEmail($email)
	{
		$db = new Connect;
		$consulta = $db->prepare('SELECT * FROM correoautorizado WHERE email=:email');
		$consulta->execute([
			':email'   => $email
		]);
		$correos = NULL;
		while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
			$correos[] = $row;
		}
		return $correos;
	}

	public function deleteCorreo($id)
	{
		$db = new Connect;
		$consulta = $db->prepare("DELETE FROM correoautorizado WHERE id = '$id'");
		$consulta->execute();

		return $consulta;
	}
}
