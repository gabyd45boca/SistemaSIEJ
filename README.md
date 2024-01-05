
# Instalación
Una vez descargado el repositorio nos situamos dentro del proyecto descargado y procedemos con los siguientes pasos.

Instalar dependencias del Composer

```bash
composer install
```
Crear el archivo donde se encuentran nuestras variables de entorno

```bash
cp .env.example .env
```

Editamos los valores de la conexión a la BD en nuestro archivo .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_adminlte_test
DB_USERNAME=root
DB_PASSWORD=
```

Creamos nuestra base de datos.

Generamos el key de nuestra aplicación
```bash
php artisan key:generate
````

Instalamos las dependencias javascript

Si usas Yarn:
```bash
yarn 
```

Si usas NPM:
```bash
npm install
```

Finalmente con el siguiente comando haremos que nuestro proyecto se ejecute y se actualice en cada cambio que hagamos del frontend.

Si usas Yarn:
```bash
yarn dev
```
