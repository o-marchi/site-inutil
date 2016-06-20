function serialize(form) {var field, s = []; if (typeof form == 'object' && form.nodeName == "FORM") {var len = form.elements.length; for (i=0; i<len; i++) {field = form.elements[i]; if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {if (field.type == 'select-multiple') {for (j=form.elements[i].options.length-1; j>=0; j--) {if(field.options[j].selected) s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value); } } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value); } } } } return s.join('&').replace(/%20/g, '+'); }

window.App = {

	els: [],

	defineElements: function() {
		this.els.signupBtn = document.getElementsByClassName('signup-button')[0];
		this.els.signinBtn = document.getElementsByClassName('signin-button')[0];
		this.els.signupTopBtn = document.getElementsByClassName('signup-top-button')[0];
		this.els.signinTopBtn = document.getElementsByClassName('signin-top-button')[0];
		this.els.signupForm = document.getElementsByClassName('signup-form')[0];
		this.els.signinForm = document.getElementsByClassName('signin-form')[0];
		this.els.message = document.getElementsByClassName('message')[0];
		this.els.editArea = document.getElementsByClassName('edit')[0];
		this.els.editBtn = document.getElementsByClassName('edit-button')[0];
		this.els.editForm = document.getElementsByClassName('edit-form')[0];
	},

	openSigninForm: function() {
		this.els.signinForm.style.display = 'block';
		this.els.signupForm.style.display = 'none';
	},

	openSignupForm: function() {
		this.els.signupForm.style.display = 'block';
		this.els.signinForm.style.display = 'none';
	},

	events: function() {

		// open form
		if (typeof this.els.signupBtn !== 'undefined') {
			this.els.signupBtn.addEventListener('click', function() {
				this.openSignupForm();
			}.bind(this), false);
		}

		if (typeof this.els.signupTopBtn !== 'undefined') {
			this.els.signupTopBtn.addEventListener('click', function() {
				this.openSignupForm();
			}.bind(this), false);
		}

		if (typeof this.els.signinBtn !== 'undefined') {
			this.els.signinBtn.addEventListener('click', function() {
				this.openSigninForm();
			}.bind(this), false);
		}

		if (typeof this.els.signinTopBtn !== 'undefined') {
			this.els.signinTopBtn.addEventListener('click', function() {
				this.openSigninForm();
			}.bind(this), false);
		}

		// form submit
		if (typeof this.els.signinForm !== 'undefined') {
			this.els.signinForm.addEventListener('submit', function(e) {
				e.preventDefault();
				this.signIn(this.els.signinForm);
			}.bind(this), false);
		}

		if (typeof this.els.signupForm !== 'undefined') {
			this.els.signupForm.addEventListener('submit', function(e) {
				e.preventDefault();
				this.signUp(this.els.signupForm);
			}.bind(this), false);
		}

		// edit
		if (typeof this.els.editBtn !== 'undefined') {
			this.els.editBtn.addEventListener('click', function() {
				this.els.editArea.style.display = 'block';
			}.bind(this), false);
		}

		if (typeof this.els.editForm !== 'undefined') {
			this.els.editForm.addEventListener('submit', function(e) {
				e.preventDefault();
				this.edit(this.els.editForm);
			}.bind(this), false);
		}
	},

	signUp: function(element) {

		var data = serialize(element);

		var request = new XMLHttpRequest();
		request.open('POST', project_uri + 'newuser', true);
		request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		request.onload = function() {

			if (request.status >= 200 && request.status < 400) {

				if (request.responseText === '1') {
					this.flashMessage('Uhuulll, bem vindo! Entre baby.');
					this.openSigninForm();
					return;
				}

				this.flashMessage(request.responseText);
				return;
			}

			this.flashMessage(request.responseText);

			return;
		}.bind(this);

		request.onerror = function() {
			this.flashMessage('Aconteceu um erro, desculpe :(');
		}.bind(this);

		request.send(data);
	},

	signIn: function(element) {

		var data = serialize(element);

		var request = new XMLHttpRequest();
		request.open('POST', project_uri + 'login', true);
		request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		request.onload = function() {

			if (request.status >= 200 && request.status < 400) {

				if (request.responseText === '1') {
					this.flashMessage('Bem vindo!');
					location.reload();
					return;
				}

				this.flashMessage(request.responseText);
				return;
			}

			this.flashMessage(request.responseText);

			return;
		}.bind(this);

		request.onerror = function() {
			this.flashMessage('Aconteceu um erro, desculpe :(');
		}.bind(this);

		request.send(data);
	},

	edit: function(element) {

		var data = serialize(element);
		var uri = element.getAttribute('action');

		var request = new XMLHttpRequest();
		request.open('POST', uri, true);
		request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		request.onload = function() {

			if (request.status >= 200 && request.status < 400) {

				if (request.responseText === '1') {
					location.reload();
					return;
				}

				this.flashMessage(request.responseText);
				return;
			}

			this.flashMessage(request.responseText);

			return;
		}.bind(this);

		request.onerror = function() {
			this.flashMessage('Aconteceu um erro, desculpe :(');
		}.bind(this);

		request.send(data);
	},

	flashMessage: function(message) {

		this.els.message.style.display = 'block';
		this.els.message.innerText = message;

		setTimeout(function() {
			this.els.message.style.display = 'none';
		}.bind(this), 6000);
	},

	init: function() {
		this.defineElements();
		this.events();
	}
};

App.init();
