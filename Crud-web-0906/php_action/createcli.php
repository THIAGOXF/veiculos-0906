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
	$nome = clear($_POST['Nome']);
	$sobrenome = clear($_POST['Sobrenome']);
	$email = clear($_POST['Email']);
	$idade = clear($_POST['Idade']);

	$sql = "INSERT INTO tbclientes (Nome, Sobrenome, Email, Idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../crudcli.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../crudcli.php');
	endif;
endif;