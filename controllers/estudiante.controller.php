<?php

require_once '../models/Estudiante.php';

if(isset($_POST['operacion'])) {

  $estudiante = new Estudiante();

  if ($_POST['operacion'] == 'registrar'){

    //PASO 1: Recolectar todos los valores enviados por la vista y almacenarlos en un array asociativo
    // ARRAY ASOCIATIVO:    clave  :  valor
    $datosGuardar = [
      "apellidos"          =>$_POST['apellidos'],
      "nombres"            =>$_POST['nombres'],
      "tipodocumento"      =>$_POST['tipodocumento'],
      "nrodocumento"       =>$_POST['nrodocumento'],
      "fechanacimiento"    =>$_POST['fechanacimiento'],
      "idcarrera"          =>$_POST['idcarrera'],
      "idsede"             =>$_POST['idsede'],
      "fotografia"         => ''
    ];

    //Vamos a verficar si la vista nos envió una FOTOGRAFIA // NO GUARDAMOS LA IMAGEN SI NO LA RUTA
    if (isset($_FILES['fotografia'])){

      $rutaDestino = '../views/img/fotografias/';
      $fechaActual = date('c'); //C = complete, AÑO/MES/DIA/MINUTO/SEGUNDO
      $nombreArchivo = sha1($fechaActual) . ".jpg";
      $rutaDestino .= $nombreArchivo;

      //Guardamos la fotografia en el servidor
      if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $rutaDestino)){
        $datosGuardar['fotografia'] = $nombreArchivo;
      }
    }


    //PASO 2: Enviar el array al método registrar 
    $estudiante->registrarEstudiante($datosGuardar);

  }

}