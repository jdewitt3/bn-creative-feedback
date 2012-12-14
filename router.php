<?php
	if($_REQUEST['method']){
		foreach(glob('service/*.php') as $filename){
			require_once($filename);
		}
		echo json_encode(call_user_func($_REQUEST['method'],$_REQUEST['params']));
	}else{
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
?>