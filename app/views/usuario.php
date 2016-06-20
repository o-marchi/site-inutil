
<main class="container">

	<section class="main-content">

		<section class="big-member">
			<img src="https://www.gravatar.com/avatar/<?= md5($user['email']) ?>?d=retro&size=250" alt="<?= $user['name'] ?>" class="img-circle">

			<h3><?= $user['name'] ?></h3>
			<p>Olá, eu realmente adoro <?= $user['food'] ?></p>
		</section>


		<?php 
			if (
				(array_key_exists('valid', $_SESSION) &&
				array_key_exists('username', $_SESSION)) &&
				$_SESSION['useremail'] == $user['email']
			) :
		?>

			<p> Ok, eu admito, menti para você. Neste site você tem algo pra fazer, você pode: <br> </p>
			<p> <button class="edit-button">Editar os seus dados</button> </p>

			<section class="signin-section edit">

				<p>Ok, vamos lá:</p>

				<p class="message alert alert-warning"></p>

				<form action="<?= $project_uri . 'edit/' . $_SESSION['userid'] ?>" method="post" class="edit-form">

					<fieldset>
						<label for="name">Você vai trocar até o seu nome?</label>
						<input type="text" name="name" value="<?= $user['name'] ?>" required>
					</fieldset>
					
					<fieldset>
						<label for="food">Eu sei como é, os nossos gostam mudam né?</label>
						<input type="text" name="food" value="<?= $user['food'] ?>" required>
					</fieldset>

					<button type="submit">Editar agora!</button>
				</form>
			</section>

		<?php endif ?>

		<hr>

		<h2><em>Nossos usuários, os melhores indivídos da espécie humana:</em></h2>
		
		<div class="row">
			<?php foreach ($users as $user) : ?>
				<a href="<?= $project_uri . 'user/' . $user['id'] ?>" class="member col-sm-3">
					<img src="https://www.gravatar.com/avatar/<?= md5($user['email']) ?>?d=retro" alt="<?= $user['name'] ?>" class="img-circle">

					<h3><?= $user['name'] ?></h3>
					<p>Olá, eu adoro <?= $user['food'] ?></p>
				</a>
			<?php endforeach ?>
		</div>
	</section>
	
</main>
