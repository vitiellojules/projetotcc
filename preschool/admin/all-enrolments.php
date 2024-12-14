<?php session_start();
error_reporting(0);
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando a Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{

  ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inscrição Creche | Todas as Inscrições</title>

  <!-- Fonte do Google: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Estilo do Tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contém o conteúdo da página -->
  <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Todas as Inscrições</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Início</a></li>
              <li class="breadcrumb-item active">Todas as Inscrições</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo Principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detalhes da Inscrição</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nº da Inscrição</th>
                    <th>Nome do Pai/Nome da Mãe</th>
                    <th>Celular/E-mail do Responsável</th>
                    <th>Nome da Criança</th>
                    <th>Faixa Etária da Criança</th>
                    <th>Programa para Inscrição</th>
                    <th>Data de Inscrição</th>
                    <th>Ação</th>
                  </tr>
                  </thead>
                  <tbody>
<?php $query=mysqli_query($con,"select * from tblenrollment");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $result['enrollmentNumber']?></td>
                    <td><?php echo $result['fatherName']?>/<?php echo $result['motherName']?></td>
                    <td><?php echo $result['parentmobNo']?>/<?php echo $result['parentEmail']?></td>
                   <td><?php echo $result['childName']?></td>
                   <td><?php echo $result['childAge']?></td>
                    <td><?php echo $result['enrollProgram']?></td>
                    <td><?php echo $result['postingDate']?></td>
                    <th>
     <a href="enrollment-details.php?enrollid=<?php echo $result['id'];?>" title="Ver Detalhes" class="btn btn-primary btn-xm"> Ver Detalhes</a> 
 </th>
                  </tr>
         <?php $cnt++;} ?>
             
                  </tbody>
                  <tfoot>
   <tr>
                    <th>#</th>
                    <th>Nº da Inscrição</th>
                    <th>Nome do Pai/Nome da Mãe</th>
                    <th>Celular/E-mail do Responsável</th>
                    <th>Nome da Criança</th>
                    <th>Faixa Etária da Criança</th>
                    <th>Programa para Inscrição</th>
                    <th>Data de Inscrição</th>
                    <th>Ação</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>

  <!-- Barra Lateral de Controle -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- O conteúdo da barra lateral de controle vai aqui -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- App AdminLTE -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE para fins de demonstração -->
<script src="../dist/js/demo.js"></script>
<!-- Script específico da página -->   
 <!--
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>  -->
</body>
</html>
<?php } ?>
