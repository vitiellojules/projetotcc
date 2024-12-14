<?php session_start();
// Conexão com o banco de dados
include('includes/config.php');
// Validando a Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para redefinir a senha do sub-admin
if(isset($_POST['reset'])){
$sudadminid=intval($_GET['said']);
$password=md5($_POST['inputpwd']);

$query=mysqli_query($con,"update tbladmin set Password='$password' where UserType=0 and ID='$sudadminid'");
if($query){
echo "<script>alert('Senha do Sub-Admin redefinida com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
} else {
echo "<script>alert('Algo deu errado. Por favor, tente novamente.');</script>";
}
}

  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inscrição Creche | Redefinir Senha do Sub-Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Estilo do Tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--Função para validação de senha e confirmação de senha-->
 <script type="text/javascript">
function checkpass()
{
if(document.resetpassword.inputpwd.value!=document.resetpassword.confirmpassword.value)
{
alert('Os campos Nova Senha e Confirmar Senha não coincidem');
document.resetpassword.confirmpassword.focus();
return false;
}
return true;
}   
</script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Menu Lateral Principal -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Conteúdo Principal -->
  <div class="content-wrapper">
    <!-- Cabeçalho de Conteúdo (Título da Página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Redefinir Senha do Sub-Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Painel de Controle</a></li>
              <li class="breadcrumb-item active">Redefinir Senha do Sub-Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Coluna Esquerda -->
          <div class="col-md-8">
            <!-- Elementos Gerais do Formulário -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Redefinir Senha</h3>
              </div>
              <!-- /.card-header -->
              <!-- Formulário Início -->
              <form name="resetpassword" method="post" onsubmit="return checkpass();">
                <div class="card-body">

<!---Senha--->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="inputpwd" name="inputpwd" placeholder="Senha" required>
                  </div>
  <!---Confirmar Senha--->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirmar Senha</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirmar Senha" required>
                  </div>
  
      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="reset" id="reset">Redefinir</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        
          </div>
          <!--/.col (left) -->
  
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE para fins de demonstração -->
<script src="../dist/js/demo.js"></script>
<!-- Script específico da página -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } ?>
