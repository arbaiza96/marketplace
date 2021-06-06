  
  <?php 


    $_category_in_menu = 1;

    require 'app/link/conexion.php';
    require 'app/class/principal.php';

    $idproducto = (empty(@$_REQUEST['id']) ? 0 : @$_REQUEST['id']);

    $i = new Principal();
    $categorias = $i->cargar_categorias();

    $producto = $i->informacion_producto($idproducto);


    $hasproduct = 0;
    if(empty($producto)){
      $hasproduct = 0;
    }else{
      $hasproduct = 1;
    }

    $id_tienda = $producto['id_tienda'];
    $productos = $i->productos_tienda($id_tienda, $idproducto);

    // echo "<pre>";
    // print_r($productos);
    // echo $hasproduct;
    // echo "</pre>";

    require 'app/template/header.php';
  
  ?>
    <div class="content-header d-none">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 class="m-0 text-dark"> MarketPlace </h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content pt-3">
      <div class="container">
        <div class="row col">

          <?php 
            if($hasproduct == 0){
          ?>

          <div class='col-md-12 d-flex flex-wrap flex-column align-items-center justify-content-center p-0 mt-4'>
            <h4>EL PRODUCTO NO SE HA ENCONTRADO</h4>
            <a href="../marketplace/"><h4>Prueba buscando nuevos productos</h4></a>
          </div>

          <?php
            }else{
          ?>

          <div class='col-md-12 mb-3 d-flex flex-wrap bg-white shadow-sm py-4 p-0'>
            <div class='col-md-6 py-2 px-3'>
              <div class='col-md-12' style='
                background-image: url("dist/img/productos/<?=$producto['imagen']?>");   
                background-repeat: no-repeat;
                height:400px;
                background-position: center;
                background-size: contain;
                position: relative;'>
              </div>
            </div>
            <div class='col-md-6 py-3 px-4'>
              <div class="col-md-12 d-flex flex-column">
                <h3><?=$producto['nombre']?></h3>
                <h4 class='text-muted'><?=$producto['descripcion']?></h4>
                <h4 class='mb-4'>Precio: $<?=$producto['precio']?></h4>
                <a href="" class='mb-4'>
                  <h5 class='mb-0'><i class='fas fa-store'></i>&nbsp; <?=$producto['nombre_tienda']?></h5>
                </a>
                <div class="mb-4">
                  <input type="number" class='form-control' value="1" min="0" placeholder="cantidad">
                </div>
                <div class='col-md-12 mb-3 p-0 d-flex justify-content-start flex- wrap'>
                  <div class='col-md-6 p-0'>
                    <button class='btn btn-warning btn-block'><i class='fas fa-star'></i>&nbsp;Agregar a favoritos</button>
                  </div>
                  <div class='col-md-6 p-0'>
                    <button class='btn btn-secondary btn-block'><i class='fas fa-shopping-cart'></i>&nbsp;Agregar a carrito</button>
                  </div>
                </div>
                <div class=''>
                  <button class='btn btn-primary'><i class='fas fa-check-circle'></i>&nbsp;COMPRAR AHORA</button>
                </div>
              </div>
            </div>
            <div class='col-md-12'>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Detalles del producto</a></li>
                      <li class="nav-item"><a class="nav-link" href="#comentarios" data-toggle="tab">Valoraciones de clientes</a></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity"> 
                        <span class='text-muted'>NO SE HAN ENCONTRADO DETALLES</span>
                      </div>
                      <div class="tab-pane" id="comentarios">
                        <span class='text-muted'>NO SE HAN AGREGADO COMENTARIOS</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class='col-md-12 d-flex flex-wrap bg-white shadow-sm py-4 mb-3'>
            <div class="col">
              <span class=''>MÁS PRODUCTOS DE ESTA TIENDA</span>
              <div class='d-flex flex-wrap'>

                <?php for ($i=0; $i < count($productos); $i++) { 
                  $r = $productos[$i];?>

                <div class='col-md-2 p-2'>
                  <a href="producto.php?id=<?=$r['id']?>">
                  <div class="bg-white shadow-sm card-product" style='border: 1px solid #f4f4f4;'>
                    <!-- <img src="dist/img/productos/<?=$r['imagen']?>" style='width:100%; min-height: 165px;'> -->
                    <div class='col-md-12 p-0' style='
                      background-image: url("dist/img/productos/<?=$r['imagen']?>");   
                      background-repeat: no-repeat;
                      height:150px;
                      background-position: center;
                      background-size: contain;
                      position: relative;'>
                    </div>
                    <div class='p-2'>
                      <div class="text-truncate"><?=$r['nombre']?>
                      </div>
                      <div class='d-flex justify-content-between'>
                        <b style='font-size: 12pt;'>$<?=$r['precio']?></b>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>

                <?php } ?>
                
              </div>
            </div>
          </div>

          <?php } ?>
  
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

<?php require 'app/template/footer.php'; ?>