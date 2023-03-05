# wordpress-calculadora# wordpress-calculadora
Una vez descargado el repositorio contine dos directorios:
- /wp-calculadora/: una con un plugin de WordPress que genera una calculadora
- /api/: otra con una API desarrollada con Slim FrameWork que da soporte de API-REST a las operaciones de la calculadora 
## Instalación de Plugin de Wordpress
1. Subir plugin a al directorio de plugins de WordPress normalmente /wp-content/plugins.
2. Ir a Wp-Admin > Plugins y activar el plugin.
3. Ir a WP-Admin > Ajustes > Calculadora y confgirar el plugin. Debemos meter primero la URL del API.
4. Metemos las operaciones disponibles en la API. Por cada endpoint de la API debemos meter el keyword que la define y el simbolo de la calculadora.
5. Podemos meter en la calculadora en cualquier parte que queramos con el código corto [calculadora].
6. También pordemos meterlo dentro del código del tema con:
    ```
    <?php echo do_shortcode("[calculadora]"); ?>
    ```

## Instalación de API.
1. Ejecutar "composer install" en /api/
2. Configurar el vhosts para que caiga en ./api/public/