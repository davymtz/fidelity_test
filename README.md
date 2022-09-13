# Pasos para levantar proyecto

## Installation
Necesitas tener instalado [composer](https://getcomposer.org/) para la gestión de paquetes necesarios.

## Pasos a seguir
Si se cumple con estos requisitos, entraremos a nuestro proyecto y en la terminal ejecutamos este comando:
```bash
composer install
```
### Importante
Si tu proyecto esta ubicado en un subdirectorio de tu servidor web, deberás ir al archivo index.php ubicado en la raíz del proyecto y descomentar lo siguiente:
```php
// Agregar el nombre de la carpeta del proyecto descargado
// $app->setBasePath('/nombre_del_proyecto');
```