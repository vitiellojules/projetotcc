<?php session_start();
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando a Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para Atualizar os Detalhes do Sub Administrador
if(isset($_POST['update'])){
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobilenumber'];
$adminid=intval($_SESSION['aid']);
$query=mysqli_query($con,"update tbladmin set AdminName='$fname',MobileNumber='$mobileno',Email='$email' where  ID='$adminid'");
if($query){
echo "<script>alert('Detalhes do perfil atualizados com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
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
  <title>Sistema de Matrícula Creche | Meu Perfil</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Estilo do Tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--Função Verificar Disponibilidade de Email---->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Container Principal da Barra Lateral -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Conteúdo Principal -->
  <div class="content-wrapper">
    <!-- Cabeçalho de Conteúdo (Cabeçalho da Página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Meu Perfil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Painel de Controle</a></li>
              <li class="breadcrumb-item active">Meu Perfil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php 
$adminid=intval($_SESSION['aid']);
$query=mysqli_query($con,"select * from tbladmin where  ID='$adminid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
    <!-- Conteúdo Principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Coluna esquerda -->
          <div class="col-md-8">
            <!-- Formulário de Atualização -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Atualizar Informações</h3>
              </div>
              <!-- /.card-header -->
              <!-- início do formulário -->
              <form name="subadmin" method="post">
                <div class="card-body">
<!-- Nome de usuário -->
    <div class="form-group">
                    <label for="exampleInputusername">Nome de Usuário (usado para login)</label>
               <input type="text"   name="sadminusername" id="sadminusername" class="form-control" value="<?php echo $result['AdminuserName'];?>" readonly>
                  </div>
<!-- Nome Completo do Administrador -->
   <div class="form-group">
                    <label for="exampleInputFullname">Nome Completo</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $result['AdminName'];?>" placeholder="Digite o Nome Completo do Sub-Administrador" required>
                  </div>
<!-- Email do Administrador -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de Email</label>
                    <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Digite o email" required value="<?php echo $result['Email'];?>">
                  </div>
<!-- Número de Telefone do Administrador -->
                  <div class="form-group">
                    <label for="text">Número de Telefone</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Digite o telefone" pattern="[0-9]{10}" title="Apenas 10 caracteres numéricos" maxlength="10" required value="<?php echo $result['MobileNumber'];?>">
                  </div>

<!-- Data de Registro do Perfil do Administrador -->
                  <div class="form-group">
                    <label for="text">Data de Registro</label>
                    <input type="text" class="form-control" id="regdate" name="regdate"  required value="<?php echo $result['AdminRegdate'];?>" readonly>
                  </div>

<?php } ?>
      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update" id="update">Atualizar</button>
                </div>
              </form>
            </div>
            <!-- /.formulário -->

          </div>
          <!-- /.coluna esquerda -->
        </div>
        <!-- /.linha -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.conteúdo -->
  </div>
  <!-- /.conteúdo principal -->
<?php include_once('includes/footer.php');?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- App AdminLTE -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE para fins de demonstração -->
<script src="../dist/js/demo.js"></script>
<!-- Script da página -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } ?>
