<?php

require_once '../models/Sede.php';

if(isset($_POST['operacion'])){

  $sede = new Sede();

  if ($_POST['operacion'] == 'listar'){
    $data = $sede->listarSedes();
    
    // Enviar los datos a la vista
    //Si contiene informacion, si no esta vacio... 
    if ($data){
      foreach($data as $registro){
        echo "<opction value = '{$registro['idsede']}'>{$registro['sede']}</opction>"
      }
    }else{
      echo "<option value= ''>No encontramos datos</option>";
    }
  }




}