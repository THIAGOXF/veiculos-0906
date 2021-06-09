<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-editar'])):
	$marca = clear($_POST['Marca']);
	$modelo = clear($_POST['Modelo']);
	$ano = clear($_POST['Ano']);
	$cor = clear($_POST['Cor']);
  	$placa = clear($_POST['Placa']);
    $motor = clear($_POST['Potência do motor']);
    $km = clear($_POST['Kilometragem']);
	$valor = clear($_POST['Valor']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE tbveiculo (Marca, Modelo, Ano, Cor, Placa, Potência do motor, Kilometragem, Valor) VALUES ('$marca', '$modelo', '$ano', '$cor', '$placa', '$motor', '$km', '$valor')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['Mensagem'] = "Atualizado com sucesso!";
		header('Location: ../crudvei.php');
	else:
		$_SESSION['Mensagem'] = "Erro ao atualizar";
		header('Location: ../crudvei.php');
	endif;
endif;