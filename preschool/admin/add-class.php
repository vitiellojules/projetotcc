<?php 
session_start();
// Conexão com o Banco de Dados
include('includes/config.php');

// Validando a Sessão
if(strlen($_SESSION['aid'])==0) { 
    header('location:index.php');
} else {
    // Código para Adicionar Novo Professor
    if(isset($_POST['submit'])) {
        // Obtendo os Valores do Post  
        $tid = $_POST['teacher'];
        $cname = $_POST['classname'];
        $agegroup = $_POST['agegroup'];
        $classtiming = $_POST['classtiming'];
        $capacity = $_POST['capacity'];
        $addedby = $_SESSION['uname'];
        $profilepic = $_FILES["profilepic"]["name"];
        
        // Obtendo a extensão da imagem
        $extension = substr($profilepic, strlen($profilepic) - 4, strlen($profilepic));
        // Extensões permitidas
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        
        // Validação para extensões permitidas. A função in_array() pesquisa um array para um valor específico.
        if(!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Formato inválido. Apenas formatos jpg / jpeg / png / gif são permitidos.');</script>";
        } else {
            // Renomear o arquivo da imagem
            $newprofilepic = md5($profilepic) . time() . $extension;
            // Código para mover a imagem para o diretório
            move_uploaded_file($_FILES["profilepic"]["tmp_name"], "classpic/" . $newprofilepic);
            
            $query = mysqli_query($con, "insert into tblclasses(teacherId, className, ageGroup, classTiming, capacity, feacturePic, addedBy) values('$tid', '$cname', '$agegroup', '$classtiming', '$capacity', '$newprofilepic', '$addedby')");
            if($query) {
                echo "<script>alert('Classe adicionada com sucesso.');</script>";
                echo "<script type='text/javascript'> document.location = 'add-class.php'; </script>";
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
    <title>Sistema de Inscrição na Pré-Escola | Adicionar Classe</title>

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

    <!-- Container Principal do Sidebar -->
    <?php include_once("includes/sidebar.php");?>

    <!-- Wrapper de Conteúdo. Contém o conteúdo da página -->
    <div class="content-wrapper">
        <!-- Cabeçalho do Conteúdo (Cabeçalho da página) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Adicionar Classe</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Menu</a></li>
                            <li class="breadcrumb-item active">Adicionar Classe</li>
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
                        <!-- elementos de formulário geral -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Informações Pessoais</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- início do formulário -->
                            <form name="addlawyer" method="post" enctype="multipart/form-data">
                                <div class="card-body">

                                    <!-- Professor -->
                                    <div class="form-group">
                                        <label for="exampleInputFullname">Professor</label>
                                        <select class="form-control" id="teacher" name="teacher" required>
                                            <option value="">Selecione o Professor</option>
                                            <?php $query=mysqli_query($con, "select id, fullName, teacherSubject from tblteachers");
                                            while($row=mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['fullName'];?>-(<?php echo $row['teacherSubject'];?>)</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <!-- Classe -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nome da Classe</label>
                                        <input type="text" class="form-control" id="classname" name="classname" placeholder="Nome da Classe e.g: Desenho, Dança, Diversão" required>
                                    </div>
                                    <!-- Grupo de Idade -->
                                    <div class="form-group">
                                        <label for="text">Grupo de Idade</label>
                                        <select class="form-control" id="agegroup" name="agegroup" required>
                                            <option value="">Selecione</option>
                                            <option value="18 Meses-3 Anos">18 Meses-2 Anos</option>
                                            <option value="2-3 Anos">2-3 Anos</option>
                                            <option value="3-4 Anos">3-4 Anos</option>
                                            <option value="4-5 Anos">4-5 Anos</option>
                                            <option value="5-6 Anos">5-6 Anos</option>
                                        </select>
                                    </div>

                                    <!-- Horário -->
                                    <div class="form-group">
                                        <label for="text">Horário da Classe</label>
                                        <select class="form-control" id="classtiming" name="classtiming" required>
                                            <option value="">Selecione</option>
                                            <option value="8-9 AM">8-9 AM</option>
                                            <option value="9-10 AM">9-10 AM</option>
                                            <option value="10-11 AM">10-11 AM</option>
                                            <option value="11-12 PM">11-12 PM</option>
                                            <option value="12-1 PM">12-1 PM</option>
                                            <option value="1-2 PM">1-2 PM</option>
                                            <option value="2-3 PM">2-3 PM</option>
                                            <option value="3-4 PM">3-4 PM</option>
                                            <option value="4-5 PM">4-5 PM</option>
                                        </select>
                                    </div>

                                    <!-- Capacidade -->
                                    <div class="form-group">
                                        <label for="text">Capacidade</label>
                                        <select class="form-control" id="capacity" name="capacity" required>
                                            <option value="">Selecione</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>




<!-- Imagem da Classe -->
<div class="form-group">
    <label for="exampleInputFile">Imagem da Classe <span style="font-size:12px;color:red;">(Apenas formatos jpg / jpeg / png / gif permitidos)</span></label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="profilepic" name="profilepic" required="true">
            <label class="custom-file-label" for="exampleInputFile">Escolha o arquivo</label>
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
<!-- App AdminLTE -->
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
