



<?php session_start();
error_reporting(0);
// Conexão com o banco de dados
include('includes/config.php');
// Validando Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para atualizar o visitante
if(isset($_POST['submit'])){
$vid=intval($_GET['vid']);
$estatus=$_POST['status'];
$oremark=$_POST['officialremak'];
$query=mysqli_query($con,"update tblvisitor set officeRemark='$oremark',status='$estatus' where id='$vid'");

if($query){
echo "<script>alert('Status do visitante atualizado com sucesso.');</script>";
} else {
echo "<script>alert('Algo deu errado. Por favor, tente novamente.');</script>";
}

}


  ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inscrição para Creche| Detalhes do Visitante</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Tema -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Conteúdo da página -->
  <div class="content-wrapper">
    <!-- Cabeçalho da Página -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Novas Inscrições</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Início</a></li>
              <li class="breadcrumb-item active">Detalhes do Visitante</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Conteúdo principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detalhes do Visitante</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
       
                  <tbody>
<?php $vid=intval($_GET['vid']);
$query=mysqli_query($con,"select * from tblvisitor where id='$vid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

                  <tr>
                  <th>Nome do Responsável</th>
                    <td><?php echo $result['gurdianName']?></td>
                    <th>Email do Responsável</th>
                   <td> <?php echo $result['gurdianEmail']?></td>
                  </tr>
                  <tr>
                    <th>Nome da Criança</th>
                   <td><?php echo $result['childName']?></td>
                   <th>Idade da Criança</th>
                   <td><?php echo $result['childAge']?></td>
                 </tr>
                 <tr>
                  <th>Hora da Visita</th>
                    <td><?php echo $result['visitTime']?></td>
                    <th>Data de Registro</th>
                    <td><?php echo $result['postingDate']?></td>
                  </tr>

                

                  <tr>
    <th>WhatsApp</th>
    <td colspan="3">
        <a href="https://wa.me/55<?php echo $result['whatsapp']; ?>" target="_blank" class="btn btn-success mt-2">
            <i class="fab fa-whatsapp"></i> Entre em Contato pelo WhatsApp (<?php echo $result['whatsapp']; ?>)
        </a>
    </td>
</tr>


                  <th>Mensagem</th>
                    <td colspan="3"><?php echo $result['message']?></td>
                  </tr>

<?php if($result['status']!=''):?>
            <tr>
                  <th>Status da Visita</th>
                    <td><?php echo $result['status']?></td>
                    <th>Data de Atualização</th>
                    <td><?php echo $result['updationDate']?></td>
                  </tr>

      <tr>
                  <th>Observação </th>
                    <td colspan="3"><?php echo $result['officeRemark']?></td>
                  </tr>
<?php endif;?>
<?php if($result['status']==''):?>
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
    <!-- /.conteúdo -->
  </div>
  <!-- /.content-wrapper -->


  <?php include_once('includes/footer.php'); ?>

</div>
<!-- ./wrapper -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Conteúdo do Modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Atualizar Status do Visitante</h4>
      </div>
      <div class="modal-body">
        <form name="takeaction" method="post">

          <p><select class="form-control" name="status" required>
            <option value="">Selecione o Status do Visitante</option>
            <option value="Visited">Visitou</option>
            <option value="Not-Visited">Não Visitou</option>

          </select></p>
        
        <p><textarea class="form-control" name="officialremak" placeholder="Observação Oficial" rows="5" required></textarea></p>
        <input type="submit" class="btn btn-primary" name="submit" value="Atualizar">
        <a href="https://wa.me/+55{$telefone}" target="_blank" class="btn btn-success mt-2">
          <i class="fab fa-whatsapp"></i> Entre em Contato pelo WhatsApp
        </a>

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
<!-- DataTables e Plugins -->
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
