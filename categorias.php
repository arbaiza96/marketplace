  
  <?php 

    $_category_in_menu = 1;
    
    require 'app/link/conexion.php';
    require 'app/class/principal.php';

    $tipo = @$_REQUEST['busqueda'];
    $id = @$_REQUEST['idcat'];

    $i = new Principal();
    $categorias = $i->cargar_categorias();
    

    $tb = "";
    if(empty($tipo)){
      $tb = "categoria";
    }else{
      $tb = "palabra";
    }



    $categoria_nombre = "";

    if($tb == "categoria"){
      $productos = $i->cargar_productos_categorias($id);
      for ($i = 0; $i < count($categorias) ; $i++) {
        if($categorias[$i]['id'] == $id){
          $categoria_nombre = $categorias[$i]['categoria'];
        }
      }
    }else{
      $categoria_nombre = @$_REQUEST['busqueda'];
      $productos = $i->cargar_productos_nombre($categoria_nombre);
    }
    
    require 'app/template/header.php';
    

  ?>  

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 class="m-0 text-dark"> Resultados para "<?=$categoria_nombre?>" </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row col">

          <!-- buscador -->
          <form class="col-md-12 mb-3" action="<?=$_SERVER['REQUEST_URI']?>" method="get">
            <div class="input-group">
              <input type="text" class='form-control' name='busqueda' placeholder='BÚSQUEDA DE PRODUCTOS'>
              <button type='submit' class='btn btn-dark'>¡BUSCAR!</button>
            </div>
          </form>

          <!-- categorías -->
          <div class="col-md-12 mb-3 d-flex flex-wrap align-items-start">
            <!-- productos -->
            <?php if(empty($productos)){
              echo "<div class='col-md-12 text-center py-5 text-muted'>
                <h3>NO SE HAN ENCONTRADO PRODUCTOS</h3>
                <span>PRUEBA BUSCANDO OTROS PRODUCTOS O VOLVIENDO A INICIO</span>
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