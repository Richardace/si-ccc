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
#### Características:

  - Proyecto que usa logins  mediante la API de Google SESSION. 
  - El proyecto  maneja eventos con la API de Google CALENDAR.   
  - Carga dinamica del json enviado por google para registro de datos personales como el nombre,etc.
  - Carga masiva de archivos mediante la libreria Dropzone de JavaScript
  - Envio de correos electronico mediante el servicio SendGrid de twilio.
  
  ***
  #### Contenido del proyecto
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
#### Tecnologías
<br>
<p align="center"> <img src="https://i.ibb.co/C018CnJ/SG-Twilio-Lockup-RGBx1.png" width="200" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/sWy69jc/php.png" width="90" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/Fzp3x0g/moment.png" width="90" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/yydDBYG/google-API.jpg" width="150" height="60"/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="https://i.ibb.co/V9NHVwj/Dropzone-JS.png" width="150" height="60"/> </p>
<br>

   ### Tecnologías Frontend: <br>
     - Lenguajes: HTML - CSS - JavaScript. 
     - Framework: Bootstrap.<br>
     - Librerías: Dropzone, Moment JS, JQuery-UI. 

   ### Tecnologías Backend:<br>
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

#### Servidor

Para poder ejecutar el proyecto, primero debemos instalar un servidor en nuestra maquina personal, en este caso instalaremos XAMPP. <br> <strong font-weight="9">NOTA: En caso de ya contar con un servidor desplegado en la WEB omitiremos esta instalación, y pasaremos a la instalación de la Base de Datos.</strong>

  1. Descargar el instalador de  [XAMPP](https://www.apachefriends.org/es/index.html) de la pagina oficial.
  
  <p align="center"> <img src="https://i.ibb.co/Rp2MBtx/instalar-xampp.png" width="500" height="400"/> </p>
  
  2. Instalar XAMPP y configurar nuestro entorno de trabajo como IDE y Navegador por Defecto.
  
  <p align="center"> <img src="https://i.ibb.co/HNtfdrH/instalacion-Xampp.png" width="500" height="400"/> </p>
  
#### Base de Datos

  1. Para instalar la Base de Datos descargaremos el archivo del codigo SQL mediante el siguiente enlace: [SQL Base de Datos](https://github.com/Richardace/si-ccc/blob/master/siccc.sql).
  
  2. Crearemos la tabla SICCC en nuestro gestor de Base de Datos, para el ejemplo usaremos el gestor MySQL.
  
  <p align="center"> <img src="https://i.ibb.co/SXbQRQm/creacion-tabla.png" width="500" height="400"/> </p>
  
  3. Importamos el SQL de la Base de Datos.
  
  <p align="center"> <img src="https://i.ibb.co/j32ydPz/importacion-SQL.png" width="500" height="400"/> </p>
  
  De esta manera se realizan las consultas que contienen la información de la Base de Datos. Ahora Procederemos a instalar el aplicativo.
  
  
#### Aplicativo

Para instalar nuestro aplicativo debemos contar con un navegador WEB y posteriormente ejecutar el proyecto. <br>
  1. El aplicativo permite ejecutarse en diferentes navegadores, a continuacion se deja el enlace de descarga de Google Chrome y Firefox <br>
    - Firefox Devoloper Edition-> [descargar](https://www.mozilla.org/es-ES/firefox/developer/). <br>
    - Google Chrome -> [descargar](https://www.google.com/intl/es-419/chrome/).
    
<p align="center"> <img src="https://i.ibb.co/dr9qhp4/instalar-Chrome.png" width="500" height="400"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="https://i.ibb.co/VtRYFPd/firefox.png" width="500" height="400"/> </p>
  
  2. Descargar el Proyecto
    - El aplicativo se puede descargar en formato RAR mediante el siguiente enlace: 
    - Tambien podemos clonar nuestro proyecto directamente desde GITHUB, para ello insertaremos el siguiente comando en nuestra consola del sistema operativo. (Es importante verificar tener instalado GIT en nuestra maquina, de lo contrario no se podra ejecutar el comando. [DESCARGAR GIT](https://git-scm.com/download/win). <br>
    
          git clone https://github.com/Richardace/si-ccc.git
          
  3. Movemos el contenido de la carpeta que obtenemos al descomprimir el proyecto, y la guardamos en la raiz del servidor. ( En XAMPP la raiz lleva el nombre de HTDOCS y en los servidores generalmente lleva el nombre PUBLIC_HTML).
  
  4. Posteriormente ya podremos acceder al aplicativo ingresando mediante la siguiente URL
  
    - Para Xampp: http://localhost/siccc
    - Para servidores desplegados: http://dominioweb.com
  
  5. A continuación cargaremos la BD del aplicativo.
  
  
Finalmente hemos completado la instalacion del aplicativo <strong>SICCC</strong>
  


***
### Demo video corto OJO  y direcciond el link

Para ver el demo de la aplicación puede dirigirse a: [Pizzería_js](http://ufps30.madarme.co/json_pizza/).

***
### Autor(es)
Proyecto desarrollado por: <br>
 - [Richard Acevedo] (<richara@ufps.edu.co>).

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
   

  

