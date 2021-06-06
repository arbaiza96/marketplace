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

      <style>
        .table_ td{
          /*border-top: none !important;*/
          border:1px solid #d4d4d4;
          padding:0 !important;
          text-align: center;
        }
        .table_ td[colspan]{
          background-color: #f4f4f4;
        }
        .table_ td>input{
          border: none !important;
        }
        .table_ td>input:focus{
          border:1px solid #343a40 !important;
        }
      </style>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Productos</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><a href="../">Empresas</a></li>
                  <li class="breadcrumb-item active">Productos</li>
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

              <div class="col-lg-12 col-sm-12" id='contenedorProductos'>
                <div class="card">
                  <div class="card-body">
                    <div class="col p-0 d-flex justify-content-end">
                      <div class="">
                        <button class='btn btn-dark' id='btnRecargar'>&nbsp;<span class='fa fa-refresh'></span>&nbsp;</button>
                        <button class='btn btn-primary' id='btnAgregarProducto'>NUEVO PRODCTO</button>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class='table table-striped table-hover table-sm border mt-3'>
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>DESCRIPCIÓN</th>
                            <th title='PRESENTACIÓN'>PRE.</th>
                            <th>MARCA</th>
                            <th title='CATEGORÍA'>CAT.</th>
                            <th>OPCIONES</th>
                          </tr>
                        </thead>
                        <tbody id='lista_productos'>
                          <tr>
                            <td colspan='7' class='text-center py-3'>LISTA DE PRODUCTOS</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-sm-12 d-none" id='formularioProductos'>
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class='d-flex flex-column'>
                        <h5 class="card-title">DATOS DE REGISTRO</h5>
                        <small class='text-muted'>Los campos marcados con * son obligatorios</small>
                      </div>
                    </div>

                    <div class="col row d-flex justify-content-center align-items-center">
                      <div class="row">
                        <div class='px-4'>
                          <label for="rad_producto">PRODUCTO&nbsp;</label>
                          <input type="radio" name='tipo_cliente' id='rad_producto'>
                        </div>
                        <div class='px-4'>
                          <label for="rad_servicio">SERVICIO&nbsp;</label>
                          <input type="radio" name='tipo_cliente' id='rad_servicio'>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="mb-2 col row" producto servicio>
                      <label class="col-sm-3 text-right pr-4 col-form-label" for="">NOMBRE: </label>
                      <div class="col-sm-9">
                        <input type="text" id='' class='form-control' placeholder="NOMBRE DE PRODUCTO">
                      </div>
                    </div>
                    <div class="mb-2 col row" producto servicio>
                      <label class="col-sm-3 text-right pr-4 col-form-label" for="">*DESCRIPCIÓN:</label>
                      <div class="col-sm-9">
                        <input type="text" id='txtRegistro' autocomplete="off" class='form-control' placeholder="BREVE DESCRIPCIÓN DE PRODUCTO">
                      </div>
                    </div>
                    <div class="mb-2 col row" producto>
                      <label class="col-sm-3 text-right pr-4 col-form-label" for="">*PRESENTACIÓN:</label>
                      <div class="col-sm-9">
                        <input type="text" id='txtRegistro' autocomplete="off" class='form-control' placeholder="UN | CAJAS | LOTES | PAQ, ETC">
                      </div>
                    </div>
                    <div class="mb-2 col row" producto>
                      <label class="col-sm-3 text-right pr-4 col-form-label" for="">*MARCA: </label>
                      <div class="col-sm-9">
                        <select class='form-control' id="">
                          <option class="d-none" value="">SELECCIONE</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-2 col row" producto servicio>
                      <label class="col-sm-3 text-right pr-4 col-form-label" for="">*CATEGORÍA: </label>
                      <div class="col-sm-9">
                        <select class='form-control' id="">
                          <option class="d-none" value="">SELECCIONE</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-2 col row" producto servicio>
                      <label class="col-sm-3 text-right pr-4 col-form-label" for="">PRECIOS:</label>
                      <div class="col-sm-9 d-flex justify-content-between align-items-center">
                        <input type="text" id='txtPrecioInicio' autocomplete="off" class='form-control' placeholder="PRECIO INICIAL">
                        <input type="text" id='txtPrecioFin' autocomplete="off" class='form-control' placeholder="PRECIO FINAL">
                      </div>
                    </div>
                    <div class="mb-2 col row" producto servicio>
                      <label class="col-sm-3 text-right pr-4 col-form-label" for="">IMAGENES:</label>
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                          <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        </div>
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



              <script>

                function cargar(){
                  $.ajax({
                    url: '../app/request.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                      modelo: 'empresas',
                      accion: 'cargar_lista_productos',
                      id: _id,
                    },
                    beforeSend : function(){
                      let e = $("#lista_productos");
                      e.html("");
                      e.append("\
                        <tr>\
                          <td colspan='7'>\
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
                    let e = $("#lista_productos");
                    e.html("");
                    if(data.length == 0){
                      e.append("<tr><td colspan='7' class='text-center py-3'>NO SE HAN AGREGADO REGISTROS</td></tr>");
                      return false;
                    }
                    let contador = 0;
                    $.each(data, function(index, val) {
                      contador++;
                      e.append("\
                        <tr>\
                          <td>"+contador+"</td>\
                          <td>"+val.nombre+"</td>\
                          <td>"+val.descripcion+"</td>\
                          <td>"+val.presentacion+"</td>\
                          <td>"+val.proveedor+"</td>\
                          <td>"+val.categoria+"</td>\
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

                $(document).ready(function(){

                  cargar();

                  $("#rad_producto").change(function(){
                    let valor = $(this).prop('checked');
                    if(valor){
                      $("div[servicio]").each(function(index, el) {
                        $(this).addClass("d-none");
                      });
                      $("div[producto]").each(function(index, el) {
                        $(this).removeClass("d-none");
                      });
                    }
                  })
                  $("#rad_servicio").change(function(){
                    let valor = $(this).prop('checked');
                    if(valor){
                      $("div[producto]").each(function(index, el) {
                        $(this).addClass("d-none");
                      });
                      $("div[servicio]").each(function(index, el) {
                        $(this).removeClass("d-none");
                      });
                    }
                  })
                })
                  function volver(){
                    $("#rad_producto").prop("checked", true).change();
                    $("#contenedorProductos").removeClass('d-none');
                    $("#formularioProductos").addClass('d-none');
                  }
                  function agregarProducto(){
                    $("#rad_producto").prop("checked", true).change();
                    $("#contenedorProductos").addClass('d-none');
                    $("#formularioProductos").removeClass('d-none'); 
                  }
                  $("#btnVolver").click(function(){
                    volver();
                  });
                  $("#btnAgregarProducto").click(function(){
                    agregarProducto();
                  });
              </script>



        <!-- /.content -->
      </div>

  <?php require '../app/template_admin/footer.php'; ?>
