<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen junio | José Carlos López Henestrosa</title>
    <meta name="author" content="José Carlos López Henestrosa">
    
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' />
  </head>

  <body class='container'>

    <h1 class='display-3 mt-1 mb-4'>MVC básico</h1>

    <nav class='nav nav-pills'>
      <a class="navbar-brand">José Carlos López Henestrosa</a>
      <a class='nav-link' href='index.php?acción=mostrar_inicio'>Inicio</a>
      <a class='nav-link active' href='index.php?acción=mostrar_ver_libro'>Ver libro</a>
      <a class='nav-link' href='index.php?acción=mostrar_sobre_nosotros'>Sobre nosotros</a>
    </nav>

    <h2 class='display-5 mt-4 mb-3'>Ver libro</h2>

    <p>El libro es el siguiente:</p>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Título</th>
          <th scope="col">Autor/a</th>
          <th scope="col">Precio (en euros)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><?= $libro->get_id() ?></th>
          <td><?= $libro->get_titulo() ?></td>
          <td><?= $libro->get_autor() ?></td>
          <td><?= $libro->get_precio() ?></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>

