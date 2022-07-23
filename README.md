DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= nombre de la base de datos
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=public
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120


<p>Ejecute en la terminal el comando <b>php artisan migrate --seed</b> para migrar las tablas de su base de datos y ademas generar el usuario admin del sitio, si ademas desea generar datos falsos para todas las tablas de su base de datos, debe descomentar las lineas de codigo que se indican en el archivo <i>DatabaseSeeder.php</i> de su proyecto Laravel.</p>
<p>Ejecute el comando <b>php artisan storage:link</b> para crear el enlace hacia la carpeta storage en la ruta correspondiente</p>
