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
			console.log(response.message);
		}, 'json');
	},

	upload: function(){

	},

	comment: function(){

	}

}