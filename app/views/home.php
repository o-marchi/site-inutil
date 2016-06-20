<header class="main-line">
	<p>Bem vindo ao mais impressionante</p>
	<h1>Site Inútil</h1>
	<p>O único site que você se cadastra e não faz mais nada, incrível né?</p>
</header>

<main class="container">

	<section class="signin-section" id="signin-section">

		<button class="signup-button">Cadastre-se!</button>

		<p>
			Neste site você também pode editar <em>qualquer</em> usuário, legal né.
		</p>

		<form action="" class="action-form signup-form">

			<fieldset>
				<label for="name">Conte-nos o seu nome</label>
				<input type="text" name="name" value="Luigi" required>
			</fieldset>

			<fieldset>
				<label for="email">Ok, agora nós precisamos do seu e-mail</label>
				<input type="email" name="email" value="luigi@gatos.lindos" required>
			</fieldset>

			<fieldset>
				<label for="password">Senha (escolha uma bem difícil)</label>
				<input type="password" name="password" value="123456" required>
			</fieldset>

			<fieldset>
				<label for="repeat-password">Agora quero ver você conseguir repetir ela</label>
				<input type="password" name="repeat-password" value="123456" required>
			</fieldset>
			
			<fieldset>
				<label for="food">Por último, qual sua comida favorita?</label>
				<input type="text" name="food" value="Biscoito" required>
			</fieldset>

			<button type="submit">Yeah, let's do this!</button>
		</form>
	</section>

	<section class="main-content">
		<h2><em>Estes são nossos ilustres membros:</em></h2>

		<div class="main-content-control">
			<button data-func="visualizar">Visualizar</button>
			<button data-func="editar">Editar</button>
		</div>
		
		<script id="users-template" type="text/x-handlebars-template">

			<article class="member col-sm-3 clearfix">
				<img src="https://www.gravatar.com/avatar/{{md5 email}}?d=retro"
					 alt="{{name}}"
					 class="img-circle">
				
				<div class="member-info">
					<h3>{{name}}</h3>
					<p>Olá, eu adoro {{food}}</p>
				</div>

				<div class="member-actions">
					<button data-id="{{id}}" class="edit-user">Editar</button>
					<button class="destroy-user">Excluir</button>
				</div>

				<div class="clearfix"></div>

				<div class="member-form">

					<form action="" class="action-form edit-form">

						<input type="hidden" name="id" value="{{id}}" required>

						<fieldset>
							<label for="name">Qual o seu nome mesmo?</label>
							<input type="text" name="name" value="{{name}}" required>
						</fieldset>

						<fieldset>
							<label for="food">Qual sua comida favorita agora?</label>
							<input type="text" name="food" value="{{food}}" required>
						</fieldset>

						<button type="submit">Pronto!</button>
					</form>
				</div>
			</article>
		</script>

		<div class="row users-list"></div>
	</section>

</main>
