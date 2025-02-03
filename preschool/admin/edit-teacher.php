<?php session_start();
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando a Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para atualização dos detalhes do professor
if(isset($_POST['submit'])){
// Obtendo os valores do POST  
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobilenumber'];
$tsubject=$_POST['tsubject'];
$teacherid=intval($_GET['tid']);

$query=mysqli_query($con,"update tblteachers set fullName='$fname',teacherEmail='$email',teacherMobileNo='$mobileno',teacherSubject='$tsubject' where id='$teacherid'");
if($query){
echo "<script>alert('Detalhes do professor atualizados com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-teachers.php'; </script>";
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
  <title>Sistema de Matrícula para creche  | Adicionar Professor</title>

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- Estilo do Tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Container Principal da Barra Lateral -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da Página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Adicionar Professor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Painel</a></li>
              <li class="breadcrumb-item active">Adicionar Professor</li>
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

<?php
$teacherid=intval($_GET['tid']);
$query=mysqli_query($con,"select * from tblteachers where id='$teacherid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

              <div class="card-header">
                <h3 class="card-title">Informações Pessoais</h3>
              </div>
              <!-- /.card-header -->
              <!-- início do formulário -->
              <form name="addlawyer" method="post" enctype="multipart/form-data">
                <div class="card-body">

<!-- Nome Completo -->
   <div class="form-group">
                    <label for="exampleInputFullname">Nome Completo</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Digite o Nome Completo do Professor" value="<?php echo $result['fullName']?>" required>
                  </div>
<!-- Email -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de Email</label>
                    <input type="email" class="form-control" id="emailid" name="emailid" value="<?php echo $result['teacherEmail']?>" placeholder="Digite o email" required>
                  </div>
<!-- Número -->
                  <div class="form-group">
                    <label for="text">Número de Telefone</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Digite o número" pattern="[0-9]{10}" title="Apenas 10 caracteres numéricos" value="<?php echo $result['teacherMobileNo']?>" required>
                  </div>

<!-- Disciplina -->
                  <div class="form-group">
                    <label for="text">Disciplina/Designação</label>
                    <input type="text" class="form-control" id="tsubject" value="<?php echo $result['teacherSubject']?>" name="tsubject" placeholder="Digite a Disciplina/Designação"  required>
                  </div>

  <!-- Foto de Perfil -->
  <div class="form-group">
                    <label for="exampleInputFile">Foto de Perfil</label>
               <img src="teacherspic/<?php echo $result['teacherPic']?>" width="120">
               <a href="update-teacher-pic.php?tid=<?php echo $result['id'];?>">Atualizar Foto de Perfil</a>
                  </div>
  <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Atualizar</button>
                </div>
      
                </div>
                <!-- /.card-body -->
 <?php } ?>         

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (esquerda) -->
              </form>
       
  
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
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
  $(function () {
    // Inicializar elementos Select2
    $('.select2').select2()

    // Inicializar elementos Select2
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
</body>
</html>
<?php } ?>
