<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>MVC básico</title>
    <link href='bootstrap/bootstrap.min.css' rel='stylesheet' type='text/css' />
  </head>
  <body>
    <nav class='navbar navbar-expand-md navbar-dark bg-dark mb-4'>
      <a class='navbar-brand'>MVC básico</a>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='index.php'>Inicio</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='index.php?acción=mostrar_modelo'>Mostrar modelo</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='index.php?acción=modificar_modelo'>Modificar y mostrar modelo</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='index.php?acción=mostrar_about'>Sobre la plantilla</a>
        </li>
      </ul>
    </nav>

    <main role='main' class='container'>
      <h1 class='mt-5'>¡Bienvenido a la página de inicio!</h1>
      <p class='lead'>Éste es una plantilla creada.</p>
      <p>Ésta es la página de bienvenida para el navegante.</p>
    </main>

  </body>
</html>
