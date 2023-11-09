
<br>
<a href="<?=site_url('ingreso')?>" id="backbutton"> < Volver</a>

<hr>

<div class="guiadeuso">
    <div class="contenedor">
 <!-- INICIO  -->
<h1 class="my-4 guia-titulo1">GUÍA DE USO - SUPERBASE</h1>

<h2 class="mt-4 guia-titulo2">ANTES DE COMENZAR</h2>
<p class="my-4 guia-parrafos ms-4">Se solicita la lectura completa y atenta de la guía de uso con el fin de respetar las normas del sistema y las solicitudes eventuales.</p>
<p class="my-4 guia-parrafos ms-4">Te invitamos a descargar la guía de uso en formato PDF haciendo clic en el siguiente enlace: <a href="<?=base_url?>public/filespdf/guiasuperbase.pdf" download><img src="<?=base_url?>css/png/pdf2.png" alt="Icono PDF" class="guia-iconos">PDF - Guía de SuperBase</a>
</p>


<section class="indice">
    <h4 class="my-4 guia-titulo4">Índice</h4>
<ol class="guia-lista-ordenada">
    <a href="#caractgen">
        <li>Características generales</li>
    </a>

    <ul class="guia-lista">
    <a href="#altausuario"><li>A. Solicitud de alta de usuario</li></a>
    <a href="#nuevavista"><li>B. Solicitud de nueva Vista</li></a>
    <a href="#datosacceso"><li>C. Datos de acceso</li></a>
    <a href="#recpass"><li>D. Recuperación de contraseña</li></a>
    <a href="#impyexp"><li>E. Imprimir y Exportar</li></a>
    <a href="#filtros"><li>F. Filtros</li></a>

    </ul>

    <a href="#usercaract">
        <li>Características de usuario</li>
    </a>

    <ul class="guia-lista">
    <a href="#gestionuser"><li>A. Gestión de usuarios</li></a>
        <ul class="guia-lista">
        <a href="#nuevouser"><li>a. Registrar nuevo usuario</li></a>
        <a href="#permisosuser"><li>b. Permisos de usuarios</li></a>
        </ul>

        </ul>

    <ul class="guia-lista">
    <a href="#gestiontags"><li>B. Gestión de TAGS</li></a>
        <ul class="guia-lista">
        <a href="#altatags"><li>a. Alta de Tags</li></a>
        <a href="#modiftags"><li>b. Modificar Tags</li></a>
        <a href="#borrartags"><li>c. Eliminar Tags</li></a>
        </ul>
        </ul>
        
        <ul class="guia-lista">
    <a href="#gestionregistros"><li>B. Gestión de registros</li></a>
        <ul class="guia-lista">
        <a href="#altaregistro"><li>a. Agregar registro</li></a>
        <a href="#modifregistro"><li>b. Modificar registro</li></a>
        <a href="#borrarregistro"><li>c. Eliminar registro</li></a>
        </ul>



    



</ol>

</section>





<!-- GENERALES -->
<h2 class="mt-4 guia-titulo2" id="caractgen">CARACTERÍSTICAS GENERALES</h2>
<h4 class="my-4 guia-titulo4" id="altausuario">Solicitud de alta de usuario</h4>
<p class="my-4 guia-parrafos ms-4">Para solicitar un usuario nuevo, el pedido se debe solicitar al correo del equipo de datos datossectc@gmail.com con copia a los integrantes del equipo (gferino@buenosaires.gob.ar, facundodominguez@buenosaires.gob.ar, luchitocordoba.lc@gmail.com, mcarjuzac@buenosaires.gob.ar, nkreczmer@buenosaires.gob.ar), el proceso tiene un tiempo estimado de realización de hasta 2 días hábiles.</p>

<p class="my-4 guia-parrafos ms-4">En el pedido se debe detallar CUIT, nombre completo, nombre completo de la DG a la cuál pertenece, y qué tipo de usuario solicita (ADMIN, EDITOR, VISITANTE).</p>

<p class="my-4 guia-parrafos ms-4">Se adjunta un ejemplo:</p>

