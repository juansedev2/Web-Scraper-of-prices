
# Rama de desarrollo

---

## Proceso de instalación y prueba rápida en desarrollo

1. Descarga del proyecto con git clone o con descarga en versión Zip
1. Instalar las dependencias con el comando composer install en la raíz del proyecto
1. Desplegar el servidor con:

```conf
    php -S localhost:3000 ó php -S 127.0.0.1:3000
```

Luego ir al navegador web a esa dirección y probar

---

## Versión del proyecto v1.0

La aplicación ofrece la posibilidad a cualquier usuario que busque el producto que necesite y la app le devolverá la información que encuentre del producto en dos de los sitios web de comercio más popules: Ebay y Mercado Libre. Incluye modo oscuro y ordenamiento de resultados (menor a mayor, menor a mayor y por defecto).

## Versión del proyecto v2.0 (a solicitud/en planeación)

La aplicación se encuentra en una versión 1.0, que es accesible a todo usuario. Se tiene pensado ofrecer una versión 2.0 que incluya la integración de un sistema de login, permitiendo que la aplicación pueda ser usada tanto de manera libre (sin usuario), como con sesión de usuario (más funcionalidades) que incluiría temas como la posiblidad de guardar búsquedas de las que se haga en el scraper.

Se incluye la posiblidad también de agregar otras funcionalidades como:

- Lista negra de productos como filtro de protección
- Seleccionar la tienda de la que se desee hacer la comparación de precios
- Agregar la posibilidad de comparar productos con más de dos tiendas
- Agregar logs
