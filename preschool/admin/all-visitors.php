<?php 
session_start();
error_reporting(0);
// Conexão com o banco de dados
include('includes/config.php');
// Validando a sessão
if(strlen($_SESSION['aid']) == 0) { 
    header('location:index.php');
} else {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inscrição Creche | Todos os Visitantes</title>

  <!-- Fonte do Google: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Estilo do tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once("includes/navbar.php");?>
  
  <!-- Menu Lateral -->
  <?php include_once("includes/sidebar.php");?>

  <!-- Conteúdo Principal -->
  <div class="content-wrapper">
    <!-- Cabeçalho de Conteúdo -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Todos os Visitantes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Início</a></li>
              <li class="breadcrumb-item active">Todos os Visitantes</li>
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
              <div class="card-header">
                <h3 class="card-title">Detalhes dos Visitantes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome do Responsável</th>
                    <th>Email do Responsável</th>
                    <th>Nome da Criança</th>
                    <th>Faixa Etária da Criança</th>
                    <th>Horário da Visita</th>
                    <th>Data de Envio</th>
                    <th>Ação</th>
                  </tr>
                  </thead>
                  <tbody>
<?php 
$query = mysqli_query($con, "select * from tblvisitor");
$cnt = 1;
while($result = mysqli_fetch_array($query)) {
?>
                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $result['gurdianName']?></td>
                    <td><?php echo $result['gurdianEmail']?></td>
                    <td><?php echo $result['childName']?></td>
                    <td><?php echo $result['childAge']?></td>
                    <td><?php echo $result['visitTime']?></td>
                    <td><?php echo $result['postingDate']?></td>
                    <td>
                      <a href="visitor-details.php?vid=<?php echo $result['id'];?>" title="Ver Detalhes" class="btn btn-primary btn-xm">Ver Detalhes</a> 
                    </td>
                  </tr>
<?php $cnt++; } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nome do Responsável</th>
                    <th>Email do Responsável</th>
                    <th>Nome da Criança</th>
                    <th>Faixa Etária da Criança</th>
                    <th>Horário da Visita</th>
                    <th>Data de Envio</th>
                    <th>Ação</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Rodapé -->
  <?php include_once('includes/footer.php');?>

  <!-- Menu Lateral de Controle -->
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!--<script>
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
</script> -->
</body>
</html>
<?php } ?>