<p class="my-4 guia-parrafos ms-4">Buenos días, solicito alta de usuario para: CUIT 12345678901, *Nombre completo*, *Nombre de la DG*, usuario: ADMIN / EDITOR / VISITANTE.</p>



<h4 class="my-4 guia-titulo4" id="nuevavista">Solicitud de nueva Vista</h4>
<p class="my-4 guia-parrafos ms-4">Al momento de necesitar una vista nueva, el pedido se debe solicitar al correo del equipo de datos datossectc@gmail.com con copia a los integrantes del equipo (gferino@buenosaires.gob.ar, facundodominguez@buenosaires.gob.ar, luchitocordoba.lc@gmail.com, mcarjuzac@buenosaires.gob.ar, nkreczmer@buenosaires.gob.ar), el proceso tiene un tiempo estimado de realización de hasta  5 días hábiles. El mismo deberá contener los campos y atributos que requieran visualizar en la vista.</p>
<p class="my-4 guia-parrafos ms-4">A continuación se debe adjuntar una copia del archivo <a href="https://docs.google.com/spreadsheets/d/16hxAHWUp_mkTqNogUZLkpfapP4TUle5svo_vK8sXlf8/edit#gid=390874109" target="_blank" class="">Verificador de CUIT</a>, en el cual se encontraría el listado de CUITS que el pedido requiera. Previo al envío, el mismo realizará una verificación de los Cuits con el fin de saber si están correctamente escritos. En caso de que alguno de los cuits de como resultado “FALSO”, deberán revisarlo y/o modificarlo según corresponda.</p>

<p class="my-4 guia-parrafos ms-4">Se adjunta un ejemplo:</p>

<p class="my-4 guia-parrafos ms-4">Buenos días, adjunto solicitud de creación de vista para *nombre del proyecto*.
Los campos y atributos son los siguientes:

<ul class="my-4 guia-lista">
    <li class="my-4 fst-italic">CUIT (campo) *obligatorio*</li>
    <li class="my-4 fst-italic">Edición (atributo)</li>
    <li class="my-4 fst-italic">Cargo de origen (atributo)</li> 
</ul>

</p>

<p class="my-4 guia-parrafos ms-4">Adjunto copia del archivo con listado de cuits y atributos para subir: <a href="#">*enlace*</a></p>


<h4 class="my-4 guia-titulo4" id="datosacceso">Datos de acceso</h4>
<p class="my-4 guia-parrafos ms-4">Desde el menú principal, en la barra superior izquierda dentro del menú desplegable de <span class="my-4 fw-semibold">Configuración</span> (<img src="<?=base_url?>css/png/guiaIconoConfig.png" alt="Icono Configuración" class="guia-iconos">), tenemos la siguiente opción:
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaDatosAcceso.png" alt="Opción Datos de Acceso" class=""></p>
<p class="my-4 guia-parrafos ms-4"> En la cual podremos modificar nuestro <span class="my-4 fw-semibold">Usuario</span> y <span class="my-4 fw-semibold">Contraseña</span> a elección. Una vez modificados, presionamos el botón <span class="my-4 fw-semibold">Guardar cambios</span> para finalizar. En caso de querer suspender el proceso, presionamos el botón <span class="my-4 fw-semibold">Cancelar</span>.</p>
</p>

<h4 class="my-4 guia-titulo4" id="recpass">Recuperación de contraseña</h4>
<p class="my-4 guia-parrafos ms-4">Para solicitar un cambio de contraseña, el pedido se debe solicitar al correo del equipo de datos datossectc@gmail.com con copia a los integrantes del equipo (gferino@buenosaires.gob.ar, facundodominguez@buenosaires.gob.ar, luchitocordoba.lc@gmail.com, mcarjuzac@buenosaires.gob.ar, nkreczmer@buenosaires.gob.ar), el proceso tiene un tiempo estimado de realización de hasta 2 días hábiles.
</p>


