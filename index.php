  
  <?php 

    

    require 'app/link/conexion.php';
    require 'app/class/principal.php';
    require 'app/template/header.php';

    $i = new Principal();
    $categorias = $i->cargar_categorias();
    $top = $i->productos_top();

    $cat1 = $i->productos_top_categoria(1);
    $cat2 = $i->productos_top_categoria(2);
    $cat3 = $i->productos_top_categoria(3);
    $cat4 = $i->productos_top_categoria(4);

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

          <!-- buscador -->
          <form class="col-md-12 mb-3" action="categorias.php" method="get">
            <div class="input-group">
              <input type="text" class='form-control' name='busqueda' placeholder='BÚSQUEDA DE PRODUCTOS'>
              <button type='submit' class='btn btn-dark'>¡BUSCAR!</button>
            </div>
          </form>

          <!-- categorías -->
          <div class="col-md-12 mb-3 d-flex flex-wrap align-items-start">
            <!-- categorías -->
            <div class='col-md-3'>
              <div class="list-group shadow-sm">
                <div class="list-group-item list-group-item-secondary py-2 px-3" style="border: none !important;">
                  <span>Categorías</span>
                </div>
                <?php for ($i=0; $i < count($categorias) ; $i++) { ?>
                  <a href='categorias.php?idcat=<?= $categorias[$i]['id']?>' class="list-group-item py-1 px-2 lista-categoria">
                    <span class='text-secondary text-center <?= $categorias[$i]['icono'] ?>' style='width:25px;'></span>
                    <span><?= $categorias[$i]['categoria'] ?></span>
                  </a>
                <?php } ?>
              </div>
            </div>
            <!-- accesos -->
            <div class="col-md-9 d-flex flex-column">
              <div class="col-md-12 p-0">
                <div id="sliderShow" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#sliderShow" data-slide-to="0" class="active"></li>
                    <li data-target="#sliderShow" data-slide-to="1"></li>
                    <li data-target="#sliderShow" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="https://via.placeholder.com/700x280/" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                      <img src="https://via.placeholder.com/700x280/" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                      <img src="http://via.placeholder.com/700x280/f1f1f1" class="d-block w-100">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#sliderShow" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next" href="#sliderShow" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>
              </div>
              <div class="col-md-12 px-0 py-3">

                <div class='bg-white shadow-sm px-3 py-3 shadow-sm d-flex flex-wrap'>

                  <a href="#mas_vendidos" class="col d-flex flex-column align-items-center justify-conten-center">
                    <span class='fas fa-cart-plus fa-2x pb-3'></span>
                    <span class='text-muted'>Más Vendidos</span>
                    <small class='text-muted px-3 text-center pt-2'>Explora los productos más vendidos</small>
                  </a>

                  <div style='border-left: 1px solid #f1f1f1;'></div>

                  <a href="#ultimos" class="col d-flex flex-column align-items-center justify-conten-center">
                    <span class='fas fa-calendar-alt fa-2x pb-3'></span>
                    <span class='text-muted'>Agregados Recientemente</span>
                    <small class='text-muted px-3 text-center pt-2'>Échale un vistazo a los productos más nuevos</small>
                  </a>

                  <div style='border-left: 1px solid #f1f1f1;'></div>

                  <a href="#tiendas" class="col d-flex flex-column align-items-center justify-conten-center">
                    <span class='fas fa-store-alt fa-2x pb-3'></span>
                    <span class='text-muted'>Tiendas</span>
                    <small class='text-muted px-3 text-center pt-2'>Explora todas las tiendas en la marketplace</small>
                  </a>

                </div>

              </div>
            </div>
          </div>

          <!-- cuerpo -->
          <div class='col-md-12 d-flex flex-wrap'>

            <!-- productos de 6 -->
            <div class="col-md-12 p-0 mb-3">
              <div class='col-md-12 px-2'>
                <div class="col px-0">
                  <span class='mb-0 px-2' style='font-size: 16pt;'>Productos TOP</span>
                  <div class='col-md-12 p-0 d-flex align-items-stretch'>

                    <?php for ($i=0; $i < count($top) ; $i++) { 
                          $r = $top[$i]; ?>
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
            </div>

            <!-- productos de 3 -->
            <div class="col-md-6 p-0 mb-3">
              <div class='col-md-12 p-0'>
                <div class="col">
                  <span class='mb-0 px-2' style='font-size: 16pt;'>Moda Mujeres</span>
                  <div class='col-md-12 p-0 d-flex '>
                    <!-- productos de esta categoria -->
                    <?php for ($i=0; $i < count($cat1) ; $i++) { 
                          $r = $cat1[$i]; ?>
                      <div class='col-md-4 p-2'>
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
                    <!-- / productos de esta categoria -->
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 p-0 mb-3">
              <div class='col-md-12 p-0'>
                <div class="col">
                  <span class='mb-0 px-2' style='font-size: 16pt;'>Moda Hombres</span>
                  <div class='col-md-12 p-0 d-flex '>
                    <?php for ($i=0; $i < count($cat2) ; $i++) { 
                          $r = $cat2[$i]; ?>
                      <div class='col-md-4 p-2'>
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
            </div>

             <div class="col-md-6 p-0 mb-3">
              <div class='col-md-12 p-0'>
                <div class="col">
                  <span class='mb-0 px-2' style='font-size: 16pt;'>Teléfono y Accesorios</span>
                  <div class='col-md-12 p-0 d-flex '>
                    <?php for ($i=0; $i < count($cat3) ; $i++) { 
                          $r = $cat3[$i]; ?>
                      <div class='col-md-4 p-2'>
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
            </div>

            <div class="col-md-6 p-0 mb-3">
              <div class='col-md-12 p-0'>

                <div class="col">
                  <span class='mb-0 px-2' style='font-size: 16pt;'>Computadoras</span>
                  <div class='col-md-12 p-0 d-flex '>
                    
                    <?php for ($i=0; $i < count($cat4) ; $i++) { 
                          $r = $cat4[$i]; ?>
                      <div class='col-md-4 p-2'>
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
            </div>

          </div>

  
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

<?php require 'app/template/footer.php'; ?>