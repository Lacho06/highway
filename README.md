ADMIN_NAME= nombre del usuario administrador
ADMIN_EMAIL= correo del usuario administrador
ADMIN_PASSWORD= password del usuario administrador

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= nombre de la base de datos
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=15a25d5feea6d1
MAIL_PASSWORD=6d843213c6f883
MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS= direccion de correo
MAIL_FROM_NAME="${APP_NAME}"


<p>Ejecute en la terminal el comando <b>php artisan migrate --seed</b> para migrar las tablas de su base de datos y ademas generar el usuario admin del sitio, si ademas desea generar datos falsos para todas las tablas de su base de datos, debe descomentar las lineas de codigo que se indican en el archivo <i>DatabaseSeeder.php</i> de su proyecto Laravel.</p>
<p>Ejecute el comando <b>php artisan storage:link</b> para crear el enlace hacia la carpeta storage en la ruta correspondiente</p>
<p>Ejecute el comando <b>php artisan adminlte:install</b></p>
<p>Ejecute el comando <b>php artisan ui bootstrap --auth</b></p>
<p>Ejecute el comando <b>php artisan vendor:publish --tag=laravel-pagination</b></p>
