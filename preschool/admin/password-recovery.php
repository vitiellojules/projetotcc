<?php 
// error_reporting(0);
include('includes/config.php');

if(isset($_POST['resetpwd']))
{
  $uname = $_POST['username'];
  $mobile = $_POST['mobileno'];
  $newpassword = md5($_POST['newpassword']);
  $sql = mysqli_query($con, "SELECT ID FROM tbladmin WHERE AdminuserName='$uname' AND MobileNumber='$mobile'");
  $rowcount = mysqli_num_rows($sql);

  if($rowcount > 0) {
    $query = mysqli_query($con, "UPDATE tbladmin SET Password='$newpassword' WHERE AdminuserName='$uname' AND MobileNumber='$mobile'");
    if($query) {
      echo "<script>alert('Sua senha foi alterada com sucesso');</script>";
      echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
      echo "<script>alert('Nome de usuário ou número de telefone inválido');</script>"; 
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Matrícula Creche | Recuperação de Senha</title>

  <!-- Fonte Google: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Estilo do Tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  
  <script type="text/javascript">
    function valid() {
      if (document.passwordrecovery.newpassword.value != document.passwordrecovery.confirmpassword.value) {
        alert("Os campos Nova Senha e Confirmar Senha não coincidem!");
        document.passwordrecovery.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../index.php" class="h1"><b>Admin</b> | Creche </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Redefina sua senha</p>

      <form name="passwordrecovery" method="post" onSubmit="return valid();">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome de Usuário" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Número de Telefone" name="mobileno" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Nova Senha" name="newpassword" id="newpassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar Senha" name="confirmpassword" id="confirmpassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="resetpwd">Redefinir</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="index.php">Entrar</a>
      </p>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
