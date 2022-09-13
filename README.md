# Pasos para levantar proyecto

## Installation
Necesitas tener instalado [composer](https://getcomposer.org/) para la gestión de paquetes necesarios.

## Pasos a seguir
Si se cumple con estos requisitos, entraremos a nuestro proyecto y en la terminal ejecutamos este comando:
```bash
git clone https://github.com/davymtz/fidelity_test.git fidelity_test
composer install
```
### Importante
Si tu proyecto esta ubicado en un subdirectorio de tu servidor web, deberás ir al archivo index.php ubicado en la raíz del proyecto y descomentar lo siguiente:
```php
// Descomentar estra linea
// $app->setBasePath('/fidelity_test');
```

Entrar desde esta ruta si está en subdirectorio:
{mi_dominio}/fidelity_test/login
Caso contrario:
{mi_dominio}/login

Pasar cerrar las sesiones ir camibar /login por /logout