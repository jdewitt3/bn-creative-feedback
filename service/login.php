<?php

function login($params){
	require_once('../data/lib/Session.php');
	$session = new Session();
	if($session->Login($params['username'],$params['password'])){
		$return['message'] = 'login successful';
		$return['success'] = 'true';
	}else{
		$return['message'] = 'login failed';
		$return['success'] = 'false';
	}

	return $return;
}

function logout($params){
	require_once('../data/lib/Session.php');
	$session = new Session();
	if($session->Logout(){
		$return['message'] = 'logout successful';
		$return['success'] = 'true';
	}else{
		$return['message'] = 'logout failed';
		$return['success'] = 'false';
	}

	return $return;
}

?>