<?php 
session_start();
error_reporting(0);
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando a Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para atualização da matrícula
if(isset($_POST['submit'])){
$eid=intval($_GET['enrollid']);
$estatus=$_POST['status'];
$oremark=$_POST['officialremak'];
$query=mysqli_query($con,"update tblenrollment set officialRemark='$oremark', enrollStatus='$estatus' where id='$eid'");

if($query){
echo "<script>alert('Status da matrícula atualizado com sucesso.');</script>";
//echo "<script type='text/javascript'> document.location = 'manage-classes.php'; </script>";
} else {
echo "<script>alert('Ocorreu um erro. Por favor, tente novamente.');</script>";
}

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Matrícula Pré-Escolar | Novas Matrículas</title>

  <!-- Google Font: Source Sans Pro -->
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
  <!-- Barra de Navegação -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Conteúdo Principal -->
  <div class="content-wrapper">
    <!-- Cabeçalho da Página -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Novas Matrículas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Início</a></li>
              <li class="breadcrumb-item active">Novas Matrículas</li>
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
                <h3 class="card-title">Detalhes da Matrícula</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <tbody>
<?php 
$eid=intval($_GET['enrollid']);
$query=mysqli_query($con,"select * from tblenrollment where id='$eid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

                  <tr>
                    <th>Número da Matrícula</th>
                    <td colspan="3"><?php echo $result['enrollmentNumber']?></td>
                  </tr>

                  <tr>
                    <th>Nome do Pai</th>
                    <td><?php echo $result['fatherName']?></td>
                    <th>Nome da Mãe</th>
                    <td><?php echo $result['motherName']?></td>
                  </tr>
                  <tr>
                    <th>Telefone dos Pais</th>
                    <td><?php echo $result['parentmobNo']?></td>
                    <th>Email dos Pais</th>
                    <td><?php echo $result['parentEmail']?></td>
                  </tr>
                  <tr>
                    <th>Nome da Criança</th>
                    <td><?php echo $result['childName']?></td>
                    <th>Idade da Criança</th>
                    <td><?php echo $result['childAge']?></td>
                  </tr>
                  <tr>
                    <th>Programa Inscrito</th>
                    <td><?php echo $result['enrollProgram']?></td>
                    <th>Data de Inscrição</th>
                    <td><?php echo $result['postingDate']?></td>
                  </tr>

                  <tr>
                    <th>Mensagem</th>
                    <td colspan="3"><?php echo $result['message']?></td>
                  </tr>

<?php if($result['enrollStatus']!=''):?>
                  <tr>
                    <th>Status da Matrícula</th>
                    <td><?php echo $result['enrollStatus']?></td>
                    <th>Data de Atualização</th>
                    <td><?php echo $result['updationDate']?></td>
                  </tr>

                  <tr>
                    <th>Observações Oficiais</th>
                    <td colspan="3"><?php echo $result['officialRemark']?></td>
                  </tr>
<?php endif;?>
<?php if($result['enrollStatus']==''):?>
                  <tr>
                    <td colspan="4" style="text-align:center;">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tomar Ação</button>
                    </td>
<?php endif;?>

<?php $cnt++;} ?>
              </tbody>
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

</div>
<!-- ./wrapper -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Conteúdo do Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Atualizar Status da Matrícula</h4>
      </div>
      <div class="modal-body">
        <form name="takeaction" method="post">

          <p><select class="form-control" name="status" required>
            <option value="">Selecione o Status da Matrícula</option>
            <option value="Aceito">Aceito</option>
            <option value="Rejeitado">Rejeitado</option>
          </select></p>
          
          <p><textarea class="form-control" name="officialremak" placeholder="Observações Oficiais" rows="5" required></textarea></p>
          <input type="submit" class="btn btn-primary" name="submit" value="Atualizar">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
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
<!-- AdminLTE para fins de demonstração -->
<script src="../dist/js/demo.js"></script>
<!-- Script da página -->
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
</script>
</body>
</html>
<?php } ?>
