<?php
require_once("./php/hash.php");

/* 
* El realm indica el área de acceso al que 
* se intenta acceder para comprobar si el 
* usuario está autorizado para acceder a
* dicha zona. Se usa por el cliente para 
* generar un hash, el cual es enviado de
* vuelta al servidor.
*/
$realm = "1b";

/* 
* ----------------------------------------------
* ----------------- IMPORTANTE -----------------
* ----------------------------------------------
* $users contiene usuarios predefinidos con el 
* fin de simplificar el propósito de la tarea. 
* Para un desarrollo óptimo y seguro en una 
* aplicación/sitio web, deberíamos realizar una 
* consulta a la base de datos, seleccionar el 
* nombre de usuario que introduce el usuario,
* comprobar que existe y, de ser así, comprobar 
* si el hash de nuestra contraseña coincide con 
* el hash almacenado en la base de datos. Este
* último punto se realizaría con el método
* validate_pw del archivo hash.php
*/
$users = array("admin" => "1234", "user" => "1234");

function auth_digest() {
	global $realm, $users;

	if (empty($_SERVER["PHP_AUTH_DIGEST"])) {
		request_credentials("No estás autentificado");
	}

	/*
	* Se extraen los datos almacenados en 
	* PHP_AUTH_DIGEST y se comprueba si el nombre 
	* de usuario introducido por el usuario 
	* coincide con algún nombre de usuario contenido 
	* en el array $users
	*/
	if (
		!($data = http_digest_parse($_SERVER["PHP_AUTH_DIGEST"])) 
		|| !isset($users[$data["username"]])
	) {
		request_credentials("El nombre de usuario es incorrecto.");
	}

	/*
	* Se genera la respuesta válida a partir de dos
	* variables. $A1 almacena el nombre de usuario, 
	* el realm y la contraseña, mientras que $A2
	* contiene el método request y la URI solicitada.
	* -----------------------------------------------
	* NOTA 1:
	* Si quisiéramos almacenar las credenciales del
	* usuario, tendríamos que guardar los valores de
	* la variable $A1, teniendo en cuenta que si se 
	* cambia el realm, los datos quedarán inservibles, 
	* a no ser que se actualice la columna respectiva
	* al realm.
	* -----------------------------------------------
	* NOTA 2:
	* Uso md5() en vez de crypt() con Blowfish porque
	* el HTTP header Digest no admite el algoritmo
	* bcrypt/Blowfish. Teniendo en cuenta este detalle,
	* he usado el algoritmo por defecto, MD5. Se pueden
	* leer más detalles al respecto en 
	* https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Digest#directives
	*/
	$A1 = md5("{$data['username']}:$realm:{$users[$data['username']]}");
	$A2 = md5("{$_SERVER['REQUEST_METHOD']}:{$data['uri']}");

	/* 
	* La respuesta final contiene los hashes obtenidos
	* a partir de las variables $A1 y $A2, además de los
	* siguientes datos:
	* 
	* nc (nounce count): Representación hexadecimal del
	* número de requests que el cliente ha enviado con 
	* el valor de un nonce.
	* ---------------------------------------------------
	* cnonce (client nonce): Mismo concepto que el nonce
	* pero generado por el cliente. Proporciona integridad
	* y autentificación mutua. Es requerida cuando el 
	* servidor envía el valor de qop.
	* ---------------------------------------------------
	* qop (quality of protection): Puede ser 'auth' (default)
	* o 'auth-int'. Este último añade una capa de integridad
	* ya que el cliente deberá de incluir el request body 
	* como parte del mensaje (message) digest. Esto permite
	* saber si el request ha sido manipulado.
	*/
	$valid_response = md5("$A1:{$data['nonce']}:{$data['nc']}:{$data['cnonce']}:{$data['qop']}:$A2");

	/*
	* Si la respuesta del servidor no es la misma que la del
	* cliente, paramos la ejecución y notificamos el problema
	* al usuario.
	*/
	if ($data["response"] != $valid_response) {
		request_credentials("Credenciales inválidos.");
	}

	// Credenciales válidas
	return "Has iniciado sesión como <strong>{$data['username']}</strong>";
}

function request_credentials($error_message) {
	global $realm;

	/* 
	 * Nonce (number only used once) es un número 
	 * (en este caso, un hash) que sirve para que
	 * las operaciones anteriores no puedan ser
	 * reusadas con tal de prevenir 'replay attacks'
	 */
	$nonce = uniqid();

	/* 
	 * Opaque es un string especificado por el 
	 * servidor que tiene que ser devuelto inmutado 
	 * por el cliente para evitar posibles secuestros
	 * e intercepciones de la comunicación.
	 */
	$opaque = generate_blowfish_hash(uniqid());

	header("HTTP/1.1 401 Unauthorized");
	header('WWW-Authenticate: Digest realm="' . $realm .
		'",qop="auth",nonce="' . $nonce . '",opaque="' . $opaque . '"');
		
	// Si el usuario cancela el proceso de autentificación:
	echo "<script>console.log($error_message)</script>";
	die($error_message);
}

/**
 * Parsea el header del http auth, incluyendo los datos del diálogo
 * @param string $txt Es $_SERVER["PHP_AUTH_DIGEST"]
 * @return 
 */
function http_digest_parse($txt) {
	// protect against missing data
	$needed_parts = array('nonce' => 1, 'nc' => 1, 'cnonce' => 1, 'qop' => 1, 'username' => 1, 'uri' => 1, 'response' => 1);
	$data = array();
	$keys = implode('|', array_keys($needed_parts));

	preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

	foreach ($matches as $m) {
		$data[$m[1]] = $m[3] ? $m[3] : $m[4];
		unset($needed_parts[$m[1]]);
	}

	return $needed_parts ? false : $data;
}
?>