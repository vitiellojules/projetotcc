<?php session_start();
// Conexão com o banco de dados
include('includes/config.php');
// Validando a sessão
if(strlen($_SESSION['aid'])==0)
{ 
    header('location:index.php');
}
else{
    // Código para adicionar novo subadministrador
    if(isset($_POST['submit'])){
        $username=$_POST['sadminusername'];
        $fname=$_POST['fullname'];
        $email=$_POST['emailid'];
        $mobileno=$_POST['mobilenumber'];
        $password=md5($_POST['inputpwd']);
        $usertype='0';
        
        $query=mysqli_query($con,"insert into tbladmin(AdminuserName,AdminName,MobileNumber,Email,Password,UserType ) values('$username','$fname','$mobileno','$email','$password','$usertype')");
        
        if($query){
            echo "<script>alert('Detalhes do subadministrador adicionados com sucesso.');</script>";
            echo "<script type='text/javascript'> document.location = 'add-subadmin.php'; </script>";
        } else {
            echo "<script>alert('Algo deu errado. Por favor, tente novamente.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Matrícula na Creche | Adicionar Subadministrador</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Estilo do tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  
  <!-- Função de Disponibilidade de Email -->
  <script>
  function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data:'username='+$("#sadminusername").val(),
        type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
  }
  </script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Cabeçalho da página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Criar Subadministrador</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Painel</a></li>
              <li class="breadcrumb-item active">Adicionar Subadministrador</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- coluna esquerda -->
          <div class="col-md-8">
            <!-- elementos gerais do formulário -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Preencha as Informações</h3>
              </div>
              <!-- /.card-header -->
              <!-- início do formulário -->
              <form name="subadmin" method="post">
                <div class="card-body">
                  <!-- Nome de usuário -->
                  <div class="form-group">
                    <label for="exampleInputusername">Nome de Usuário (usado para login)</label>
                    <input type="text" placeholder="Digite o Nome de Usuário do Subadministrador" name="sadminusername" id="sadminusername" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="O nome de usuário deve ser alfanumérico com 6 a 12 caracteres" onBlur="checkAvailability()" required>
                    <span id="user-availability-status" style="font-size:14px;"></span>
                  </div>
                  <!-- Nome completo do Subadministrador -->
                  <div class="form-group">
                    <label for="exampleInputFullname">Nome Completo</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Digite o Nome Completo do Subadministrador" required>
                  </div>
                  <!-- Email do Subadministrador -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de Email</label>
                    <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Digite o email" required>
                  </div>
                  <!-- Número de Contato do Subadministrador -->
                  <div class="form-group">
                    <label for="text">Número de Telefone</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Digite o telefone" pattern="[0-9]{10}" title="Apenas 10 caracteres numéricos" required>
                  </div>
                  <!-- Senha -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" id="inputpwd" name="inputpwd" placeholder="Senha" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Enviar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (esquerda) -->
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
