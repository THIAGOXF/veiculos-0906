<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
	$nome = mysqli_escape_string($connect, $_POST['Nome']);
	$sobrenome = mysqli_escape_string($connect, $_POST['Sobrenome']);
	$email = mysqli_escape_string($connect, $_POST['Email']);
	$idade = mysqli_escape_string($connect, $_POST['Idade']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE tbclientes SET Nome = '$nome', Sobrenome = '$sobrenome', Email = '$email', Idade = '$idade' WHERE ID = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['Mensagem'] = "Atualizado com sucesso!";
		header('Location: ../crudcli.php');
	else:
		$_SESSION['Mensagem'] = "Erro ao atualizar";
		header('Location: ../crudcli.php');
	endif;
endif;