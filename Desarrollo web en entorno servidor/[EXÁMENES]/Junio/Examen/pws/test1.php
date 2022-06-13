<?php
include_once './funcs.php';
$remote='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].str_replace('pws/test1.php','ejercicios4y5/webservice.php',$_SERVER['PHP_SELF']);

//Consulta al servicio web usando file_get_contents
//$query=http_build_query($params);
//$uri=$remote.'?'.$query;
//$datos=file_get_contents($uri);
//echo "<BR>";
//echo $datos;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Test 1 modificado | José Carlos López Henestrosa</title>
		<meta name="author" content="José Carlos López Henestrosa">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<main>
			<form method="get">
				<label for="id_input">Id:</label>
				<input id="id_input" type="number" name="id">
				<button type="submit" name="submit" value="submit">Enviar</button>
			</form>

			<?php
			//Consulta al servicio web usando la función proporcionada "get"
			if (!empty($_GET['submit'])) {
				$params=['id'=> $_GET['id']];
				//Consulta al servicio web usando CURL (función get proporcionada en funcs.php)
				$datos=get($remote,$params);
				echo $datos;
			}
			?>
		</main>
	</body>
</html>