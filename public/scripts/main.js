
window.App = {
	users: [],
	user: undefined
};

App.configHandlebars = function() {

	Handlebars.registerHelper('md5', function (string) {
        return md5(string);
    });
};

App.loadUsers = function() {

	var source = $('#users-template').html(),
		template = Handlebars.compile(source),
		userListEl = $('.users-list').html('');

	$('.signup-form').hide();
	$('.edit-form').hide();

	$.ajax({
		url: project_uri + 'users',

		success: function(data) {
			App.users = JSON.parse(data);

			for (var i = 0; i < App.users.length; i++) {
				var usersHTML = template(App.users[i]);
				userListEl.append(usersHTML);
			}

			App.UIevents();
		}
	});
};

App.flashMessage = function(message) {

	var messageEl = $('.message').text(message).slideDown();

	setTimeout(function() {
		messageEl.slideUp();
	}, 9000);
};

App.createUser = function(data) {

	$.ajax({
		url: project_uri + 'create',
		method: 'POST',
		data: data,

		success: function(response) {
			App.flashMessage(response);
			App.loadUsers();
		}
	});
};

App.editUser = function(data) {

	$.ajax({
		url: project_uri + 'edit',
		method: 'POST',
		data: data,

		success: function(response) {
			App.flashMessage(response);
			App.loadUsers();
		}
	});
};

App.destroyUser = function(id) {

	$.ajax({
		url: project_uri + 'destroy',
		method: 'POST',
		data: 'id=' + id,

		success: function(response) {
			App.flashMessage(response);
			App.loadUsers();
		}
	});
};

App.UIevents = function() {

	// submit signup form
	$('.signup-form').off('submit').on('submit', function(e) {
		e.preventDefault();

		var data = $(this).serialize()
		App.createUser(data);
	});

	// open signup form
	$('.signup-button').off('click').on('click', function() {
		$('.signup-form').show();
	});

	// users view
	$('.main-content-control').find('button').off('click').on('click', function() {
		var ths = $(this);
		ths.siblings().removeClass('active');
		ths.addClass('active');

		if (ths.data('func') === 'visualizar') {
			$('.users-list').removeClass('user-lines');
			return;
		}

		$('.users-list').addClass('user-lines');
	});

	// destroy user
	$('.destroy-user').off('click').on('click', function() {

		var id = $(this).data('id');
		App.destroyUser(id);
	});

	// submit edit form
	$('.edit-form').off('submit').on('submit', function(e) {
		e.preventDefault();

		var data = $(this).serialize()
		App.editUser(data);
	});

	$('.edit-user').off('click').on('click', function() {
		$(this).closest('.member').find('.edit-form').show();
	});
};

App.init = function() {
	this.configHandlebars();
	this.loadUsers();
	this.UIevents();

	$('.main-content-control').find('button').eq(0).click();
};

App.init();
