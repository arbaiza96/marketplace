  <?php require '../app/template_admin/header.php'; ?>
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <i class="fa-2x fab fa-medium-m px-2"></i>
          <span class="brand-text font-weight-light"><?=$_title?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <?php require 'menu/menu.php';?>
          <!-- /.sidebar-menu -->
        </div>
      </aside>
      <!-- /.sidebar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Catalogos</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><a href="../">Empresas</a></li>
                  <li class="breadcrumb-item active">Catalogos</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">

              <div class="col-lg-8 col-sm-12" id='contenedorProveedores'>
                <div class="card">
                  <div class="card-body">
                    <div class="col p-0 d-flex justify-content-end">
                      <div class="">
                        <button class='btn btn-dark' id='btnRecargar'>&nbsp;<span class='fa fa-refresh'></span>&nbsp;</button>
                        <button class='btn btn-primary' id='btnAgregarProveedor'>NUEVO CATALOGO</button>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class='table table-striped table-hover table-sm border mt-3'>
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>ITEMS</th>
                            <th>OPCIONES</th>
                          </tr>
                        </thead>
                        <tbody id='lista_catalogos'>
                          <tr>
                            <td colspan='4' class='text-center py-3'>LISTA DE MARCAS</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <script>
                $(document).ready(function(){
                  cargar_listado_proveedores();
                  $("#btnAgregarProveedor").click(function(){
                    $("#contenedorProveedores").addClass('d-none');
                    $("#formularioProveedores").removeClass('d-none');
                  });
                  $("#btnRecargar").click(function(){
                    cargar_listado_proveedores();
                  })
                  $("#btnVolver").click(function(){
                    volver_proveedores();
                  });
                  $("#btnGuardarDatos").click(function(){
                    guardar_proveedor();
                  });
                });


                function cargar_listado_proveedores(){
                  $.ajax({
                    url: '../app/request.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                      modelo: 'empresas',
                      accion: 'cargar_lista_marcas',
                      id: _id,
                    },
                    beforeSend : function(){
                      let e = $("#lista_catalogos");
                      e.html("");
                      e.append("\
                        <tr>\
                          <td colspan='4'>\
                            <div class='my-4 d-flex flex-column justify-content-center align-items-center'>\
                              <div class='spinner-border' style='width: 3rem; height: 3rem;'>\
                                <span class='sr-only'>Loading...</span>\
                              </div>\
                              <span class='mt-3'>CARGANDO</span>\
                            </div>\
                          </td>\
                        </tr>\
                      ");
                    }
                  }).done(function(data, textstatus, jqxhr){
                    console.log(data);
                    let e = $("#lista_catalogos");
                    e.html("");
                    if(data.length == 0){
                      e.append("<tr><td colspan='4' class='text-center py-3'>NO SE HAN AGREGADO REGISTROS</td></tr>");
                      return false;
                    }
                    let contador = 0;
                    $.each(data, function(index, val) {
                      contador++;
                      e.append("\
                        <tr>\
                          <td>"+contador+"</td>\
                          <td>"+val.marca+"</td>\
                          <td>"+val.items+"</td>\
                          <td>\
                            <span id='btnLista_"+val.id+"' class='btn btn-light btn-sm'>&nbsp;<i class='fa fa-list'></i>&nbsp;</span>\
                            <span id='btnEditar_"+val.id+"' class='btn btn-light btn-sm'>&nbsp;<i class='fa fa-pencil'></i>&nbsp;</span>\
                            <span id='btnEliminar_"+val.id+"' class='btn btn-light btn-sm'>&nbsp;<i class='fa fa-trash'></i>&nbsp;</span>\
                          </td>\
                        </tr>\
                      ");
                      $("#btnEditar_"+val.id).click(function(){
                        console.log("editar proveedor");
                      })
                      $("#btnEliminar_"+val.id).click(function(){
                        alertify.confirm("Se eliminará el registro de la marca '"+val.marca+"' ¿Desea proceder?", 
                        function(){
                          eliminar_proveedor(val.id);
                        });
                      })
                    });
                  }).fail(function(data, textstatus, jqxhr){
                    console.log("algo ha salido mal >> " + textstatus);
                  });
                }

                function eliminar_proveedor(id){
                  $.ajax({
                    url: '../app/request.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                      class: 'empresas',
                      action: 'eliminar_marca',
                      marca : id,
                    }
                  }).done(function(data, textstatus, jqxhr){
                    if(data == 1){
                      alertify.success("SE HA ELIMINADO EL REGISTRO");
                      cargar_listado_proveedores();
                    }
                  });
                }

                function guardar_proveedor(){
                  let nombre = $("#txtNombre").val();
                  let razon = $("#txtRazon").val();
                  let nit = $("#txtNIT").val();
                  let registro = $("#txtRegistro").val();
                  let plazo = $("#txtPlazo").val();
                  let contribuyente = $("#txtContribuyente").val();
                  let telefono = $("#txtTelefono").val();
                  let direccion = $("#txtDireccion").val();

                  if(nombre == "" || razon == "" || nit == "" || registro == "" || plazo == ""){
                    alertify.error("DEBE COMPLETAR LOS CAMPOS OBLIGATORIOS *");
                    return false;
                  }

                  $.ajax({
                    url: '../app/request.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                      class: 'empresas',
                      action: 'guardar_proveedor',
                      nombre: nombre,
                      razon: razon,
                      nit: nit,
                      registro: registro,
                      plazo: plazo,
                      contribuyente: contribuyente,
                      telefono: telefono,
                      direccion: direccion,
                    }
                  }).done(function(data, textstatus, jqxhr){
                    if(data == 1){
                      alertify.success("SE HA AGREGADO EL PROVEEDOR");
                      cargar_listado_proveedores();
                      limpiar_formulario_proveedores();
                      volver_proveedores();
                    }
                  });
                }

                function limpiar_formulario_proveedores(){
                  $("#txtNombre").val("");
                  $("#txtRazon").val("");
                  $("#txtNIT").val("");
                  $("#txtRegistro").val("");
                  $("#txtPlazo").val("");
                  $("#txtContribuyente").val("");
                  $("#txtContacto").val("");
                  $("#txtDireccion").val("");
                }

                function volver_proveedores(){
                  $("#contenedorProveedores").removeClass('d-none');
                  $("#formularioProveedores").addClass('d-none');
                }

              </script>

              <div class="col-lg-8 col-sm-12 d-none" id='formularioProveedores'>
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column mb-3">
                      <h5 class="card-title">DATOS DE LA MARCA</h5>
                      <small class='text-muted'>Los campos marcados con * son obligatorios</small>
                    </div>
                    <div class="mb-3 col row">
                      <label class="col-sm-3 text-right pr-4 col-form-label" for="">*MARCA: </label>
                      <div class="col-sm-9">
                        <input type="text" id='txtNombre' autocomplete="off" class='form-control' placeholder="NOMBRE DE LA MARCA">
                      </div>
                    </div>
                    <div class="col p-0">
                      <button class="btn btn-primary" id="btnGuardarDatos">GUARDAR DATOS</button>
                      <button class="btn btn-secondary" id='btnVolver'>VOLVER</button>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>



        <!-- /.content -->
      </div>

  <?php require '../app/template_admin/footer.php'; ?>
