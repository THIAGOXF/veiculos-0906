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
	$nome = clear($_POST['Nome']);
	$login = clear($_POST['Login']);
	//$senha = clear($_POST['senha']);
    $senha = clear(password_hash($_POST['Senha'], PASSWORD_DEFAULT)); //-- Criptografia, so funcina com o clear()
	$telefone = clear($_POST['Telefone']);
  	$foto = clear($_POST['Foto']);
	$datanasc = clear($_POST['Datanasc']);

	$id = mysqli_escape_string($connect, $_POST['ID']);

	$sql = "UPDATE tbusuario SET Nome = '$nome', Login = '$login', Senha = '$senha', Telefone = '$telefone', Foto = '$foto', Data de nascimento = '$datanasc' WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['Mensagem'] = "Atualizado com sucesso!";
		header('Location: ../crudusu.php');
	else:
		$_SESSION['Mensagem'] = "Erro ao atualizar";
		header('Location: ../crudusu.php');
	endif;
endif;