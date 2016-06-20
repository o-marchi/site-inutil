<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Site Inútil</title>
	<link rel="stylesheet" href="<?= $project_uri ?>bootstrap/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= $project_uri ?>styles/main.css">
	<link rel="icon" type="image/x-icon" href="<?= $project_uri ?>favicon.ico" />
	<script>
		window.project_uri = '<?= $project_uri ?>';
	</script>
</head>
<body>

	<p class="message alert">Teste</p>

	<?= $yield ?>

	<footer>
		<hr>

		<p>
			E aí galera, para fazer este site eu <strong>não usei nenhum framework PHP</strong>, mas <strong>criei sozinho o meu próprio sistema MVC</strong>. <br>
			Se vocês quiserem ver como o código ficou visitem esta pagina: <a href="https://github.com/o-marchi/site-inutil">https://github.com/o-marchi/site-inutil</a><br>
		</p>
	</footer>

	<script src="<?= $project_uri ?>scripts/libs/jquery-3.0.0.min.js"></script>
	<script src="<?= $project_uri ?>scripts/libs/handlebars-v4.0.5.js"></script>
	<script src="<?= $project_uri ?>scripts/libs/md5.js"></script>
	<script src="<?= $project_uri ?>scripts/main.js"></script>
	
</body>
</html>