<h4 class="my-4 guia-titulo4" id="impyexp">Imprimir y Exportar</h4>
<p class="my-4 guia-parrafos ms-4">Desde el menú principal, selecciona la vista sobre la cual deseas extraer información.
Es posible aplicar filtros que tendrán un impacto en la vista final que planeas exportar o imprimir. Posteriormente, hacé clic en <span class="my-4 fw-semibold">Exportar</span> para descargar en formato "xls" (Excel) o selecciona <span class="my-4 fw-semibold">Imprimir</span> para abrir el menú de impresión de tu navegador.</p>

<h4 class="my-4 guia-titulo4" id="filtros">Filtros</h4>
<p class="my-4 guia-parrafos ms-4">En la primer fila de cada columna, contamos con un cuadro de búsqueda, llamado <span class="my-4 fw-semibold">filtro</span>.
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/filtros.png" alt="Filtros"></p>
<p class="my-4 guia-parrafos ms-4">En él, podremos escribir lo que deseemos buscar en esa columna, lo que hará que toda la tabla se filtre por ese (o esos) valor(es). En cada cuadro se debe buscar respetando el formato de información que mantenga la columna, es decir, por ejemplo: En la cuadro de la columna CUIT, solo podremos buscar CUITs.</p>








<!-- USUARIOS -->


<!-- ///////////////////////////////// ADMIN //////////////////////////////////////-->

<h2 class="mt-4 guia-titulo2" id="usercaract">CARACTERÍSTICAS DE USUARIO</h2>
<h3 class="my-4 guia-titulo3 fst-italic text-decoration-underline guia-titulousuario">Admin</h3>
<h3 class="my-4 guia-titulo3" id="gestionuser">Gestión de usuarios</h3>
<p class="my-4 guia-parrafos ms-4">Como administrador, desde el menú principal, en la barra superior izquierda tenemos el icono de <span class="my-4 fw-semibold">Configuración</span> (<img src="<?=base_url?>css/png/guiaIconoConfig.png" alt="Icono Configuración" class="guia-iconos">), dentro del menú desplegable tenemos las siguientes características:
</p>

<h4 class="my-4 guia-titulo4" id="nuevouser">Registrar nuevo usuario</h4>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaRegistrarUsuario.png" alt="Opción Registrar nuevo usuario"></p>
<p class="my-4 guia-parrafos ms-4">Es la opción establecida para el ALTA de un usuario, se solicitará completar los campos establecidos como:
<ul class="my-4 guia-lista">
    <li class="my-4 fst-italic">CUIT</li>
    <li class="my-4 fst-italic">Nombre de usuario</li>
    <li class="my-4 fst-italic">Contraseña</li>

</ul>

<p class="my-4 guia-parrafos ms-4">Para finalizar el alta, presionamos el botón <span class="my-4 fw-semibold">Registrar</span>.</p>
</p>

<h4 class="my-4 guia-titulo4" id="permisosuser">Permisos de usuarios</h4>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaPermisosUsuarios.png" alt="Opción Permisos de usuarios"></p>
<p class="my-4 guia-parrafos ms-4">Dentro de la tabla <span class="my-4 fw-semibold">USUARIOS</span>, buscaremos el usuario que deseemos editar, una vez encontrado, presionamos el botón <span class="my-4 fw-semibold">Editar</span>. Desde la vista de <span class="my-4 fw-semibold">Editar Usuario</span> podremos modificar:
<ul class="my-4 guia-lista">
    <li class="my-4 fst-italic">CUIT</li>
    <li class="my-4 fst-italic">Nombre de usuario</li>
    <li class="my-4 fst-italic">Tipo de usuario</li>
    <li class="my-4 fst-italic">TAGS sobre los que puede accionar el usuario</li> 
    <li class="my-4 fst-italic">Vistas que el usuario puede ver</li> 
</ul>

<p class="my-4 guia-parrafos ms-4">Dentro de la misma tabla, tenemos las opciones de <span class="my-4 fw-semibold">Agregar Usuario</span> (<span class="my-4 fw-semibold">Registrar nuevo usuario</span>) y <span class="my-4 fw-semibold">Más</span>, en la cuál podemos <span class="my-4 fw-semibold">Editar</span>, <span class="my-4 fw-semibold">Ver</span> su información completa y <span class="my-4 fw-semibold">Borrar</span> el usuario.</p>
<p class="my-4 guia-parrafos ms-4">Para finalizar la modificación de usuario, presionamos el botón <span class="my-4 fw-semibold">Actualizar Cambios</span>.</p>
</p>




