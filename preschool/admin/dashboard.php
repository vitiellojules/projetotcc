<?php session_start();
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{ ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inscrição Creche | MENU</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Estilo do tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Seletor de intervalo de datas -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
<?php include_once('includes/navbar.php');?>


  <!-- Container Principal da Barra Lateral -->
<?php include_once('includes/sidebar.php');?>

  <!-- Conteúdo Principal -->
  <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Visão Geral </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Início</a></li>
              <li class="breadcrumb-item active">MENU</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Fim do Cabeçalho do Conteúdo -->

    <!-- Conteúdo Principal -->
    <section class="content">
      <div class="container-fluid">
        <!-- Pequenos blocos (caixas de estatísticas) -->
        <div class="row">

          <?php if($_SESSION['utype']==1):?>
          <div class="col-lg-4 col-6">
            <!-- caixa pequena -->
            <div class="small-box bg-info">
              <div class="inner">
<?php $query=mysqli_query($con,"select id from tbladmin where UserType=0");
$subadmincount=mysqli_num_rows($query);
?>


                <h3><?php echo $subadmincount;?></h3>
                <p>Sub Admins</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="manage-subadmins.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endif;?>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- caixa pequena -->
            <div class="small-box bg-success">
              <div class="inner">
<?php $query1=mysqli_query($con,"select id from tblteachers");
$listedteachers=mysqli_num_rows($query1);
?>

                <h3><?php echo $listedteachers;?></h3>

                <p>Professores Listados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="manage-teachers.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- caixa pequena -->
            <div class="small-box bg-warning">
              <div class="inner">
 <?php $query3=mysqli_query($con,"select id from tblclasses");
$listedclasses=mysqli_num_rows($query3);
?>               
                <h3><?php echo $listedclasses;?></h3>

                <p>Turmas Listadas</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="manage-classes.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->



          <hr />


<div class="col-lg-3 col-6">
  <!-- caixa pequena -->
  <div class="small-box bg-info">
    <div class="inner">
<?php $query11=mysqli_query($con,"select id from tblenrollment ");
$totalmatriculas=mysqli_num_rows($query11);
?>


      <h3><?php echo $totalmatriculas;?></h3>
      <p>Total de Matrículas</p>
    </div>
    <div class="icon">
      <i class="ion ion-person"></i>
    </div>
    <a href="all-enrolments.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- caixa pequena -->
  <div class="small-box bg-warning">
    <div class="inner">
<?php $query12=mysqli_query($con,"select id from tblenrollment where (enrollStatus='' || enrollStatus is null)");
$novasmatriculas=mysqli_num_rows($query12);
?>

      <h3><?php echo $novasmatriculas;?></h3>

      <p>Novas Matrículas</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="new-enrollments.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- caixa pequena -->
  <div class="small-box bg-success">
    <div class="inner">
<?php $query13=mysqli_query($con,"select id from tblenrollment where (enrollStatus='Accepted')");
$matriculasaceitas=mysqli_num_rows($query13);
?>               
      <h3><?php echo $matriculasaceitas;?></h3>

      <p>Turmas Aceitas</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="accepted-enrolment.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-6">
  <!-- caixa pequena -->
  <div class="small-box bg-danger">
    <div class="inner">
<?php $query14=mysqli_query($con,"select id from tblenrollment where (enrollStatus='Rejected')");
$matriculasrejeitadas=mysqli_num_rows($query14);
?>               
      <h3><?php echo $matriculasrejeitadas;?></h3>

      <p>Turmas Rejeitadas</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="rejected-enrolments.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->




<div class="col-lg-3 col-6">
  <!-- caixa pequena -->
  <div class="small-box bg-primary">
    <div class="inner">
<?php $query111 = mysqli_query($con, "select id from tblvisitor ");
$tvisitors = mysqli_num_rows($query111);
?>

      <h3><?php echo $tvisitors;?></h3>
      <p>Total de Visitantes</p>
    </div>
    <div class="icon">
      <i class="ion ion-person"></i>
    </div>
    <a href="all-visitors.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- caixa pequena -->
  <div class="small-box bg-warning">
    <div class="inner">
<?php $query121 = mysqli_query($con, "select id from tblvisitor where (status='' || status is null)");
$newvisitors = mysqli_num_rows($query121);
?>

      <h3><?php echo $newvisitors;?></h3>

      <p>Novos Visitantes</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="new-visitors.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
  <!-- caixa pequena -->
  <div class="small-box bg-success">
    <div class="inner">
<?php $query131 = mysqli_query($con, "select id from tblvisitor where (status='Visited')");
$visitedvistors = mysqli_num_rows($query131);
?>
      <h3><?php echo $visitedvistors;?></h3>

      <p>Visitantes que Compareceram</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="visited-visitors.php" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-6">
  <!-- caixa pequena -->
  <div class="small-box bg-danger">
    <div class="inner">
<?php $query141 = mysqli_query($con, "select id from tblvisitor where (status='Not-Visited')");
$notvisited = mysqli_num_rows($query141);
?>
      <h3><?php echo $notvisited;?></h3>

      <p>Visitantes que Não Compareceram</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="notvisited-visitors.php" class="small-box-footer">Mais informações 
      <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->

<!-- ./col -->
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
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolver conflito entre o tooltip do jQuery UI e o Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE para fins de demonstração -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (apenas para fins de demonstração) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
<?php } ?>
