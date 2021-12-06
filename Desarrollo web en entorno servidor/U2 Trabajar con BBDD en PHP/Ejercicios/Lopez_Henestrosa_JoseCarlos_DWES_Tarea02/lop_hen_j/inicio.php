<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
	<title>Unidad 2 | Ejercicio 1: Índice</title>
	<?php
	require_once("./php/get_relative.php");
	$relative = get_relative(__FILE__);
	include $relative . "/common/head.php";
	?>
</head>

<?php
require_once($relative . "/php/connect_db.php");

$query = 'SELECT * FROM students ORDER BY ?';
$statement_handler = $database_handler->prepare($query);
$statement_handler->execute(array(150));

$rows = $statement_handler->fetchAll();
$num_rows = count($rows);

/* ONLY ONE ROW
$row = $statement_handler->fetch(PDO::FETCH_ASSOC);
// ONLY A FIELD FROM THAT ROW
print_r($row['campo']);
*/

for ($i = 0; $i <= $num_rows; $i++) { ?>
	<p>El cuerpo del mensaje con id <?= $rows[$i]['id'] ?> es <?= $rows[$i]['cuerpo'] ?> </p>
<?php } ?>

<body>
	<?php include $relative . "/common/sidenav.php"; ?>

	<div id="main" class="main">
		<div class="header">
			<h1>Índice</h1>
		</div>
		<p>Desde la barra de navegación se pueden acceder a los ejercicios con sus respectivos apartados sin necesidad
			de acceder al índice constantemente. Puedes cambiar el tema de la página gracias al botón de la esquina
			superior derecha.</p>
	</div>

	<?php include $relative . "/common/footer.html"; ?>
	<?php include $relative . "/common/floating-buttons.html"; ?>
</body>

</html>