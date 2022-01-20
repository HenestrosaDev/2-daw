<?php
/**
 * Genera un hash seguro para el string. El coste es pasado
 * al algoritmo de Blowfish.
 *
 * @param string	$string_to_hash	String en texto plano
 * @param int			$cost 		Indica las veces que se ejecuta el hash (cuanto más veces, mejor). 11 por defecto (1126 ejecuciones por intento)
 * @return string						String hasheado
 */
function generate_blowfish_hash($string_to_hash, $cost=11){
	/*
	 * Para generar la sal (salt), se generan bytes aleatorios. Como base64
	 * genera un carácter por cada 6 bits, tenemos que generar al menos
	 * 22*6/8=16.5 bytes (17 redondeando). Generamos los primeros 22 
	 * caracteres en base64.
	 */
	$salt = substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
	/*
	 * Como Blowfish toma la salt con caracteres alfanuméricos y '.', 
	 * tenemos que reemplazar cada '+' generado por base64 con un '.'. 
	 * No nos tenemos que preocupar del signo '=' ya que solo se genera
	 * al final del string en base64, después de los primeros 22 caracteres.
	 */
	$salt = str_replace('+', '.', $salt);
	/*
	 * Creamos un string que será pasado como parámetro en el método crypt(),
	 * el cual contiene todos los ajustes realizados separados por '$'.
	 */
	$params = 
		'$'.implode(
			'$',
			array(
				"2y", // Blowfish
				str_pad($cost, 2, "0", STR_PAD_LEFT), // añadimos el $cost en 2 dígitos
				$salt 
			)
		);

	return crypt($string_to_hash, $params);
}

/**
 * Comprobamos el string introducida por el usuario
 * con el hash almacenado, generado por generate_hash().
 * 
 * @param string		$string_to_hash	String a validar
 * @param string 		$hash 					Hash de el string almacenada
 * @return boolean									true si el string coincide
 */
function validate_string($string_to_hash, $hash){
	/* 
	 * Si usamos el método crypt() pasando como parámetros el string 
	 * y el hash de el string, el resultado debería de ser igual al
	 * hash pasado como parámetro.
	 */
	return crypt($string_to_hash, $hash) == $hash;
}
?>