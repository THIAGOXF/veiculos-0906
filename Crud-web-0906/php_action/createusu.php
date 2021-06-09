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
	$nome = clear($_POST['nome']);
	$login = clear($_POST['login']);
	//$senha = clear($_POST['senha']);
    $senha = clear(password_hash($_POST['SSenha'], PASSWORD_DEFAULT)); //-- Criptografia, so funcina com o clear()
	$telefone = clear($_POST['Telefone']);
  	$foto = clear($_POST['Foto']);
	$datanasc = clear($_POST['Datanasc']);
	
	$sql = "INSERT INTO tbusuario (nome, Login, Senha, Telefone, Foto, Data de nasc) VALUES ('$nome', '$login', '$senha', '$telefone', '$foto', '$datanasc')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../crudusu.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../crudusu.php');
	endif;
endif;