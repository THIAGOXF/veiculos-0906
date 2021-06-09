<?php
// Header
include_once 'includes/header.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Novo Cliente </h3>
		<form action="php_action/createcli.php" method="POST">
			<div class="input-field col s12">
				<input type="Text" name="Nome" id="Nome" value="xiril">
				<label for="Nome">Nome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="Sobrenome" id="Sobrenome">
				<label for="Sobrenome">Sobrenome</label>
			</div>

			<div class="input-field col s12">
				<input type="Text" name="Email" id="Email">
				<label for="Email">Email</label>
			</div>

			<div class="input-field col s12">
				<input type="Text" name="idade" id="Idade">
				<label for="Idade">Idade</label>
			</div>

			<button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
			<a href="crudcli.php" class="btn green"> Lista de clientes </a>
		</form>
		
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>
