<?php 
session_start();
// Conexão com o Banco de Dados
include('includes/config.php');
// Validação da Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para Atualizar os Detalhes do Subadmin
if(isset($_POST['update'])){
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobilenumber'];
$subadminid=intval($_GET['said']);
$query=mysqli_query($con,"update tbladmin set AdminName='$fname',MobileNumber='$mobileno',Email='$email' where UserType=0 and ID='$subadminid'");
if($query){
echo "<script>alert('Detalhes do subadmin atualizados com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-subadmins.php'; </script>";
} else {
echo "<script>alert('Algo deu errado. Por favor, tente novamente.');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inscrição Pré-Escolar | Editar/Atualizar Subadmin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Estilo do Tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--Função para Verificação de Disponibilidade de Email-->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Barra de Navegação -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Container Principal da Barra Lateral -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Container de Conteúdo. Contém o conteúdo da página -->
  <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da Página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Detalhes do Subadmin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Painel</a></li>
              <li class="breadcrumb-item active">Editar Detalhes do Subadmin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php 
$said=intval($_GET['said']);
$query=mysqli_query($con,"select * from tbladmin where UserType=0 and ID='$said'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
    <!-- Conteúdo Principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Coluna à Esquerda -->
          <div class="col-md-8">
            <!-- Elementos do Formulário Geral -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Atualizar as Informações</h3>
              </div>
              <!-- /.card-header -->
              <!-- Início do Formulário -->
              <form name="subadmin" method="post">
                <div class="card-body">
<!-- Nome de Usuário-->
    <div class="form-group">
                    <label for="exampleInputusername">Nome de Usuário (usado para login)</label>
               <input type="text"   name="sadminusername" id="sadminusername" class="form-control" value="<?php echo $result['AdminuserName'];?>" readonly>
                  </div>
<!-- Nome Completo do Subadmin--->
   <div class="form-group">
                    <label for="exampleInputFullname">Nome Completo</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $result['AdminName'];?>" placeholder="Insira o Nome Completo do Subadmin" required>
                  </div>
<!-- Email do Subadmin---->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de Email</label>
                    <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Insira o Email" required value="<?php echo $result['Email'];?>">
                  </div>
<!-- Número de Contato do Subadmin---->
                  <div class="form-group">
                    <label for="text">Número de Celular</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Insira o Número de Celular" pattern="[0-9]{10}" title="Apenas 10 caracteres numéricos" required value="<?php echo $result['MobileNumber'];?>">
                  </div>

<?php } ?>
      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update" id="update">Atualizar</button>
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
<!-- AdminLTE para propósitos de demonstração -->
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
