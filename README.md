kiosko
======

Kiosko eClass

Branchs:
- Front
- Backend

### Changelog
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

### TODO
[] Agregar el nombre de la persona
[] Mostrar input del codigo de barra del producto, con el fin de ver alguna interración
[] Si un producto se agrega dos veces, aparece dos veces, la columa # (cantidad) sobra
[] Input de RUT ampliar, no se ve el rut completo