<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Marketplace | Registro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Market</b>place</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Formulario de registro</p>

      <div class='mb-2'>
        <div class='col-md-12 p-0 mb-3'>
          <div class='d-flex justify-content-around px-3'>
            <div class=''>
              <label for="rad_tienda" style='font-weight: 400;'>
                <span>Vendedor</span>&nbsp;
                <input id='rad_tienda' type="radio" name='rad_tipo_registro'>
              </label>
            </div>
            <div>
              <label for="rad_persona" style='font-weight: 400;'>
                <span>Cliente</span>&nbsp;
                <input id='rad_persona' type="radio" checked autocomplete="off" name='rad_tipo_registro'>
              </label>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name='nombre' id='txtNombre' autocomplete="off" placeholder="Nombre completo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name='correo' id='txtCorreo' autocomplete="off" placeholder="Correo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name='clave' id='txtClave' autocomplete="off" placeholder="Clave">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name='clave' id='txtClave2' autocomplete="off" placeholder="Clave">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="button" id='btnGuardar' class="btn btn-primary btn-block">Registrarme</button>
          </div>
        </div>
      </div>

      <script>
        $(document).ready(function(){
          $("#btnGuardar").click(function(){
            let rad_tipo = $("#rad_tienda").prop("checked");
            let nombre = $("#txtNombre").val();
            let correo = $("#txtCorreo").val();
            let clave = $("#txtClave").val();
            let clave2 = $("#txtClave2").val();

            let ftipo = "";
            if(rad_tipo){
              ftipo = 1;
            }else{
              ftipo = 2;
            }

            if(clave2 != clave){
              alert("LAS CLAVES NO COINCIDEN");
              return false;
            }

            $.ajax({
              url: 'app/request.php',
              type: 'post',
              dataType: 'json',
              data: {
                modelo: 'empresas',
                accion: 'guardar_registro',
                tipo: ftipo,
                nombre: nombre,
                correo: correo,
                clave: clave,
              },
              beforeSend : function(){
                $("#btnGuardar").text("Procesando").attr("disabled","disabled").addClass("disabled");
              }
            }).always(function(){
              $("#btnGuardar").text("Registrarme").removeAttr("disabled","disabled").removeClass("disabled");
            }).done(function(data){
              if(data == 1){
                alert("REGISTRO COMPLETO, DEBE INICIAR SESION");
                window.location.href = "../marketplace/login.php";
              }
            })


          })
        })
      </script>

      <a href="login.php" class="text-center">Ya soy miembro de este sitio</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

</body>
</html>
