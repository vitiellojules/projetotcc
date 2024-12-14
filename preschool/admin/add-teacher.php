<?php session_start();
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para Adicionar Novo Professor
if(isset($_POST['submit'])){
// Obtendo Valores do Post  
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobilenumber'];
$tsubject=$_POST['tsubject'];
$addedby=$_SESSION['uname'];
$profilepic=$_FILES["profilepic"]["name"];
// obter a extensão da imagem
$extension = substr($profilepic,strlen($profilepic)-4,strlen($profilepic));
// extensões permitidas
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validação para extensões permitidas. A função in_array() pesquisa um valor específico em um array.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Formato inválido. Apenas formatos jpg / jpeg / png / gif permitidos');</script>";
}
else
{
// renomear o arquivo de imagem
$newprofilepic=md5($profilepic).time().$extension;
// Código para mover a imagem para o diretório
move_uploaded_file($_FILES["profilepic"]["tmp_name"],"teacherspic/".$newprofilepic);

$query=mysqli_query($con,"insert into tblteachers(fullName,teacherEmail,teacherMobileNo,teacherSubject,teacherPic,AddedBy) values('$fname','$email','$mobileno','$tsubject','$newprofilepic','$addedby')");
if($query){
echo "<script>alert('Professor adicionado com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'add-teacher.php'; </script>";
} else {
echo "<script>alert('Algo deu errado. Por favor, tente novamente.');</script>";
}
}
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inscrição para Creche | Adicionar Professor</title>

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

  <!-- Container Principal da Barra Lateral -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Wrapper de Conteúdo. Contém o conteúdo da página -->
  <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da página) -->
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
          <!-- coluna da esquerda -->
          <div class="col-md-8">
            <!-- elementos gerais do formulário -->
            <div class="card card-primary">
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
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Digite o Nome Completo do Professor" required>
                  </div>
<!-- Email -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de E-mail</label>
                    <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Digite o e-mail" required>
                  </div>
<!-- Número -->
                  <div class="form-group">
                    <label for="text">Número de Celular</label>
                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Digite o número de celular" pattern="[0-9]{10}" title="Apenas 10 caracteres numéricos" required>
                  </div>

<!-- Assunto -->
                  <div class="form-group">
                    <label for="text">Turmas</label>
                    <input type="text" class="form-control" id="tsubject" name="tsubject" placeholder="Digite o Turmas" required>
                  </div>

  <!-- Foto de Perfil -->
  <div class="form-group">
                    <label for="exampleInputFile">Foto de Perfil <span style="font-size:12px;color:red;">(Apenas formatos jpg / jpeg / png / gif permitidos)</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profilepic" name="profilepic" required="true">
                        <label class="custom-file-label" for="exampleInputFile">Escolher arquivo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Enviar</span>
                      </div>
                    </div>
                  </div>
  <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Enviar</button>
                </div>
      
                </div>
                <!-- /.card-body -->
          
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
    // Inicializar Elementos Select2
    $('.select2').select2()

    // Inicializar Elementos Select2
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
</body>
</html>
<?php } ?>
