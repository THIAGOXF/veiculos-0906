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

if(isset($_POST['btn-cadastrar'])):
	$marca = clear($_POST['Marca']);
	$modelo = clear($_POST['Modelo']);
	$ano = clear($_POST['Ano']);
	$cor = clear($_POST['Cor']);
  	$placa = clear($_POST['Placa']);
    $motor = clear($_POST['Potência do motor']);
    $km = clear($_POST['Kilometragem']);
	$valor = clear($_POST['Valor']);
	
	$sql = "INSERT INTO tbveiculo (Marca, Modelo, Ano, Cor, Placa, Motor, Kilometragem, Valor) VALUES ('$marca', '$modelo', '$ano', '$cor', '$placa', '$motor', '$km', '$valor')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['Mensagem'] = "Cadastro feito com sucesso!";
		header('Location: ../crudvei.php');
	else:
		$_SESSION['Mensagem'] = "Erro ao cadastrar";
		header('Location: ../crudvei.php');
	endif;
endif;