<!-- TAGS -->

<h3 class="my-4 guia-titulo3" id="gestiontags">Gestión de Tags</h3>
<p class="my-4 guia-parrafos ms-4">Desde el menú principal, ingresamos en la vista TAGS ubicada en parte inferior de la página para gestionar los Tags.</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaTags.png" alt="Tags" class="guia-imagenes"></p>


<h4 class="my-4 guia-titulo4" id="altatags">Alta de Tags</h4>
<p class="my-4 guia-parrafos ms-4">Para dar de alta un Tag, dentro de la tabla Tags, presionamos la opción <span class="my-4 fw-semibold">Agregar registro en TAGS</span>. 
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaAgregarTags.png" alt="Agregar registro en Tags" class="guia-imagenes"></p>
<p class="my-4 guia-parrafos ms-4">Una vez dentro de la vista, en el campo <span class="my-4 fw-semibold">Nombre</span> ingresamos el nombre del Tag que queremos guardar.

Para finalizar, si se desea seguir agregando nuevos TAGS, presionamos el botón <span class="my-4 fw-semibold">Guardar</span>. En caso contrario, podemos presionar el botón <span class="my-4 fw-semibold">Guardar y volver a la lista</span>.
Si se desea suspender el proceso, presionamos el botón <span class="my-4 fw-semibold">Cancelar</span>.</p></p>


<h4 class="my-4 guia-titulo4" id="modiftags">Modificar Tags</h4>
<p class="my-4 guia-parrafos ms-4">Si queremos modificar un Tag, dentro de la tabla Tags presionamos la opción <span class="my-4 fw-semibold">Editar</span> que se encuentra en la misma fila del cual queremos modificar. </p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaModifTag.png" alt="Modificar registro en Tags" class="guia-imagenes"></p>
<p class="my-4 guia-parrafos ms-4">Dentro de la vista podremos modificar el nombre del tag.</p>



<p class="my-4 guia-parrafos ms-4">Para finalizar, presionamos el botón <span class="my-4 fw-semibold">Actualizar Cambios</span>.</p>
</p>

<h4 class="my-4 guia-titulo4" id="borrartags">Eliminar Tags</h4>
<p class="my-4 guia-parrafos ms-4">Si queremos eliminar un Tag, dentro de la tabla Tags presionamos la opción <span class="my-4 fw-semibold">Más</span> que se encuentra en la misma fila del cual queremos modificar.</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaMas.png" alt="Desplegable Más" class=""></p>
<p class="my-4 guia-parrafos ms-4">Esta desplegará un menú desplegable, dentro presionamos la opción <span class="my-4 fw-semibold">Borrar</span>.
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaMasDesplegable.png" alt="Borrar Tags" class=""></p>

</p>

<h3 class="my-4 guia-titulo3" id="gestionregistros">Gestión de registros</h3>
<p class="my-4 guia-parrafos ms-4">Desde el menú principal, ingresamos en la vista sobre la que queremos accionar. Una vez dentro, podemos accionar de las siguientes maneras:
</p>

<h4 class="my-4 guia-titulo4" id="altaregistro">Agregar registro</h4>
<p class="my-4 guia-parrafos ms-4">Para crear un nuevo registro dentro de la tabla de la vista elegida, presionamos el botón <span class="my-4 fw-semibold">Agregar registro en...</span> (Nombre de la vista).</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaAgregarRegistro.png" alt="Agregar registro en..." class="guia-imagenes"></p>
<p class="my-4 guia-parrafos ms-4">Una vez dentro de la vista <span class="my-4 fw-semibold">Agregar registro</span>, completamos los campos:

<ul class="my-4 guia-lista">
    <li class="my-4 fst-italic">CUIT</li>
    <li class="my-4 fst-italic">Hacienda</li>
    <li class="my-4 fst-italic">Chisme</li>
    <li class="my-4 fst-italic">Equivalente</li> 
    <li class="my-4 fst-italic">Gabinete</li> 
