  
  <?php 

    // session_start();

    require 'app/link/conexion.php';
    require 'app/class/principal.php';
    
    $_userid = (empty($_SESSION['userid']) ? 0 : $_SESSION['userid']);
    $_category_in_menu = 1;



    $i = new Principal();
    $categorias = $i->cargar_categorias();
    $productos = $i->obtener_favoritos($_userid);

    require 'app/template/header.php';

  ?>  

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 class="m-0 text-dark"> Lista de favoritos </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row col">

          <!-- categorías -->
          <div class="col-md-12 mb-3 d-flex flex-wrap align-items-start">
            <!-- productos -->
            <?php if(empty($productos)){
              echo "<div class='col-md-12 text-center py-5 text-muted'>
                <h3>NO SE HAN ENCONTRADO PRODUCTOS</h3>
                <span>PUEDES <a href='../marketplace/'>BUSCAR PRODUCTOS</a> PARA AGREGARLOS A TUS FAVORITOS </span>
              </div>";
            }else{ ?>
              <?php 
                for ($i = 0; $i < count($productos) ; $i++) {
              ?>

                <div class='col-md-4 p-2'>
                  <a href='producto.php?id=<?=$productos[$i]['id']?>' class='col-md-12 p-2 bg-white d-flex align-items-center card-product'>
                    <img src="dist/img/productos/<?=$productos[$i]['imagen']?>" height="150" style='max-width: 200px;'>
                    &nbsp;
                    <div class='d-flex justify-content-start align-items-start flex-column'>
                      <span><?=$productos[$i]['nombre']?></span>
                      <small class='text-muted'><?=$productos[$i]['descripcion']?></small>
                      <span>$<?=$productos[$i]['precio']?></span>
                    </div>
                  </a>
                </div>
                
              <?php  
                }
              ?>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

<?php require 'app/template/footer.php'; ?>