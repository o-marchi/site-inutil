<?php

class UserController extends BaseController {

	public static function show() {

		$users = User::all();
		
		echo json_encode($users);
		return;
	}

	public static function create() {

		if ($_POST['password'] != $_POST['repeat-password']) {
			echo 'As senhas não são iguais, tente de novo.';
			return;
		}

		if (empty($_POST['name']) ||
			empty($_POST['email']) ||
			empty($_POST['password']) ||
			empty($_POST['repeat-password']) ||
			empty($_POST['food'])) {
			echo 'Preencha todos os campos';
			return;
		}

		$success = User::create($_POST);

		if ( ! $success) {
			echo 'Algo deu errado, estamos ligando para o FBI agora mesmo';
			return;
		}

		echo 'Bem vindo ao clube '.$_POST['name'].'!';
		return;
	}

	public static function destroy() {

		$id = $_POST['id'];
		User::destroy($id);

		echo 'Lá se vai mais um usuário :(';
		return;
	}

	public static function edit() {

		if (empty($_POST['name']) ||
			empty($_POST['food'])) {
			echo 'Preencha todos os campos';
			return;
		}

		$success = User::edit($_POST['id'], $_POST['name'], $_POST['food']);

		echo 'Ok, atualizamos as informações';
		return;
	}

}