</ul>

<p class="my-4 guia-parrafos ms-4">Para finalizar, presionamos el botón <span class="my-4 fw-semibold">Guardar</span> (o <span class="my-4 fw-semibold">Guardar y volver a la lista</span> ). Si queremos suspender el proceso, presionamos el botón <span class="my-4 fw-semibold">Cancelar</span></p>
</p>


<h4 class="my-4 guia-titulo4" id="modifregistro">Modificar registro</h4>
<p class="my-4 guia-parrafos ms-4">Para modificar un registro existente en la tabla de la vista elegida, presionamos la opción <span class="my-4 fw-semibold">Más</span> sobre la misma fila que se encuentra nuestro registro.</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaMas.png" alt="Desplegable Más" class=""></p>
<p class="my-4 guia-parrafos ms-4">Dentro del menú desplegable podemos encontrar dos opciones que nos interesan:</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaDesplegable.png" alt="Desplegable" class=""></p>

<p class="my-4 guia-parrafos ms-4">- Editar Datos de Contacto: donde podemos editar los datos personales del registro.
</p> 
<p class="my-4 guia-parrafos ms-4">- Editar Atributos: donde podemos editar los atributos que tenga disponibles el registro.
</p>
<p class="my-4 guia-parrafos ms-4">Para finalizar, presionamos el botón <span class="my-4 fw-semibold">Actualizar cambios</span>.
</p>

<h4 class="my-4 guia-titulo4" id="borrarregistro">Eliminar registro</h4>
<p class="my-4 guia-parrafos ms-4">Para eliminar un registro existente, dentro del menú desplegable <span class="my-4 fw-semibold">Más</span>, presionamos la opción <span class="my-4 fw-semibold">Eliminar</span> (tal y como se muestra en la imagen del punto anterior).
</p>




<!-- ///////////////////////////////// EDITOR //////////////////////////////////////-->

<h2 class="mt-4 guia-titulo2" id="usercaract">CARACTERÍSTICAS DE USUARIO</h2>
<h3 class="my-4 guia-titulo3 fst-italic text-decoration-underline guia-titulousuario">Editor</h3>


<!-- TAGS -->

<h3 class="my-4 guia-titulo3" id="gestiontags">Gestión de Tags</h3>
<p class="my-4 guia-parrafos ms-4">Desde el menú principal, ingresamos en la vista TAGS ubicada en parte inferior de la página para gestionar los Tags.</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaTags.png" alt="Tags" class="guia-imagenes"></p>


<h4 class="my-4 guia-titulo4" id="altatags">Alta de Tags</h4>
<p class="my-4 guia-parrafos ms-4">Para dar de alta un Tag, dentro de la tabla Tags, presionamos la opción <span class="my-4 fw-semibold">Agregar registro en TAGS</span>. 
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaAgregarTags.png" alt="Agregar registro en Tags" class="guia-imagenes"></p>
<p class="my-4 guia-parrafos ms-4">Una vez dentro de la vista, en el campo <span class="my-4 fw-semibold">Nombre</span> ingresamos el nombre del Tag que queremos guardar.

Para finalizar, si se desea seguir agregando nuevos TAGS, presionamos el botón <span class="my-4 fw-semibold">Guardar</span>. En caso contrario, podemos presionar el botón <span class="my-4 fw-semibold">Guardar y volver a la lista</span>.
Si se desea suspender el proceso, presionamos el botón <span class="my-4 fw-semibold">Cancelar</span>.</p></p>


<h4 class="my-4 guia-titulo4" id="modiftags">Modificar Tags</h4>
<p class="my-4 guia-parrafos ms-4">Si queremos modificar un Tag, dentro de la tabla Tags presionamos la opción <span class="my-4 fw-semibold">Editar</span> que se encuentra en la misma fila del cual queremos modificar. </p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaModifTag.png" alt="Modificar registro en Tags" class="guia-imagenes"></p>
<p class="my-4 guia-parrafos ms-4">Dentro de la vista podremos modificar el nombre del tag.</p>



