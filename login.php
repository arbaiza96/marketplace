<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Marketplace | Acceso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Market</b>place</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar sesión</p>

      <?php 

      session_start();

      if(!empty($_SESSION)){
        session_destroy();
      }

      if(!empty($_REQUEST)){


        $correo = $_REQUEST['correo'];
        $clave = $_REQUEST['clave'];

        require 'app/link/conexion.php';
        require 'app/class/principal.php';

        $i = new Principal();
        $acceso = $i->verificar_acceso($correo, $clave);

        $novalido = 0;
        if(empty($acceso)){
          $novalido = 1;
        }

        if($novalido == 0){
          $_SESSION['userid'] = $acceso['id'];
          $_SESSION['usertype'] = $acceso['tipo'];
          $_SESSION['username'] = explode(" ", $acceso['nombre'])[0];
        }

        // echo "<pre>";
        // print_r($_REQUEST);
        // print_r($acceso);
        // print_r($_SESSION);
        // echo "</pre>";

        // return false;

        if(@$acceso['tipo'] == 1){
          echo "<script>window.location.href = 'tienda/';</script>";
          // echo "tipo 1";
        }else if(@$acceso['tipo'] == 2){
          echo "<script>window.location.href = '../marketplace/';</script>";
          // echo "tipo 2";
        }else if(@$acceso['tipo'] == 3){
          echo "<script>window.location.href = 'admin/';</script>";
          // echo "tipo 0";
        } 

      }

      ?>

      <form action="<?=$_SERVER['REQUEST_URI']?>" method="post" class='mb-3'>

        <?php if(@$novalido == 1){ ?>
          <div class='alert alert-danger'>EL CORREO O LA CLAVE QUE SE HAN INGRESADO NO SON VÁLIDOS</div>
        <?php } ?>

        

        <div class="input-group mb-3">
          <input type="text" id='txtCorreo' name='correo' value="<?=@$_REQUEST['correo']?>" class="form-control" placeholder="Correo" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id='txtClave' name='clave' class="form-control" placeholder="Clave" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-key"></span>
            </div>
          </div>
        </div>
        <div class="col-md-12 p-0 form-group">
          <button type='submit' class="btn btn-primary btn-block">Entrar</button>
        </div>
        <div class="col-md-12 p-0">
          <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="chkRecordar">
            <label class="custom-control-label" for="customCheck">Recordarme</label>
          </div>
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.php">He olvidado mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Deseo registrarme</a>
      </p>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function(){
    $("#txtUsuario").focus();
  })
</script>
</body>
</html>
