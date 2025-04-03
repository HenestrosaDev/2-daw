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
      <h1 class='mt-5'>Sobre la plantilla</h1>
      <p class='lead'>Información estática sobre la plantilla</p>
      <p>Plantilla creada por Manuel Ignacio López Quintero bajo licencia <a href='https://es.wikipedia.org/wiki/Beerware'>Beerware</a>:</p>
      <pre>* ----------------------------------------------------------------- *
* "LICENCIA BEER-WARE":                                             *
* Siempre y cuando mantengas este aviso, puedes hacer lo que        *
* quieras con este código. Si nos encontramos algún día, y piensas  *
* que esto vale la pena, me puedes invitar una cerveza a cambio.    *
* ----------------------------------------------------------------- *</pre>
    </main>

  </body>
</html>

