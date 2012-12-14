<?php

function login($params){
	//TESTING
	if($params['username'] == 'joe' && $params['password'] == 'admin'){
		$return['message'] = 'login successful';
		$return['success'] = 'true';
	}else{
		$return['message'] = 'login failed';
		$return['success'] = 'false';
	}

	return $return;
}

function logout(){

}

?>