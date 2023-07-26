# Prueba PHP

#### Descripción breve del proyecto o una introducción. Explica qué hace el proyecto y cuál es su propósito principal.

## Requerimientos

- Lenguaje de Programación: PHP
- Motor de Base de Datos: MySQL

Descripción del Proyecto: Gestión de Inventario y Ventas para Cafetería

Este proyecto consiste en un sistema de gestión de inventario y ventas desarrollado en PHP y MySQL para una cafetería de KONECTA. El software permite almacenar y gestionar el inventario de productos de la cafetería, así como realizar ventas y llevar un registro de las mismas.

Funcionalidades Principales:

1. Gestión de Productos:
   - Creación: El usuario puede agregar nuevos productos a la base de datos proporcionando información como el nombre, referencia, precio, peso, categoría, cantidad en stock y fecha de creación del producto.
   - Edición: Existe una función para editar los datos de un producto existente. El usuario puede buscar un producto por nombre y modificar sus detalles.
   - Eliminación: Los productos pueden ser eliminados de la base de datos, en caso de que ya no estén disponibles en la cafetería.

2. Realizar Ventas:
   - El usuario tiene la posibilidad de realizar ventas de productos específicos. Al ingresar el ID del producto y la cantidad a vender, el software actualiza automáticamente el stock del producto y registra la venta en una tabla de ventas.

3. Consultas Especiales:**
   - El sistema ofrece dos consultas adicionales:
     - Consultar Producto con Mayor Stock: Permite conocer cuál es el producto que tiene más unidades en stock en la cafetería.
     - Consultar Producto Más Vendido: Muestra cuál es el producto que ha sido vendido en mayor cantidad.

Características Técnicas:

- Lenguaje de Programación: PHP.
- Motor de Base de Datos: MySQL.
- Framework: El proyecto fue desarrollado con PHP nativo, pero podría extenderse a utilizar algún framework PHP si se desea.

Instrucciones de Instalación y Configuración:

1. Instalar PHP y MySQL en el servidor local o en el entorno de producción (XAMPP).
2. Crear la base de datos "phpDB" y las tablas "productos" y "ventas". He adjuntado la bd dentro de la carpeta de pruebaphp. (Envié toda la carpeta xampp)
3. Descargar los archivos fuente del proyecto desde el repositorio Git/Github.
4. Colocar los archivos en el directorio del servidor web (XAMPP/htdocs).
5. Asegurarse de que el servidor web y el motor de base de datos estén en funcionamiento.
6. Abrir el navegador web e ingresar la URL para acceder al sistema. (Se empieza por el login.html)

Instrucciones de Uso:

1. Al acceder al sistema, se mostrará una pantalla de inicio de sesión donde el usuario debe seleccionar un rol entre "Productos" y "Ventas".
2. Dependiendo del rol seleccionado, el usuario será redirigido a la pantalla de gestión de productos o a la pantalla de ventas.
3. En la pantalla de gestión de productos, el usuario puede realizar las operaciones de creación, edición, eliminación y consultar productos disponibles.
4. En la pantalla de ventas, el usuario podrá ingresar el ID del producto a vender y la cantidad, y el sistema se encargará de actualizar el stock y registrar la venta.

Equipo de Desarrollo:

Este proyecto fue desarrollado por (Juan Camilo Gonzalez) como parte de una prueba técnica para la empresa KONECTA.

Fecha de Creación:

(26/07/2023)

## Notas Finales:

### Query's directos a BD 
Realizar una consulta que permita conocer cuál es el producto que más stock tiene: (TABLA "productos")
- SELECT MAX(stock), Name from productos

Realizar una consulta que permita conocer cuál es el producto más vendido: (TABLA "ventas")
- SELECT MAX(Sale_Qty), ID_Product from ventas


Este proyecto fue creado como parte de una prueba técnica y se proporciona como ejemplo de habilidades de programación y desarrollo web. Es posible que el proyecto pueda ampliarse y mejorarse para su uso en un entorno de producción real. Cualquier sugerencia o comentario sobre el proyecto será bien recibido.

