<?php
//conexiones, conexiones everywhere
ini_set('display_errors', 1);
set_time_limit(5500);
error_reporting(E_ALL);
		$usuario = "root";
		$contrasena = "";  
		$servidor = "localhost";
		$basededatos = "base2";
		//$conexion = mysqli_connect( $servidor, $usuario, "" );
		
		$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
		
		//verificar que la DB exista en el servidor
		$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
 
    if(isset($_POST['submit']))
    {
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo 'Cargando nombre del archivo: '.$fname.' <br>';
         $chk_ext = explode(".",$fname);
 
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['name'];
			 echo $filename;
             $handle = fopen($filename, "r");
 
             while (($data = fgetcsv($handle, 29000, ",")) !== FALSE)
             {
               //Insertamos los datos con los valores...
				$sql = "INSERT into `datos`(IDDATO, AREA, CIUDAD,PROVINCIA, REGION, ZONA,VIVIENDA, PERIODO, TIPOCASA, JEFE_HOGAR) values
				('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]')";
				$ejecutar= mysqli_query($conexion,$sql);
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
             echo "Importación exitosa!";
			 header("Location:/index.html");
			 
         }
         else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
//ver si esta separado por " , "
             echo "Archivo invalido!";
         }
    }
 
?>