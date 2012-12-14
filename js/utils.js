var utils = {

	ajax_uri: '/router.php',

	login: function(username, password){
		$.post(utils.ajax_uri, {
			method: 'login',
			params: {
				username: username,
				password: password
			}
		}, function(response){
		}, 'json');
	},

	upload: function(){

	},

	comment: {

		add: function(){
			$.post(utils.ajax_uri, {
				method: 'addComment',
				params: {

				}
			}, function(response){
			}, 'json');
		},

		edit: function(){

		},

		remove: function(){

		}

	},

	search: function(){

	}

}