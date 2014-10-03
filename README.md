Kiosko eClass
======

Aplicación desarrollada con el fin de agilizar la venta y pago de productos del kiosko eClass.


### Changelog
0.0.0
* Se ordenaron las variables
* Se actualizaron/ordenaron todos los comentarios de los métodos
* Se modificaron los nombres de los archivos JSON y también sus propiedades, quedando toda la información del JSON en inglés y también los métodos
* Se cambió el método voucher() por cart()
* Se organizó la estructura de archivos
* Se agregaron los componentes vía bower y se usaron en la vista
* Se integró el front de chechito
* Se cambiaron los div de las pantallas por sections y se agregó al css display: none para todos los sections y JS los manipula
* Se agregó el input a #cart pero como no se puede mantener focus sobre un input hidden o text con display: none, se seteó position:absolute; bottom:0;left:0; y con opacity: 0
* Se cambió la variable documento por passport en JS

0.1.2
* Cuando cambia de usuario no se refresca el valor total

0.1.3
* Cambios en composer.json
* Cambios en README.md
* Cambio de diseño en el backend

0.2.0
* Se agrega generación automática de código de barras
* Se agrega reporte de personas con su código de barra
* Pequeñas mejoras en el código

0.3.0
* Se agrega reporte de deudores en excel
* Elimina vista xls

### TODO
- [x] Agregar el nombre de la persona
- [x] Mostrar input del codigo de barra del producto, con el fin de ver alguna interración
- [x] Si un producto se agrega dos veces, aparece dos veces, la columa # (cantidad) sobra
- [x] Input de RUT ampliar, no se ve el rut completo
- [x] Validar que existan productos en el carro cuando se elimina un producto con la tecla DELETE
- [x] Revisar que se actualice el valor cuando se eliminan productos
- [x] Agregar botón cancelar y confirmar (pensando en monitores touch)
- [x] Cuando cambia de usuario no se refresca el valor total

### VERSION
0.3.0
