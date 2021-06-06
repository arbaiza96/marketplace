  <?php require '../app/template_admin/header.php'; ?>
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
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
                <h1 class="m-0 text-dark">Resumen</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><a href="../">Empresas</a></li>
                  <li class="breadcrumb-item active">Resumen</li>
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

              <div class="col-lg-12 col-sm-12" id='contenedorEmpresas'>
                <div class="card">
                  <div class="card-body d-flex">

                    <div class='col py-3 px-3 border d-flex flex-column align-items-center justify-content-center'>
                      <span class='' style="font-size: 18pt;">CLIENTES</span>
                      <span class='fa fa-users fa-3x'></span>
                      <b style="font-size: 22pt;">10</b>
                    </div>

                    <div class='col py-3 px-3 border d-flex flex-column align-items-center justify-content-center'>
                      <span class='' style="font-size: 18pt;">PROVEEDORES</span>
                      <span class='fa fa-id-card fa-3x'></span>
                      <b style="font-size: 22pt;">10</b>
                    </div>

                    <div class='col py-3 px-3 border d-flex flex-column align-items-center justify-content-center'>
                      <span class='' style="font-size: 18pt;">PRODUCTOS</span>
                      <span class='fa fa-archive fa-3x'></span>
                      <b style="font-size: 22pt;">10</b>
                    </div>

                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-sm-12" id='contenedorEmpresas'>
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <span><span class='fa fa-tag'></span>&nbsp;VENTAS RECIENTES</span>
                      <small class='text-primary' style='cursor: pointer;'>VER DETALLES</small>
                    </div>
                    <hr>
                    <div class="list-group list-group-flush">
                      <div class="list-group-item d-flex justify-content-between">
                        <span>CLIENTE 1</span>
                        <span>$562.36</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>CLIENTE 2</span>
                        <span>$562.36</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>CLIENTE 3</span>
                        <span>$562.36</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>CLIENTE 4</span>
                        <span>$562.36</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>CLIENTE 5</span>
                        <span>$562.36</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>CLIENTE 6</span>
                        <span>$562.36</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-5 col-sm-12" id='contenedorEmpresas'>
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <span><span class='fa fa-archive'></span>&nbsp;PRODUCTOS MÁS VENDIDOS</span>
                      <small class='text-primary' style='cursor: pointer;'>VER DETALLES</small>
                    </div>
                    <hr>
                    <div class="list-group list-group-flush">
                      <div class="list-group-item d-flex justify-content-between">
                        <span>PRODUCTO 1</span>
                        <span>$600.00</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>PRODUCTO 2</span>
                        <span>$500.00</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>PRODUCTO 3</span>
                        <span>$400.00</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>PRODUCTO 4</span>
                        <span>$300.00</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>PRODUCTO 5</span>
                        <span>$200.00</span>
                      </div>
                      <div class="list-group-item d-flex justify-content-between">
                        <span>PRODUCTO 6</span>
                        <span>$100.00</span>
                      </div>
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
