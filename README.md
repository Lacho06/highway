Renombre el archivo <i>.env.example</i> a <i>.env</i> y configurelo de una forma similar a la siguiente

APP_NAME=Highway
APP_ENV=local
APP_KEY=base64:rmM2o7W4qdmSyV4O9thMyN2aSgpIZ2/eHk8QPiPg5JQ=
APP_DEBUG=true
APP_URL=http://localhost/highway/public

ADMIN_NAME= nombre del usuario administrador
ADMIN_EMAIL= correo del usuario administrador
ADMIN_PASSWORD= password del usuario administrador

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

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

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=15a25d5feea6d1
MAIL_PASSWORD=6d843213c6f883
MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS= direccion de correo
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

Ejecute en la terminal el comando <b>php artisan migrate --seed</b> para migrar las tablas de su base de datos y ademas generar el usuario admin del sitio, si ademas desea generar datos falsos para todas las tablas de su base de datos, debe descomentar las lineas de codigo que se indican en el archivo <i>DatabaseSeeder.php</i> de su proyecto Laravel.
Ejecute el comando <b>php artisan storage:link</b> para crear el enlace hacia la carpeta storage en la ruta correspondiente
Ejecute el comando <b>composer require jeroennoten/laravel-adminlte</b>
Ejecute el comando <b>php artisan adminlte:install</b>
Ejecute el comando <b>composer require laravel/ui</b>
Ejecute el comando <b>php artisan ui bootstrap --auth</b>
Ejecute el comando <b>php artisan vendor:publish --tag=laravel-pagination</b>
