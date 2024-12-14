



<?php session_start();
// Conexão com o banco de dados
include('includes/config.php');
// Validação da Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para atualizar a imagem do professor
if(isset($_POST['submit'])){

$lid=intval($_GET['tid']); 
// Obtendo valores do formulário  
$currentpic=$_POST['currentprofilepic'];
$oldprofilepic="teacherspic"."/".$currentpic;
$profilepic=$_FILES["profilepic"]["name"];
// obtendo a extensão da imagem
$extension = substr($profilepic,strlen($profilepic)-4,strlen($profilepic));
// extensões permitidas
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validação para extensões permitidas. A função in_array() procura um valor específico em um array.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Formato inválido. Apenas formatos jpg / jpeg / png / gif são permitidos');</script>";
}
else
{
// renomear o arquivo de imagem
$newprofilepic=md5($profilepic).time().$extension;
// Código para mover a imagem para o diretório
move_uploaded_file($_FILES["profilepic"]["tmp_name"],"teacherspic/".$newprofilepic);

$query=mysqli_query($con,"update tblteachers set teacherPic='$newprofilepic' where id='$lid'");
if($query){
unlink($oldprofilepic);  
echo "<script>alert('Foto do professor atualizada com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'gerenciar-professores.php'; </script>";
} else {
echo "<script>alert('Algo deu errado. Por favor, tente novamente.');</script>";
}
}
}

  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Matrícula Creche | Atualizar Foto do Perfil do Professor</title>

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
  <!-- Estilo do tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Barra lateral principal -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Conteúdo da página -->
  <div class="content-wrapper">
    <!-- Cabeçalho do conteúdo -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Atualizar Foto do Perfil do Professor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">MENU</a></li>
              <li class="breadcrumb-item active">Atualizar Foto do Perfil do Professor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Coluna esquerda -->
          <div class="col-md-8">
            <!-- Elementos gerais do formulário -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Foto de Perfil</h3>
              </div>
              <!-- /.card-header -->
              <!-- início do formulário -->
              <form name="addlawyer" method="post" enctype="multipart/form-data">
                <div class="card-body">

<?php 
$tid=intval($_GET['tid']);
$query=mysqli_query($con,"select teacherPic,id from tblteachers where id='$tid'");
while($result=mysqli_fetch_array($query))
{
?>


<!--  Foto atual do perfil -->
   <div class="form-group">
                    <label for="exampleInputFullname">Foto Atual do Perfil</label>
       <img src="teacherspic/<?php echo $result['teacherPic']?>" width="200">
                  </div>

<?php } ?>
  <!-- Nova foto de perfil -->
  <div class="form-group">
                    <label for="exampleInputFile">Nova Foto de Perfil <span style="font-size:12px;color:red;">(Apenas formatos jpg / jpeg / png / gif são permitidos)</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name="currentprofilepic" value="<?php echo $result['teacherPic'];?>">
                        <input type="file" class="custom-file-input" id="profilepic" name="profilepic" required="true">
                        <label class="custom-file-label" for="exampleInputFile">Escolher arquivo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Enviar</span>
                      </div>
                    </div>
                  </div>

      <div class="card-footer" align="center">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Atualizar</button>
                </div>


                </div>
                <!-- /.card-body -->
          
            </div>
            <!-- /.card -->
          </div>
          <!--/.coluna esquerda -->
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
<!-- Script específico da página -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
  $(function () {
    // Inicializa os elementos Select2
    $('.select2').select2()

    // Inicializa os elementos Select2 com tema Bootstrap 4
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
</body>
</html>
<?php } ?>
