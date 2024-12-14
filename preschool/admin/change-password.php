<?php session_start();
// Conexão com o banco de dados
include('includes/config.php');
// Validando a sessão
if(strlen($_SESSION['aid']) == 0) { 
    header('location:index.php');
} else {
    // Código para alterar a senha
    if(isset($_POST['change'])){
        $admid = $_SESSION['aid'];
        $cpassword = ($_POST['currentpassword']);  //md5
        $newpassword = ($_POST['newpassword']);   // md5
        $query = mysqli_query($con, "select ID from tbladmin where ID='$admid' and Password='$cpassword'");
        $row = mysqli_fetch_array($query);
        if($row > 0){
            $ret = mysqli_query($con, "update tbladmin set Password='$newpassword' where ID='$admid'");
            echo '<script>alert("Sua senha foi alterada com sucesso.")</script>';
        } else {
            echo '<script>alert("Sua senha atual está incorreta.")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Matrícula | Alterar Senha</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Estilo do tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  
  <!-- Função de verificação de senha -->
  <script type="text/javascript">
  function checkpass() {
    if(document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
        alert('Os campos Nova Senha e Confirmar Senha não correspondem');
        document.changepassword.confirmpassword.focus();
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
  
  <!-- Main Sidebar Container -->
  <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Conteúdo da página -->
  <div class="content-wrapper">
    <!-- Cabeçalho de conteúdo -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alterar Senha</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Painel</a></li>
              <li class="breadcrumb-item active">Alterar Senha</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Conteúdo principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- coluna esquerda -->
          <div class="col-md-8">
            <!-- formulário geral -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Alterar sua Senha</h3>
              </div>
              <!-- formulário -->
              <form method="post" name="changepassword" onsubmit="return checkpass();">  
                <div class="card-body">

                  <!-- Senha atual -->
                  <div class="form-group">
                    <label for="currentpassword">Senha Atual</label>
                    <input class="form-control" id="currentpassword" name="currentpassword" type="password" required="true">
                  </div>

                  <!-- Nova Senha -->
                  <div class="form-group">
                    <label for="newpassword">Nova Senha</label>
                    <input class="form-control" id="newpassword" type="password" name="newpassword" required="true">
                  </div>

                  <!-- Confirmar Senha -->
                  <div class="form-group">
                    <label for="confirmpassword">Confirmar Senha</label>
                    <input class="form-control" id="confirmpassword" type="password" name="confirmpassword" required="true">
                  </div>

                </div>
                <!-- Botão de envio -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="change" id="change">Alterar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Rodapé -->
  <?php include_once('includes/footer.php');?>

</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } ?>
