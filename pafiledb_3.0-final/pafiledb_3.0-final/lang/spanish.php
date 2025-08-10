<?php
/*
  paFileDB 3.0
  ©2001 PHP Arena
  Written by Todd
  todd@phparena.uni.cc
  http://www.phparena.uni.cc
  Keep all copyright links on the script visible
  Please read the license included with this script for more information.

  ##########
  #paFileDB 3.0 Language File
  #Spanish
  #Translated by Alberto Sagredo (SPAIN)
  ##########

  ##########	
  #If you are translating this file, DO NOT translate anything in brackets, such as {something}, any variables ($something) or arrays #($something[somethingelse]), or HTML tags (<something></something>) or else parts of the script will not work
  #Also, do not delete any lines in this script
  ##########

*/

//Start Beta 2 Language File
$str[time] = "Las horas están en ";
$str[power] = "Gracias a ";
$str[exectime] = "Tiempo de ejecución";
$str[numqueries] = "Consultas a BD MySql";
$str[adminops] = "Opciones de Administracion";
$str[mainpage] = "Pagina Principal";
$str[addcat] = "Añadir Categoria";
$str[editcat] = "Editar Categoria";
$str[delcat] = "Borrar Categoria";
$str[ordercat] = "Reordenar Categorias";
$str[category] = "Categoria";
$str[files] = "Archivos";
$str[jump] = "Cambiar de Categoria";
$str[logged] = "Autenticado como";
$str[admincenter] = "Centro de Administracion";
$str[logout] = "Salir";
$str[file] = "Archivo";
$str[date] = "Fecha de alta";
$str[rating] = "Votacion";
$str[dls] = "Descargas";
$str[email] = "Enviar archivo por email a un amigo";
$str[emailinfo] = "Si quieres que un amigo conozca este archivo,puedes enviarselo rellenando este formulario";
$str[yname] = "Tu nombre";
$str[yemail] = "Tu E-mail ";
$str[fname] = "Nombre de tu amigo";
$str[femail] = "Su E-mail";
$str[esub] = "Asunto del E-mail";
$str[etext] = "Texto del email";
$str[defaultmail] = "Pienso que estarás interesado en este archivo en la siguiente dirección";
$str[semail] = "Enviar email";
$str[msg] .= "Hola $friend[name],\n";
$str[msg] .= "$email[message]\n\n";
$str[msg] .= "----------\n";
$str[msg] .= "Este mail fue enviardo a traves de \"{dbname}\" . Los administradores de \"{dbname}\" no toman ninguna responsabilidad sobre emails enviados desde su web";
$str[econf] = "Gracias ! Tu email ha sido enviado al email : $friend[name]";
$str[editfile] = "Editar archivo";
$str[deletefile] = "Borrar archivo";
$str[desc] = "Descripción";
$str[creator] = "Creado";
$str[version] = "Version";
$str[scrsht] = "Imagen ";
$str[docs] = "Documentacion";
$str[lastdl] = "Ultima descarga";
$str[never] = "Nunca";
$str[votes] = "Votos";
$str[download] = "Bajar archivo";
$str[rate] = "Votar archivo";
$str[license] = "Acuerdo de licencia";
$str[licensewarn] = "Debes estar de acuerdo para bajar este archivo";
$str[iagree] = "De acuerdo";
$str[dontagree] = "No de acuerdo";
$str[rerror] = "Perdona,ya has votado este archivo";
$str[rateinfo] = "Vas a votar el archivo :  <i>{filename}</i>. Selecciona la puntuación entre 1 y 10.";
$str[rconf] = "Has dado a :  <i>{filename}</i> la votacion de  {rate}. Ahora este archivo tiene una votación de  $nrating {newrating}/10.";
$str[stats] = "Estadisticas";
$str[statstext] .= "Hay  $num[files] archivos en $num[cats] categorias<br> en la Base de Datos";
$str[statstext] .= "El archivo mas antiguo es  <a href=\"pafiledb.php?action=file&id= $oldest[file_id]\"> $oldest[file_name]</a><br>";
$str[statstext] .= "El mas nuevo es  <a href=\"pafiledb.php?action=file&id= $newest[file_id]\"> $newest[file_name]</a><br>";
$str[statstext] .= "El archivo menos popular (menos votado )es <a href=\"pafiledb.php?action=file&id= $lpopular[file_id]\"> $lpopular[file_name]</a> con una votacion de  $least/10<br>";
$str[statstext] .= "El archivo mas popular ( mas votado  )es <a href=\"pafiledb.php?action=file&id= $popular[file_id]\"> $popular[file_name]</a> con una votacion de   $most/10<br>";
$str[statstext] .= "El menos descargdo es <a href=\"pafiledb.php?action=file&id= $leastdl[file_id]\"> $leastdl[file_name]</a> con  $leastdl[file_dls] descargas<br>";
$str[statstext] .= "El mas descargado es <a href=\"pafiledb.php?action=file&id= $mostdl[file_id]\"> $mostdl[file_name]</a> con  $mostdl[file_dls] descargas<br>";
$str[statstext] .= "Ha habido  un total de  $totaldls[0] descargas<br>";
$str[statstext] .= "La media de votaciones  por archivo  es  $avg/10<br>";
$str[statstext] .= "La media de descargas por archivo es  $avgdls<br>";
$str[search] = "Buscar";
$str[results] = "Resultados para";
$str[nomatches] = "Lo siento , no se ha encontrado nada con esa secuencia";
$str[matches] = "resultados encontrados son";
$str[sfor] = "Buscar por";
$str[viewall] = "Ver todos los archivos";
$str[vainfo] = "Ver todos los archivos de la base de datos";
$str[next] = "Siguiente";
$str[prev] = "Anterior";
$str[pagenums] = "Paginas";
//You have reached Line 100. If you're not tired now, you will be soon.
$str[acinfo] = "Bienvenido a la zona de administracion de Pafiledb 3.Puedes cambiar las propiedades del sistema y añadir archivos desde aqui.";
$str[cmanage] = "Administracion Categorias";
$str[fmanage] = "Administracion Archivos";
$str[cumanage] = "Campos Propios Administracion";
$str[lmanage]= "Adminstracion de licencias";
$str[amanage] = "Cuentas 'Admin' Administracion";
$str[csettings] = "Cambiar propiedades";
$str[asettings] = "Tus propiedades";
$str[utils] = "Utilidades";
$str[aminfo] = "Aqui puedes cambiar propiedades,añadir,borrar o editar a administradores de sistema";
$str[aadmin] = "AñadirAdmin";
$str[eadmin] = "Editar Admin";
$str[dadmin] = "Borrar Admin";
$str[un] = "Nombre de usuario";
$str[uninfo] = "Añade aqui el nombre de usuario para la cuenta";
$str[aemail] = "Direccion de email del Administrador";
$str[aemailinfo] = "Pon aqui el email del administrador";
$str[apass] = "Contraseña";
$str[apassinfo] = "Pon aqui la contraseña del administrador.Puede ser cambiada en cualquier momento";
$str[aeditperm] = "Editar permisos de administradores";
$str[aeditperminfo] =" ¿¿Quieres que este admin puede cambiar propiedades de los otros admins??";
$str[yes] = "Si";
$str[no] = "No";
$str[aadderror] = "Ya hay un admin con este nombre de usuario :  $form[username]";
$str[adminadded] = "El administrador <i>$form[username]</i> ha sido añadido!";
$str[changepass] = "Cambiar Contraseña";
$str[newpass] = "Nueva Contraseña";
$str[editerror] = "No has seleccionado un admin para editar!";
$str[infochanged] = "La información del admin has sido cambiada!";
$str[passchanged] = "La contraseña del admin ha sido cambiada!";
$str[delerror] = "No has seleccionado ningun admin para borrar!";
$str[deleted] = "Los admins que seleccionaste fueron borrados.";
$str[cmaninfo] = "Puedes emplear la administraciond e categorias para añadir,borrar,editar o reordenar las categorias del sistema.Al menos una categoria debe existir para añadir archivos.";
$str[acat] = "Añadir Categoria";
$str[ecat] = "Editar Cateogira";
$str[dcat] = "Borrar Categoria";
$str[rcat] = "Reordenar Categorias";
$str[catadded] = "La nueva categoria , <i>$form[name]</i> ha sido añadida!";
$str[catname] = "Nombre de la Categoria";
$str[catnameinfo] = "Este será el nombre de la categoría.";
$str[catdesc] = "Descripción de la categoria";
$str[catdescinfo] = "Esta es la descripción de los archivos en la categoria";
$str[catparent] = "Categoria padre";
$str[catparentinfo] = "Si quieers que esta categoria sea una subcategoria, selecciona aquella de la cual quieres que sea subcategoria";
$str[none] = "Ninguna";
$str[catedited] = "La categoria, <i>$form[name]</i> ha sido editada!";
$str[delfiles] = "Borrar archivos de la categoria?";
$str[catsdeleted] = "LAs categorias seleccionadas han sido borradas.";
$str[cdelerror] = "No has seleccionado ninguna categoria para borrar!";
$str[rcatinfo] = "Puedes reordenar las cetegorias,lo que cambiara la posicion en la pagina.Da el numero 1 para que sea el primero.Y siguientes para posteriores.No afecta este cambio a las subcategorias";
$str[rcatdone] = "Las categorias han sido reordendas!";
$str[custominfo] = "Esta zona de la administracion le permite introducir campos personales que serán visibles en la pagina principal.COmo tamaño del archivo,etc..";
$str[afield] = "Añadir Campo";
$str[efield] = "Editar Campo";
$str[dfield] = "Borrar Campo";
$str[fieldname] = "Nombre del campo";
$str[fieldnameinfo] = "Este es el nombre del campo,por ejemplo 'Tamaño de archivo'";
$str[fielddesc] = "Descripción del campo";
$str[fielddescinfo] = "Esta es una descripción del campo,por ejemplo 'Tamaño del archivo en Kbytes'";
$str[fieldadded] = "Tu nuevo campo personal, <i>$form[name]</i> ha sido añadido!";
$str[fieldedited] = "Tu campo personal, <i>$form[name]</i> ha sido editado!";
$str[dfielderror] = "No has seleccionado ningun campo para borrar!";
$str[fieldsdel] = "Tu campo personal ha sido borrado!";
$str[fmanageinfo] = "Esta zona es para añadir,borrar,editar<br><b>Archivos:</b> .Para borrar archivos debes ser administrador y seleccionar con examinar el archivo a borrar";
$str[afile] = "Añadir Archivo";
$str[efile] = "Editar Archivo";
$str[dfile] = "Borrar Archivo";
$str[upload] = "Upload Archivo";
$str[uploadinfo] = "Upload este Archivo";
$str[uploaderror] = "El nombre del archivo $userfile_name ya existe! Renombralo";
$str[uploaddone] = "El archivo$userfile_name ha sido enviado! La url de eset archivo es:";
$str[uploaddone2] = "Pincha aqui para poner la URL en el campo de Download URL";
$str[filename] = "Nombre del archivo";
$str[filenameinfo] = "Este es el nombre del archivo que estas añadiendo ,por ejemplo ' teletubbies foto', 'carmen'";
$str[filesd] = "Descripción breve";
$str[filesdinfo] = "Descripción breve del archivo.Ira en la pagina principal, debe ser breve";
$str[fileld] = "Descripción breve";
$str[fileldinfo] = "Esta es una descripción breve del archivo. Aparecera en la pagina ppal donde aparezca dicho archivo";
$str[filecreator] = "Creador/autor";
$str[filecreatorinfo] = "Este es el nombre del ya creado archivo.";
$str[fileversion] = "Version del archivo";
$str[fileversioninfo] = "Esta es la version del archivo, como  3.0 o 1.3 Beta";
$str[filess] = "URL de Imagen del programa (Screenshot)";
$str[filessinfo] = "Esta es la URL que apunta al screenshot del archivo.";
$str[filedocs] = "Documentacion/Manual URL";
$str[filedocsinfo] = "Esta es la direccion URL donde está la documentacion del archivo";
$str[fileurl] = "Download URL";
$str[fileurlinfo] = "Esta es la direccion del archivo donde esta alejado.Puedes poner  <a href=\"javascript:NewWindow('pafiledb.php?action=admin&ad=file&file=upload','fileupload','600','450','custom','front');\">Para subir archivo al servidor</a>";
$str[filepi] = "POner Icono";
$str[filepiinfo] = "Puedes selecionar un icono para el archivo. Este icono se verá cuando se muestra los archivos en la pagina web.";
$str[filecat] = "Categoria";
$str[filecatinfo] = "Esta es la categoria a la cual pertenece el archivo";
$str[filelicense] = "Licencia";
$str[filelicenseinfo] = "Este es la licencia que debe confirmarse para bajar el archivo.";
$str[filepin] = "Archivo Pin";
$str[filepininfo] = "Selecccionas si es un archivo pin o no. Los archivos Pin se muestran siempre al ppio de la lista..";
$str[fileadded] = "El nuevo archivo, <i>$form[name]</i> ha sido añadido!";
$str[fileedited] = "El archivo, <i>$form[name]</i> ha sido editado!";
$str[fderror] = "No has seleccionado ningun archivo para borrar!";
//You have reached Line 200. PHP Arena is not responsible for deaths related to sitting in front of your computer for a long time while translating this file.
$str[filesdeleted] = "Los archivos seleccionados fueron borrados!";
$str[lmanageinfo] = "Puedes seleccionar el administrador de licencias para añadir,editar o borrar licencias que aparecen antes de bajarse un archivo.";
$str[alicense] = "Añadir Licencia";
$str[elicense] = "Editar Licencia";
$str[dlicense] = "Borrar Licencia";
$str[lname] = "Nombre Licencia";
$str[ltext] = "Texto de la licencia";
$str[licenseadded] = "Tu licencia, <i>$form[name]</i> ha sido añadida!";
$str[licenseedited] = "Tu licencia, <i>$form[name]</i> ha sido editada!";
$str[lderror] = "No seleccionaste ninguna licencia para borrar!";
$str[ldeleted] = "Las licencias seleccionadas fueron borradas.";
$str[login] = "Acceso Administración";
$str[username] = "Nombre de Usuario";
$str[password] = "Contraseña";
$str[loggedin] = "HAs autenticado correctmente. <a href=\"pafiledb.php?action=admin&ad=main\">Pulsa Aqui</a> para entrar en la zona de administracion.";
$str[loginerror] = "Nombre o contraseña incorrectas.!";
$str[loggedout] = "Has salido del sistema correctemente.";
$str[changeemail] = "Cambiar dirección de email";
$str[emailad] = "Direccion email";
$str[confpass] = "Confirmar Contraseña (repitela)";
$str[nopermission] = "No tienes perimiso para cambiar esta seccion";
$str[emailchanged] = "Tu dirección de email ha sido cambiada!";
$str[changepasserror] = "Tu contraseña no coincide. Vuelve atrás y reintroducela de nuevo";
$str[yourpasschanged] = "Tu contraseña ha sido cambiada!";
$str[dbname] = "Nombre de la BD";
$str[dbnameinfo] = "Este es el nombre de la Base de Datos, como 'Archivos de la pitonisa lola'";
$str[dbdesc] = "Descripción de la Base de Datos";
$str[dbdescinfo] = "Esta es una breve descripción de lo que contiene la base de datos";
$str[dburl] = "URL de la Base de Datos";
$str[dburlinfo] = "Esta es la dirección donde PafileDb está alojado";
$str[topnum] = "Numero Top Ten";
$str[topnuminfo] = "Numero de archivos mostrados en el Top Ten";
$str[hpurl] = "URL de la Pagina Principal";
$str[hpurlinfo] = "Direccion de la pagina principal del sistema";
$str[nfdays] = "Fecha Nuevos archivos";
$str[nfdaysinfo] = "Cuantos dias aparecera el archivo como nuevo";
$str[timeoffset] = "Offset Tiempo";
$str[timeoffsetinfo] = "Offset de la hora local a la hora GMT";
$str[tz] = "Zona Horaria";
$str[tzinfo] = "Zona Horaria que será mostrada";
$str[header] = "Encabezado";
$str[headerinfo] = "Encabezado mostrado en las paginas creadas por pafiledb";
$str[footer] = "Pie de Pagina";
$str[footerinfo] = "Pie de Pagina mostrado";
$str[styleset] = "Hoja de Estilo";
$str[stylesetinfo] = "Selecciona el estilo a emplear";
$str[stats2] = "Estadisticas";
$str[statsinfo] = "Muestra estadisticas como el tiempo de ejecución del script PHP o las llamadas a la base de datos";
$str[settingschanged] = "Configuración de PafileDB cambiada";
$str[lang] = "Archivo IDIOMA";
$str[langinfo] = "Selecciona idioma a emplear por PaFILEDB";

//Start Beta 2.1 Language File
$str[settings] = "Propiedades";
$str[pafdbsettings] = "Propiedades paFileDB";

//Start Beta 3 Language File 
$str[sortby] = "Ordenar por"; 
$str[sort] = "Ordenar"; 
$str[name] = "Nombre"; 
$str[bdb] = "Backup Base Datos"; 
$str[rdb] = "Restaurar Base Datos"; 
$str[rdbinfo] = "Puedes restaurar una copia de seguridad que guardaste anteriormente <b>NOTA:</b> Esto borrara tus valores actuales de la base de datos incluyendo la informacion de administracion!<p>Elija el archivo para restaurar:"; 
$str[rdbdone] = "Tu base de datos ha sido restaurada! Si la informacion de admin actual y anterior difieren debes hacer login otra vez";
$str[home] = "Pagina principal"; 
?>
