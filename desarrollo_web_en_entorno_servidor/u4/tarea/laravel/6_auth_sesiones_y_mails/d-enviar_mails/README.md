# 6 d) Enviar mails

## Mailgun API

1. Crear una cuenta en **Mailgun** y verificar tanto al correo con el que vais a enviar correos como a los receptores de los correos (tened en cuenta que esto solo se aplica con las cuentas gratuitas, ya que con las cuentas de pago no es necesario).

2. Ejecutar `composer require symfony/mailgun-mailer symfony/http-client`

3. Configurar el archivo `.env` con los siguientes parámetros:
	```
	MAIL_FROM_ADDESS=correo@ejemplo.com
	MAIL_FROM_NAME=el-nombre-que-querais
	MAIL_MAILER=mailgun
	MAILGUN_DOMAIN=sandbox*********.mailgun.org
	MAILGUN_SECRET=***********************
	MAIL_ENDPOINT=api.mailgun.net 
	MAIL_ENCRYPTION=tls
	```
	Tened en cuenta que, dependiendo de vuestra región, quizás tengáis que cambiar el `ENDPOINT` a `api.mailgun.net`. Yo en mi caso, aún viviendo en España, he tenido que usar `api.mailgun.net` 

4. Ejecutar el comando `php artisan config:cache`

5. Poner lo mismo que pone Juan en el archivo web.php

## Comandos

- Si usamos el servicio mailgun, hay que instalar lo siguiente:
`composer require symfony/mailgun-mailer symfony/http-client`
- Tras modificar el archivo .env, hay que ejecutar `php artisan config:cache`