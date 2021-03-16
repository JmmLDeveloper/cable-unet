## Hosting
El proyecto tambien esta hosteado en digital ocean bajo esta direccion
http://104.131.58.178/ , pero no puedo dar garantia de que sirva
cuando se lee esto ya que aveces la base de datos se cae por falta de
memoria , los usuarios son los siguientes :

<div style="color:#ff6347;"> **admin@gmail.com ( password: '12345678' ) **</div>
<div style="color:#ff6347;">** sub@gmail.com ( password: '12345678' ) **</div>

## Instrucciones

Tener laravel y composer instalado globalmente en la pc

Clonar repo en un directorio
```
git clone https://github.com/JmmLDeveloper/cable-unet .
```

Copiar configuracion
```
cp .env.example .env
```

En el archivo .env se debe cambiar las variables de mysql correspondientemente
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

Instalar dependencias del proyecto
```
composer i
```

Generar Keys
```
php artisan key:generate
```

Correr migraciones
```
php artisan migrate
```

Darle valores a la base de datos
esto creara 2 usuarios:
<div style="color:#ff6347;"> **admin@gmail.com ( password: '12345678' )** </div>
<div style="color:#ff6347;"> **sub@gmail.com ( password: '12345678' )** </div>
<div></div>
ademas de los canales por defecto , las migraciones pueden tardar en correr de 1 - 5 min
debido a que genera las programaciones para cada dia de la semana , lo que resulta en
alrededor de 1700 programaciones para 15 canales

```
php artisan db:seed
```



