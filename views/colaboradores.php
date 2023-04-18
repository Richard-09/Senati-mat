<!doctype html>
<html lang="es">

<head>
  <title>Colaboradores</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  <!-- Lightbox CSS -->
  <link rel="stylesheet" href="../dist/lightbox2/src/css/lightbox.css">

</head>

<body>

  <div class="container mt-4">
    <div class="card">
      <div class="card-header bg-primary text-light">
        <div class="row">
          <div class="col-md-6">
            <strong>Lista de Colaboradores</strong>
          </div>
          <div class="col-md-6 text-end">
          <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrar</button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="container mt-3">
          <table class="table text-center table-lg table-striped table-bordered border-dark" id="tabla-cursos">
            <thead class=" table-primary table-bordered border-dark">
              <tr>
                <th style="width: 5%">#</th>
                <th style="width: 20%">Nombres y Apellidos</th>
                <th style="width: 10%">Cargo</th>
                <th style="width: 10%">Sede</th>
                <th style="width: 10%">Telefono</th>
                <th style="width: 10%">Tipo contrato</th>
                <th style="width: 20%">Dirección</th>
                <th style="width: 15%">Operaciones</th>
              </tr>
            </thead>
            <tbody id="tabla-colaboradores"></tbody>
          </table>
        </div>
      </div>
        <div class="card-footer text-end">
          <a class="btn btn-outline-primary btn-sm" href="./estudiantes.php">Estudiantes</a>
        </div>
    </div>
  </div>

  <div class="modal fade" id="modalRegistro" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-bg-primary">
          <h5 class="modal-title" id="modalTitleId">Complete el Registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <form action="" autocomplete="off" id="formulario-colaboradores" enctype="multipart/form-data">
          <div class="row">
              <div class="mb-3 col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" class="form-control form-control-sm">
              </div>
              <div class="mb-3 col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" id="nombres" class="form-control form-control-sm">
              </div>
          </div>

          <div class="row">
              <div class="mb-3 col-md-6">
                <label for="cargo" class="form-label">Cargo:</label>
                <select id="cargo" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="sede" class="form-label">Sede:</label>
                <select id="sede" class="form-select form-select-sm">
                  <option value="">Seleccione</option>
                </select>
              </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="tipocontrato" class="form-label">Tipo Contrato:</label>
              <select id="tipocontrato" class="form-select form-select-sm">
                <option value="">Seleccione</option>
                <option value="C">Completo</option>
                <option value="P">Parcial</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="telefono" class="form-label">N° Telefono:</label>
              <input type="text" id="telefono" class="form-control form-control-sm" autofocus>
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="dirección" class="form-label">Dirección</label>
              <input type="text" id="dirección" class="form-control form-control-sm" autofocus>
            </div>
            <div class="mb-3 col-md-6">
              <label for="cv" class="form-label">Curriculum Vitae:</label>
              <input type="file" id="cv" accept=".pdf" class="form-control form-control-sm" >
            </div>
          </div>


        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-outline-primary" id="guardar-estudiante">Guardar</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>  
 
  <!--Sweet alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Lightbox JS -->
  <script src="../dist/lightbox2/src/js/lightbox.js"></script>

 <script>
    $(document).ready(function (){

      function obtenerSedes(){
        $.ajax({
          url: '../controllers/sede.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#sede").html(result);
          }
        });
      }

      function obtenerCargos(){
        $.ajax({
          url: '../controllers/cargo.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#cargo").html(result);
          }
        });
      }


      function registrarColaborador(){
        //Enviaremos los datos dentro de un OBJETO
        //Para adjuntar algún archico multimedia(se conoce como BINARIO) se hace con formData:
        var formData = new FormData();

        formData.append("operacion", "registrar");
        formData.append("apellidos", $("#apellidos").val());
        formData.append("nombres", $("#nombres").val());
        formData.append("idcargo", $("#cargo").val());
        formData.append("idsede", $("#sede").val());
        formData.append("telefono", $("#telefono").val());
        formData.append("tipocontrato", $("#tipocontrato").val());
        formData.append("cv", $("#cv")[0].files[0]);
        formData.append("direccion", $("#dirección").val());
      
        $.ajax({
          url: '../controllers/colaboradores.controller.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          success: function(){
            $("#formulario-colaboradores")[0].reset();
            $("#modalRegistro").modal("hide");
            alert("Guardando correctamente");
            listarColaboradores();
          }
        });
      }


      function preguntarRegistro(){
        Swal.fire({
          icon: 'question',
          title: 'Registro',
          text:'¿Estas seguro de registrar al colaborador?',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#EE8509',
          showCancelButton: true,
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          //Identificando la acción del usuario
          if(result.isConfirmed){
            registrarColaborador();
            listarColaboradores();
          }
        });
      }
    
      $("#guardar-estudiante").click(preguntarRegistro);

      //Predeterminamos un control dentro del modal
      $("#modalRegistro").on("shown.bs.modal", event => {
        $("#apellidos").focus();

        //EVENTOS
        obtenerSedes();
        obtenerCargos();
      });

      function listarColaboradores(){
        $.ajax({
          url: '../controllers/colaboradores.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#tabla-colaboradores").html(result);
          }
        });
      }

      $("#tabla-colaboradores").on("click", ".eliminar", function (){
        Swal.fire({
          title: '¿Eliminar?',
          showDenyButton: true,
          confirmButtonText: 'Aceptar',
          denyButtonText: `Cancelar`,
          }).then((result) => {
          if (result.isConfirmed) {
            const idcolaborador = $(this).attr("data-codigo");
            const datos ={
                'operacion'       :   'eliminar',
                'idcolaborador'   :   idcolaborador
            };

            $.ajax({
              url: '../controllers/colaboradores.controller.php',
              type: 'POST',
              data: datos,
              success: function (e){
                listarColaboradores();
              }
          });
          }
        })





        // if (confirm("¿Esta seguro de eliminar este registro?")){
        //     const idsoftware = $(this).attr("data-codigo");
          
        //     const datos ={
        //         'operation'       :   'eliminar',
        //         'idcolaborador'   :   idcolaborador
        //     };

        //     $.ajax({
        //       url: '../controllers/colaboradores.controller.php',
        //       type: 'POST',
        //       data: datos,
        //       success: function (e){
        //         listarColaboradores();
        //       }
        //   });
        // }
        
      });

      

      listarColaboradores();

    });
  </script>

</body>

</html>