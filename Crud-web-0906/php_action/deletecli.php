<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):
	
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM tbclientes WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['Mensagem'] = "Deletado com sucesso!";
		header('Location: ../crudcli.php');
	else:
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../crudcli.php');
	endif;
endif;