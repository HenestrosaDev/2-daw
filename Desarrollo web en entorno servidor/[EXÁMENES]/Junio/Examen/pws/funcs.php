<?php

/**
 * Lanza una petición GET (protocolo HTTP) sincrona a la url indicada por parámetro,
 * encapsulando el contenido de la respuesta HTTP en una cadena de texto que se
 * retornará como resultado.
 * 
 * Esta función puede ser usada para consultar servicios web tipo REST u otro
 * tipo de APIs WEB.
 * 
 * Adionalmente se puede indicar un array con el conjunto de parámetros en URL 
 * a añadir a la petición GET.
 * 
 * <B>Ejemplo de uso.</B>
 * 
 * Imagina que quieres realizar la siguiente petción GET con este método:
 *  
 * http://www.ejemplo.ej/api?param1=value1&param2=value2
 * 
 * El parámetro URL debería ser: http://www.ejemplo.ej/api
 * Y el array de parámetros debería ser: ["param1"=>"value1", "param2"=>"value2"]
 * 
 * @param string $url Cadena de texto que contiene una URL válida.
 * @param array $params Array con los parámetros en formato key/value añádidos
 * a la URL en formato URL Encoding.
 * @return string Cadena con la respuesta HTTP del servidor, en caso de fallo
 * retornará false.
 */
function get($url, $params = null) {
    
    //Iniciamos el manejador cURL
    $ch = curl_init();
    
    //Procesamos los parámetros para transformalos, si los hay, en formato URL encoding
    $tail = is_array($params) && !empty($params) ? '?' . http_build_query($params) : '';

    //Establecemos la URL donde se iniciará la peticíon, añadiendo los 
    //parámetros en formato URL encoding (si los hay)
    curl_setopt($ch, CURLOPT_URL, $url . $tail);
    
    //En caso de que la primera peticíon HTTP retorne una cabecera "Location:"
    //redirecciona la petición a esa nueva URL
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    
    //Necesitamos que la respuesta HTTP sea retornada como una cadena de texto
    // para poder procesarla a posteriori antes de mostrarla:
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    //Ejecutamos la consulta cURL y obtenemos el resultado (false si falla).
    $output = curl_exec($ch);
    
    //Cerramos el manejador, principalmente para liberar memoria.
    curl_close($ch);
    
    //Retornamos el contenido de la respuesta HTTP
    return $output;
}

/**
 * Lanza una petición POST (protocolo HTTP) sincrona a la url indicada por parámetro,
 * encapsulando el contenido de la respuesta HTTP en una cadena de texto que se
 * retornará como resultado.
 * 
 * Esta función puede ser usada para consultar servicios web tipo REST u otro
 * tipo de APIs WEB.
 * 
 * Se debe indicar el contenido a enviar en el cuerpo de la petición HTTP (si 
 * no se envía nada, debe usarse el metodo get). El contenido irá en el 
 * parámetro $postData y puede ser:
 * 
 * - Un array asociativo (key/value) que será transformado a URL encoding si
 * el parámetro $json es false.
 * - Un objeto php que será formateado como JSON si el parámetro $json es
 * true.
 * 
 * @param string $url Cadena de texto que contiene una URL válida.
 * 
 * @param mixed $postData un array con el contenido a enviar en formato URL
 * encoding (si $json es false) o bien un objeto a transforma en JSON (si 
 * $json es true)
 * 
 * $param boolean $json Valor opcional (por defecto es false) que indica como
 * debe ser tratado el parámetro $postData. Si es true, será tratado como un 
 * objeto que se convierte a JSON, si es false será tratado como un array
 * asociativo que debe ser transformado a formato URL encoding.
 * 
 * @return string Cadena con la respuesta HTTP del servidor, en caso de fallo
 * retornará false.
 */
function post($url, $postdata, $json = false) {
    
    //Iniciamos el manejador cURL
    $ch = curl_init();
    
    //Establecemos la URL donde se iniciará la peticíon, añadiendo los 
    //parámetros en formato URL encoding (si los hay)
    curl_setopt($ch, CURLOPT_URL, $url);
        
    // Se establece el protocolo de la petición HTTP a POST
    // (Nota: por defecto es GET)
    curl_setopt($ch, CURLOPT_POST, 1);
    
    /* Añadimos los datos que serán enviados en el cuerpo de la petición HTTP.
     * Aquí podemos se envían los datos en forma URL encoding (para lo que 
     * solo hay que proporcionar un array asociativo key/value) o bien en plano 
     * (como es el caso de JSON).   
     * El parámetro $json determina si se envía una cosa u otra.
     */   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json ? json_encode($postdata) : $postdata);
    
    //En caso de que la primera peticíon HTTP retorne una cabecera "Location:"
    //redirecciona la petición a esa nueva URL
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    
    //Si el contenido a enviar en el body de la petición HTTP es JSON 
    //añadimos la cabecera mime para indicar el tipo de datos del cuerpo de la petición.
    //Nota: lo estandar es que los datos vayan en formato URL Encoding.
    $json && curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
     //Necesitamos que la respuesta HTTP sea retornada como una cadena de texto
    // para poder procesarla a posteriori antes de mostrarla:
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    //Ejecutamos la consulta cURL y obtenemos el resultado (false si falla).
    $output = curl_exec($ch);
    
    //Cerramos el manejador, principalmente para liberar memoria.
    curl_close($ch);
    
    //Retornamos el contenido de la respuesta HTTP
    return $output;
}