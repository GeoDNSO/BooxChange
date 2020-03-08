# BooxChange
Proyecto Final para AW

## Pasos a Seguir Antes de Tocar Código y Registro de Estado del Proyecto

Importante --> Los cambios a Development y se valida el html generado por php --> https://validator.w3.org/ 

### 07/03/2020

* La estructura del proyecto está más o menos hecha, pero pueden hacerse cambios si se requiere.
* La app y daos son **Singletons**, así que cuando vayáis ha implementar otros DAO's usad como **base** el de **DAOUsuario** que tiene la estructura hecha.
* En la realización del Singleton que no se os olvide cambiar en getInstance el tipo de instancia al que hacéis new(el de la propia clase)
* En principio la vista se comunicará con la App así que todo el flujo pasa por la app como si fuese un controlador, pero esto es provisional si fuese necesario se añadiría un controlador para hacer otras labores como construir un "trozo" de la página de una determinada manera (ej con distintos estilos(distintas clases html)...).

### 08/03/2020

* Se ha añadido un fichero de constantes de php, que habría que incluir en todos los scripts
* Se ha añadido el formulario de registro
* Cambios en la página principal
* Se ha hecho un poco del script de procesar el registro, aun no está completo