<p class="my-4 guia-parrafos ms-4">Para finalizar, presionamos el botón <span class="my-4 fw-semibold">Actualizar Cambios</span>.</p>
</p>

<h4 class="my-4 guia-titulo4" id="borrartags">Eliminar Tags</h4>
<p class="my-4 guia-parrafos ms-4">Si queremos eliminar un Tag, dentro de la tabla Tags presionamos la opción <span class="my-4 fw-semibold">Más</span> que se encuentra en la misma fila del cual queremos modificar.</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaMas.png" alt="Desplegable Más" class=""></p>
<p class="my-4 guia-parrafos ms-4">Esta desplegará un menú desplegable, dentro presionamos la opción <span class="my-4 fw-semibold">Borrar</span>.
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaMasDesplegable.png" alt="Borrar Tags" class=""></p>

</p>

<h3 class="my-4 guia-titulo3" id="gestionregistros">Gestión de registros</h3>
<p class="my-4 guia-parrafos ms-4">Desde el menú principal, ingresamos en la vista sobre la que queremos accionar. Una vez dentro, podemos accionar de las siguientes maneras:
</p>

<h4 class="my-4 guia-titulo4" id="altaregistro">Agregar registro</h4>
<p class="my-4 guia-parrafos ms-4">Para crear un nuevo registro dentro de la tabla de la vista elegida, presionamos el botón <span class="my-4 fw-semibold">Agregar registro en...</span> (Nombre de la vista).</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaAgregarRegistro.png" alt="Agregar registro en..." class="guia-imagenes"></p>
<p class="my-4 guia-parrafos ms-4">Una vez dentro de la vista <span class="my-4 fw-semibold">Agregar registro</span>, completamos los campos:

<ul class="my-4 guia-lista">
    <li class="my-4 fst-italic">CUIT</li>
    <li class="my-4 fst-italic">Hacienda</li>
    <li class="my-4 fst-italic">Chisme</li>
    <li class="my-4 fst-italic">Equivalente</li> 
    <li class="my-4 fst-italic">Gabinete</li> 
</ul>

<p class="my-4 guia-parrafos ms-4">Para finalizar, presionamos el botón <span class="my-4 fw-semibold">Guardar</span> (o <span class="my-4 fw-semibold">Guardar y volver a la lista</span> ). Si queremos suspender el proceso, presionamos el botón <span class="my-4 fw-semibold">Cancelar</span></p>
</p>


<h4 class="my-4 guia-titulo4" id="modifregistro">Modificar registro</h4>
<p class="my-4 guia-parrafos ms-4">Para modificar un registro existente en la tabla de la vista elegida, presionamos la opción <span class="my-4 fw-semibold">Más</span> sobre la misma fila que se encuentra nuestro registro.</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaMas.png" alt="Desplegable Más" class=""></p>
<p class="my-4 guia-parrafos ms-4">Dentro del menú desplegable podemos encontrar dos opciones que nos interesan:</p>
<p class="my-4 guia-parrafos ms-4"><img src="<?=base_url?>css/png/guiaDesplegable.png" alt="Desplegable" class=""></p>

<p class="my-4 guia-parrafos ms-4">- Editar Datos de Contacto: donde podemos editar los datos personales del registro.
</p> 
<p class="my-4 guia-parrafos ms-4">- Editar Atributos: donde podemos editar los atributos que tenga disponibles el registro.
</p>
<p class="my-4 guia-parrafos ms-4">Para finalizar, presionamos el botón <span class="my-4 fw-semibold">Actualizar cambios</span>.
</p>

<h4 class="my-4 guia-titulo4" id="borrarregistro">Eliminar registro</h4>
<p class="my-4 guia-parrafos ms-4">Para eliminar un registro existente, dentro del menú desplegable <span class="my-4 fw-semibold">Más</span>, presionamos la opción <span class="my-4 fw-semibold">Eliminar</span> (tal y como se muestra en la imagen del punto anterior).
</p>
<hr>
<br></div>
</div>