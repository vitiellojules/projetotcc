<?php session_start();
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando a Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para atualizar a imagem da turma
if(isset($_POST['submit'])){

$cid=intval($_GET['cid']); 
// Obtendo os valores enviados
$currentpic=$_POST['currentprofilepic'];
$oldprofilepic="classpic"."/".$currentpic;
$profilepic=$_FILES["teacherpic"]["name"];
// Obtendo a extensão da imagem
$extension = substr($profilepic,strlen($profilepic)-4,strlen($profilepic));
// Extensões permitidas
$extensoes_permitidas = array(".jpg","jpeg",".png",".gif");
// Validação para extensões permitidas. A função in_array() verifica se um valor está em um array.
if(!in_array($extension,$extensoes_permitidas))
{
echo "<script>alert('Formato inválido. Apenas formatos jpg / jpeg / png / gif são permitidos');</script>";
}
else
{
// Renomeando o arquivo da imagem
$newprofilepic=md5($profilepic).time().$extension;
// Código para mover a imagem para o diretório
move_uploaded_file($_FILES["teacherpic"]["tmp_name"],"classpic/".$newprofilepic);

$query=mysqli_query($con,"update tblclasses set feacturePic='$newprofilepic' where id='$cid'");
if($query){
unlink($oldprofilepic);  
echo "<script>alert('Imagem da turma atualizada com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-classes.php'; </script>";
} else {
echo "<script>alert('Ocorreu um erro. Por favor, tente novamente.');</script>";
}
}
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Matrículas da Creche | Atualizar Foto da Turma</title>

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

  <!-- Container Principal do Sidebar -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Container de Conteúdo -->
  <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Atualizar Foto da Turma</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">MENU</a></li>
              <li class="breadcrumb-item active">Atualizar Foto da Turma</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Coluna esquerda -->
          <div class="col-md-8">
            <!-- Elementos do formulário -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Foto da Turma</h3>
              </div>
              <!-- /.card-header -->
              <!-- Início do formulário -->
              <form name="addlawyer" method="post" enctype="multipart/form-data">
                <div class="card-body">

<?php 
$cid=intval($_GET['cid']);
$query=mysqli_query($con,"select feacturePic,id from tblclasses where id='$cid'");
while($result=mysqli_fetch_array($query))
{
?>


<!-- Foto atual da turma -->
   <div class="form-group">
                    <label for="exampleInputFullname">Foto Atual</label>
       <img src="classpic/<?php echo $result['feacturePic']?>" width="200">
                  </div>

<?php } ?>
  <!-- Nova Foto -->
  <div class="form-group">
                    <label for="exampleInputFile">Nova Foto <span style="font-size:12px;color:red;">(Apenas formatos jpg / jpeg / png / gif são permitidos)</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name="currentprofilepic" value="<?php echo $result['feacturePic'];?>">
                        <input type="file" class="custom-file-input" id="teacherpic" name="teacherpic" required="true">
                        <label class="custom-file-label" for="exampleInputFile">Escolher arquivo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
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
<!-- Script específico da página -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
  $(function () {
    // Inicializar elementos Select2
    $('.select2').select2()

    // Inicializar elementos Select2 com tema Bootstrap 4
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
</body>
</html>
<?php } ?>
