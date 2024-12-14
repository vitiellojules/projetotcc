<?php session_start();
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para atualizar o conteúdo de Contate-nos
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$mobnum=$_POST['mobnum'];
$pagetitle=$_POST['pagetitle'];
$pagedes=$con->real_escape_string($_POST['pagedes']);
$query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes',Email='$email',MobileNumber='$mobnum' where PageType='contactus'");
if ($query) {
echo '<script>alert("A página Contate-nos foi atualizada.")</script>';
}else{
echo '<script>alert("Algo deu errado. Por favor, tente novamente.")</script>';
}}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inscrição Creche  | Contate-nos</title>

  <!-- Fonte Google: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Estilo do tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Container Principal da Barra Lateral -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Container de Conteúdo -->
  <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Título da Página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contate-nos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Painel</a></li>
              <li class="breadcrumb-item active">Contate-nos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
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
<?php
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
<!-- Título da Página -->
   <div class="form-group">
    <label for="exampleInputFullname">Título da Página</label>
    <input type="text" class="form-control" name="pagetitle" value="<?php echo $row['PageTitle'];?>" required='true'>
   </div>

<!-- Descrição -->
   <div class="form-group">
    <label for="exampleInputFullname">Descrição da Página</label>
    <textarea name="pagedes" class="form-control" required='true' cols="140" rows="5"><?php echo $row['PageDescription'];?></textarea>
   </div>

<!-- Endereço de E-mail -->
<div class="form-group">
  <label for="exampleInputFullname">Endereço de E-mail</label>
  <input type="email" class="form-control" name="email" value="<?php echo $row['Email'];?>" required='true'>
</div>

<!-- Número de Telefone -->
<div class="form-group">
  <label for="exampleInputFullname">Número de Telefone</label>
  <input type="text" class="form-control" name="mobnum" value="<?php echo $row['MobileNumber'];?>" required='true' maxlength="10" pattern='[0-9]+'>
</div>

<?php } ?>

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
    <!-- /.conteúdo -->
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
<script src="nic.js"></script>
<!-- Script específico da página -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } ?>
