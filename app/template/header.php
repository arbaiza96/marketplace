
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MarketPlace</title>
  <link rel="stylesheet" href="plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="http://localhost/marketplace/" class="navbar-brand">
        <i class="fa-2x fab fa-medium-m text-secondary px-2"></i>
        <span class="brand-text font-weight-light">MarketPlace</span>
      </a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- $_category_in_menu -->
      <?php if(@$_category_in_menu == 1){ ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Categorías</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <?php for ($i=0; $i < count($categorias) ; $i++) { ?>
                <li>
                  <a href="categorias.php?idcat=<?= $categorias[$i]['id']?>" class="dropdown-item">
                    <span class='text-secondary text-center <?= $categorias[$i]['icono'] ?>' style='width:25px;'></span>
                    <?= $categorias[$i]['categoria'] ?>
                  </a>
                </li>
                <?php } ?>
            </ul>
          </li>
        </ul>
      <?php } ?>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- lista de favoritos -->
        <li class='nav-item'>
          <a class="nav-link" href="favoritos.php">
            <i class="fas fa-star"></i>
            <!-- <span class="badge badge-danger navbar-badge">1</span> -->
          </a>
        </li>
        <!-- carrito de compras -->
        <li class='nav-item'>
          <a class="nav-link" href="carrito.php">
            <i class="fas fa-shopping-cart"></i>
            <!-- <span class="badge badge-warning navbar-badge">3</span> -->
          </a>
        </li>
        <!-- custom item -->


        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>&nbsp;
            <span>Hola, <?= (empty($_SESSION['username']) ? 'usuario' : $_SESSION['username']); ?></span>
          </a>
          <?php if(empty($_SESSION)){ ?>
          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <a href="login.php" class="dropdown-item">
              <i class="fas fa-sign-in-alt mr-2"></i> Identifícate
            </a>
          </div>
          <?php }else{ ?>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <a href="login.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Salir
            </a>
          </div>
          <?php } ?>
        </li>

      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
