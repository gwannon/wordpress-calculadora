# wordpress-calculadora

Desarrollado para:
- PHP 8.1.14
- Apache 2.4.52
- WordPress 6.1.1
- Slim framework 4.10.0

Una vez descargado el repositorio contine dos directorios:
- /wordpress-calculadora/wp-calculadora/: con el plugin de WordPress que genera una calculadora
- /wordpress-calculadora/api/: con la API desarrollada con Slim FrameWork que da soporte de API-REST a las operaciones de la calculadora 

## Instalación de Plugin de Wordpress
1. Subir plugin al directorio de plugin de WordPress normalmente /wp-content/plugins.
2. Ir a Wp-Admin > Plugins y activar el plugin.
3. Ir a WP-Admin > Ajustes > Calculadora y configurar el plugin. Debemos meter primero la URL del API.
4. Metemos las operaciones disponibles en la API. Por cada endpoint de la API debemos meter el keyword que la define y el simbolo de la calculadora.
5. Podemos meter en la calculadora en cualquier parte que queramos con el código corto [calculadora].
6. También pordemos meterlo dentro del tema con wel código:
    ```
    <?php echo do_shortcode("[calculadora]"); ?>
    ```

## Instalación de API.
1. Ejecutar "composer install" en /wordpress-calculadora/api/
2. Configurar el vhosts para que caiga en /wordpress-calculadora/api/public/

### Endpoints

* GET add/[operador1]/[operador2]/ -> suma operador1 y operador2
* GET subtract/[operador1]/[operador2]/ -> resta operador1 y operador2
* GET multiply/[operador1]/[operador2]/ -> multiplica operador1 por operador2
* GET divide/[operador1]/[operador2]/ -> divide operador1 entre operador2
* GET pow/[operador1]/[operador2]/ -> eleva operador1 a la potencía operador2
