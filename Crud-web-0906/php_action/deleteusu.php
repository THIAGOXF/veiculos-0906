<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):
	
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM tbusuario WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['Mensagem'] = "Deletado com sucesso!";
		header('Location: ../crudusu.php');
	else:
		$_SESSION['Mensagem'] = "Erro ao deletar";
		header('Location: ../crudusu.php');
	endif;
endif;