<?php

	if(isset($_REQUEST['login'])){
		header('Content-Type: text/html');
		fazer_login($_REQUEST['usuario'], $_REQUEST['senha']);
	}

	fazer_login($usuario, $senha){
		$client = new SoapClient('http://179.127.32.9:8080/OpusServer/services/LoginTecnicoService?wsdl');
			
		$params = array(
   			'usuario'=>$_REQUEST['usuario'],
   			'senha'=>$_REQUEST['senha']
		); 
		
		$result = $client->fazerLogin($params);
		
		if((bool)$result->fazerLoginReturn){


			$_SESSION['tecnico'] = $_REQUEST['usuario'];
			
			return 'ok';
		}
	}
?>