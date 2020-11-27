![SICCC](https://i.ibb.co/nDFFvJ5/banner-Jos-1.png)
# Título del proyecto: SISTEMA DE INFORMACIÓN DOCUMENTAL COMITE CURRICULAR CENTRAL SICCC

***
## Índice
1. [Características](#caracteristicas)
2. [Contenido del proyecto](#contenido-del-proyecto)
3. [Tecnologías](#tecnologías)
4. [IDE](#ide)
5. [Instalación](#instalación)
6. [Demo](#demo)
7. [Autor(es)](#autores)
8. [Institución Académica](#institución-académica)
***
### Características:

El Proyecto SICCC busca sistematizar los procesos documentales manejados entre las diferentes dependencias académicas  de la Universidad Francisco de Paula Santander con la oficina del Comité Curricular Central de ella misma, permitiendo mejorar los trámites realizados entre las diferentes facultades adscritas a dichas dependencias, y de ese modo se les permitan  realizar él envió de sus respectivos documentos para su posterior revisión, estos documentos enviados, serán evaluados y revisados por personal interno o externo a la Universidad. De esta manera se busca llevar un control tanto en la línea de tiempo de las solicitudes y de  las correcciones que se le asignen a los documentos solicitados. Para poder realizar este seguimiento y gestionar las solicitudes se han definidos los siguientes roles, y sus funcionalidades.

- <strong>Rol Administrador:</strong> Se encarga de gestionar todas las acciones principales del sistema (Registro de Personal, Recepción de Solicitudes, control de las mismas, gestión de sesiones del Comite Curricular Central, descargar copias de seguridad de los documentos) asi mismo, tendrá la posibilidad de enviar mensajes internos a las diferentes dependencias academicas.

- <strong>Rol Solicitante:</strong> Se encarga de enviar documentos para revision por parte del Comite Curricular Central, asi mismo corregirlos en caso de que asi sea requerido por el Comite. Ademas tendra la posibilidad de enviar mensajes a los administradores del sistema para tratar temas referentes al comité.

- <strong>Rol Evaluador:</strong> Se encarga de revisar los documentos que le asigne los administradores del sistema, y devolverlos para su posterior revisión y avalado por parte del Comite Curricular Central.

<strong>Referente al proyecto:</strong>

  - Proyecto que usa logins  mediante la API de Google SESSION. 
  - El proyecto  maneja eventos con la API de Google CALENDAR.   
  - Carga dinamica del json enviado por google para registro de datos personales como el nombre,etc.
  - Carga masiva de archivos mediante la libreria Dropzone de JavaScript
  - Envio de correos electronico mediante el servicio SendGrid de twilio.
  
  ***
  ### Contenido del proyecto
  ##### PACKAGES
   - [assetsDropzone](https://github.com/Richardace/si-ccc/tree/master/assetsDropzone) -> Este paquete contiene todo los componentes de la libreria Dropzone, asi como plugins, codigo bootstrap, JQuery, Fuentes, Iconos, entre otros elementos que permiten que la libreria funcione correctamente.
   
   - [config](https://github.com/Richardace/si-ccc/tree/master/config) -> Este paquete contiene los archivos de configuracion del sistema, asi como la conexión a la [Base de datos](https://github.com/Richardace/si-ccc/blob/master/config/database.php), configuracion de retorno para la API de google tanto para [Solicitantes y Adminitradores](https://github.com/Richardace/si-ccc/blob/master/config/controlGoogle.php) y los [Evaluadores](https://github.com/Richardace/si-ccc/blob/master/config/controlGoogleEvaluador.php). Ademas este paquete contiene los archivos que permiten la carga de documentos en el servidor, asi como su configuracion de ruta, nombre y contenido. [Example](https://github.com/Richardace/si-ccc/blob/master/config/documentos.ajax.php).
   
  - [controller](https://github.com/Richardace/si-ccc/tree/master/controller) -> Este paquete contiene los 9 controladores del sistema, y son los que envian y retornan información al usuario.
  
  - [core](https://github.com/Richardace/si-ccc/tree/master/core) -> Este paquete contiene un unico archivo llamado [routes.php](https://github.com/Richardace/si-ccc/blob/master/core/routes.php) y es el que permite al index principal acceder a los diferentes [controladores](https://github.com/Richardace/si-ccc/tree/master/controller) del sistema.
  
  - [model](https://github.com/Richardace/si-ccc/tree/master/model) -> Este paquete contiene un folder llamado [DAO](https://github.com/Richardace/si-ccc/tree/master/model/DAO) y es el encargado de realizar las diferentes operaciones en la Base de Datos.
      - [DAO](https://github.com/Richardace/si-ccc/tree/master/model/DAO) -> Este paquete contiene 10 archivos tipo DAO que permiten que las diferentes operaciones que el usuario solicite en el sistema, se ejecuten en la Base de datos y asi permita guardar y extraer informacion.
     
  - [view](https://github.com/Richardace/si-ccc/tree/master/view) -> Este paquete contiene 6 folders que contienen los elementos de la vista, como los componentes Bootstrap y los archivos HTML.
      - [administrator](https://github.com/Richardace/si-ccc/tree/master/view/administrator) -> Este paquete contiene los archivos .PHP con el codigo HTML de la vista referente al rol de Administrador.
      - [evaluador](https://github.com/Richardace/si-ccc/tree/master/view/evaluador) -> Este paquete contiene los archivos .PHP con el codigo HTML de la vista referente al rol de Evaluador.
      - [solicitante](https://github.com/Richardace/si-ccc/tree/master/view/solicitante) -> Este paquete contiene los archivos .PHP con el codigo HTML de la vista referente al rol de Solicitante.
      - [login](https://github.com/Richardace/si-ccc/tree/master/view/login) -> Este paquete contiene los archivos .PHP con el codigo HTML de la vista referente al login por cada tipo de usuario. Se tiene un login para [Administradores y Solicitantes](https://github.com/Richardace/si-ccc/tree/master/view/login/loginUser) y un login para [Evaluadores](https://github.com/Richardace/si-ccc/tree/master/view/login/loginEvaluador).
      - [assets](https://github.com/Richardace/si-ccc/tree/master/view/assets) -> Este paquete contiene todo los componentes graficos para las vistas, asi como plugins, codigo bootstrap, JQuery, Fuentes, Iconos, entre otros elementos.
      
  - [index.php](https://github.com/Richardace/si-ccc/blob/master/index.php) -> Archivo principal del sistema, a partir de acá se ejecutan todas las funcionalidades del proyecto. Es el archivo de arranque del servidor.
  
***
### Tecnologías
<br>
<p align="center"> <img src="https://i.ibb.co/C018CnJ/SG-Twilio-Lockup-RGBx1.png" width="150" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/sWy69jc/php.png" width="90" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/Fzp3x0g/moment.png" width="90" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/yydDBYG/google-API.jpg" width="150" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/F4bPSB8/452-4529239-html-css-and-javascript-logo-html-css-logo.png" width="150" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/njdfqT7/Bootstrap-Logo.png" width="150" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/V9NHVwj/Dropzone-JS.png" width="150" height="60"/> </p>
<br>

   #### Tecnologías Frontend: <br>
     - Lenguajes: HTML - CSS - JavaScript. 
     - Framework: Bootstrap.<br>
     - Librerías: Dropzone, Moment JS, JQuery-UI. 

   #### Tecnologías Backend:<br>
     - Lenguaje: PHP
     - IDE: Visual Studio Code
     - Framework: N/A
     - Librerias: Google-API-php-Client y Sendgrid



#### Usted puede ver el siguiente marco conceptual sobre la API client:

   -Esta realiza el proceso de session entre GOOGLE y PHP en el siguiente link: [API AUTH](https://developers.google.com/api-client-library)

#### Usted puede ver el siguiente marco conceptual sobre la API calendar:

   -Esta realiza el proceso de eventos entre GOOGLE y PHP en el siguiente link: [API CALENDAR GOOGLE](https://developers.google.com/calendar)

#### Usted puede ver el siguiente marco conceptual sobre el servicio SENDGRID de Twilio:

   -Esta se encargar de enviar correos electronicos dentro del servidor desplegado: [API SENDGRID](https://sendgrid.com/docs/for-developers/sending-email/api-getting-started/)
  
  ***
#### IDE
 
##### El proyecto se desarrolla usando Sublime text y Visual code

- Visor demo de sublime -(http://www.sublimetext.com)

  <p align="center"> <img src="https://i.ibb.co/Sw7vsSY/imagen-Sublime.png" width="550" border-radius="90" /> </p>
  
- Visor demo de visualcode -(https://code.visualstudio.com)

  <p align="center"> <img src="https://i.ibb.co/41sb2xK/imagen-Visual.png" width=550"/>  </p>
  

### Instalación

#### Requerimientos Previos para la Instalación

El aplicativo permite ejecutarse en diferentes navegadores, a continuacion se deja el enlace de descarga de Google Chrome y Firefox <br><br>
    - Firefox Devoloper Edition-> [descargar](https://www.mozilla.org/es-ES/firefox/developer/). <br><br>
    - Google Chrome -> [descargar](https://www.google.com/intl/es-419/chrome/). <br><br>
    
<p align="center"> <img src="https://i.ibb.co/dr9qhp4/instalar-Chrome.png" width="400" height="300"/> &nbsp;&nbsp;<img src="https://i.ibb.co/VtRYFPd/firefox.png" width="400" height="300"/> </p>
<br>
Para ejecutar el proyecto en tu computador deberas tener instalado un servidor como XAMPP o WAMPP, ademas deberas contar con la instalación de GIT para clonar el proyecto.
           
   - Descargar el instalador de  [XAMPP](https://www.apachefriends.org/es/index.html) de la pagina oficial.
     
   - Descargar el instalador de  [GIT](https://git-scm.com/downloads) de la pagina oficial.
   
   - Deberás crear una base de Datos con el nombre SICCC, en caso de no usar ese nombre, debes cambiarlo en el archivo de configuración de la database. [VER AQUI](https://github.com/Richardace/si-ccc/blob/master/config/database.php).
   
#### Pasos para la Instalación

 1. Primero debemos clonar nuestro proyecto. ( En XAMPP deberás clonarlo en la ruta C:/xampp/htdocs/ ), para ello utilizaremos el siguiente comando en nuestra consola de Windows o Linux.
 
        git clone https://github.com/Richardace/si-ccc.git
   
 2. La carpeta raiz del proyecto deberá llevar el nombre:
 
        siccc
        
   De esta manera las rutas por defecto del sistema funcionarán correctamente.

  3. Deberás crear una base de Datos con el nombre SICCC, en caso de no usar ese nombre, debes cambiarlo en el archivo de configuración de la database. [VER AQUI](https://github.com/Richardace/si-ccc/blob/master/config/database.php).

  4. Importamos el SQL de la Base de Datos. [BASE DE DATOS](https://github.com/Richardace/si-ccc/blob/master/siccc.sql). <br>
  
  <p align="center"> <img src="https://i.ibb.co/j32ydPz/importacion-SQL.png" width="400" height="150"/> </p> <br>
  
  De esta manera se realizan las consultas que contienen la información de la Base de Datos. Ahora Procederemos a instalar el aplicativo.
   
Finalmente hemos completado la instalacion del aplicativo <strong>SICCC</strong>
  


***
### Demo Video corto y Direccion URL del Proyecto

- <strong>Videos Demostrativos del Aplicativo</strong> <br>
  
  - <strong>Rol Administrador: </strong> [VER VIDEO](https://drive.google.com/file/d/18b4TAyXmTH2odQLCiQ3dLcMZde33zp57/view?usp=sharing).
  - <strong>Rol Evaluador: </strong> [VER VIDEO](https://drive.google.com/file/d/1vAd8ed8eToWnEHZahRO8V7lZZ7bBs_-r/view?usp=sharing).
  - <strong>Rol Solicitante: </strong> [VER VIDEO](https://drive.google.com/file/d/1te3sRpqKLVUgMRsOTdKhh4vSwfNQst3G/view?usp=sharing).

- <strong>Demo del Aplicativo</strong> <br>

  - Para ver el demo de la aplicación puede dirigirse a: [SICCC](http://siccc.cpsw.ingsistemasufps.co/).


***
### Autor(es)
Proyecto desarrollado por: <br>
 - [Richard Acevedo] (<richaralexanderar@ufps.edu.co>).

 - [Jose Suarez] (<joseluissm@ufps.edu.co>).

 - [Marilym Bayona] (<marilymaydeebb@ufps.edu.co>).

Dirigido por: <br>
 - [Marco Adarme] (<madarme@ufps.edu.co>).


***
### Institución Académica   
Proyecto desarrollado para optar a titulo de Ingeniero de Sistemas con la modalidad curso de profundizacioon en el  [Programa de Ingeniería de Sistemas] de la [Universidad Francisco de Paula Santander]


   [Marco Adarme]: <http://madarme.co>
   [Programa de Ingeniería de Sistemas]:<https://ingsistemas.cloud.ufps.edu.co/>
   [Universidad Francisco de Paula Santander]:<https://ww2.ufps.edu.co/>
   

  

