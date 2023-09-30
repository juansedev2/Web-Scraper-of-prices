
# Rama Production (Producción)

---

## Proceso de instalación y prueba rápida en producción

**Esta es la versión de producción v1.0** y para poder instalarla, dependerá del servidor donde lo deseas probar. Concretamente si lo que necesitas es probar en uno de tipo Apache por ejemplo, se puede utilizar un dominio local para hacer pruebas de simulación como por ejemplo con un host virtual.

Para ello por favor seguir los siguientes pasos (PARA APACHE CON XAMPP):

- Crear un dominio local:

Accede al archivo de hosts como administrador, que en Windows está ubicado en: C:\Windows\System32\drivers\etc como administrador y allí modificar el archivo de texto llamado: hosts.

Agrega un dominio local después del siguiente que haya registrado:

```conf
127.0.0.1 nombre_dominio.test    (reemplaza nombre_dominio)
```

Por ejemplo:

```conf
127.0.0.1 pricescraper.test
```

**Advertencia: NO** uses dominios terminados en .com, puede dar lugar a problemas/colisiones

- Encender el programa XAMPP y encender el servidor Apache:

- Agregar un host virtual:

En este paso debes seleccionar el directorio donde alojaste la aplicación, la cual debes cargarla en el servidor, es decir desde el directorio del mismo: "C:/xampp/htdocs", luego acceder al archivo httpd-vhosts.conf que en Windows está en el direcotorio: C:\xampp\apache\conf\extra, editarlo y agregar un host virtual:

```conf
    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs/"
        ServerName localhost
    </VirtualHost>
    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs/Proyectos/WebScraper"
        ServerName appusers.test
    </VirtualHost>.1 pricescraper.test
```

**_Proyectos es solo un directorio personal, puede ser otro diferente_**

- Apagar el servicio Apache y reiniciarlo (o incluso reiniciar XAMPP), luego volver a acceder

- Acceder vía navegador web a la aplicación de acuerdo al nobmre del servidor via URL, que según el ejemplo, sería

```conf
    http://pricescraper.test
```

- Si finalmente todo ha salido bien, debes poder acceder a la vista inicial de la aplicación

**Ante cualquier novedad que presentes o tengas alguna duda, puede enviarme un mensaje a infojuansedev2@gmail.com.**

## Versión del proyecto v1.0

La aplicación ofrece la posibilidad a cualquier usuario que busque el producto que necesite y la app le devolverá la información que encuentre del producto en dos de los sitios web de comercio más popules: Ebay y Mercado Libre. Incluye modo oscuro y ordenamiento de resultados (menor a mayor, menor a mayor y por defecto).

## Versión del proyecto v2.0 (a solicitud/en planeación)

La aplicación se encuentra en una versión 1.0, que es accesible a todo usuario. Se tiene pensado ofrecer una versión 2.0 que incluya la integración de un sistema de login, permitiendo que la aplicación pueda ser usada tanto de manera libre (sin usuario), como con sesión de usuario (más funcionalidades) que incluiría temas como la posiblidad de guardar búsquedas de las que se haga en el scraper.

Se incluye la posiblidad también de agregar otras funcionalidades como:

- Lista negra de productos como filtro de protección
- Seleccionar la tienda de la que se desee hacer la comparación de precios
- Agregar la posibilidad de comparar productos con más de dos tiendas
- Agregar logs
