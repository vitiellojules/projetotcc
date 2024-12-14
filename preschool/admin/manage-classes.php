<?php 
session_start();
error_reporting(0);
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para excluir a turma
if($_GET['action']=='delete'){
$cid=intval($_GET['cid']);
$tpic=$_GET['teacherpic'];
$tpicpath="classpic"."/".$tpic;
$query=mysqli_query($con,"delete from tblclasses where id='$cid'");
if($query){
unlink($tpicpath);
echo "<script>alert('Detalhes da turma excluídos com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-classes.php'; </script>";
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
  <title>Sistema de Inscrição Pré-escolar | Gerenciar Turmas</title>

  <!-- Fonte Google: Source Sans Pro -->
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
    <!-- Cabeçalho do Conteúdo -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gerenciar Turmas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Início</a></li>
              <li class="breadcrumb-item active">Gerenciar Turmas</li>
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
                <h3 class="card-title">Detalhes das Turmas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Foto da Turma</th>
                    <th>Nome do Professor</th>
                    <th>Nome da Turma</th>
                    <th>Faixa Etária</th>
                    <th>Horário da Turma</th>
                    <th>Capacidade</th>
                    <th>Data de Registro</th>
                    <th>Ação</th>
                  </tr>
                  </thead>
                  <tbody>
<?php $query=mysqli_query($con,"select tblteachers.fullName,tblclasses.*,tblclasses.id as classid from tblclasses
join tblteachers on tblteachers.id=tblclasses.teacherId");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><img src="classpic/<?php echo $result['feacturePic']?>" width="80"></td>
                    <td><?php echo $result['fullName']?></td>
                    <td><?php echo $result['className']?></td>
                   <td><?php echo $result['ageGroup']?></td>
                   <td><?php echo $result['classTiming']?></td>
                    <td><?php echo $result['capacity']?></td>
                    <td><?php echo $result['postingDate']?></td>
                    <th>
     <a href="edit-class.php?cid=<?php echo $result['classid'];?>" title="Editar Detalhes da Turma"> <i class="fa fa-edit" aria-hidden="true"></i> </a> | 
     <a href="manage-classes.php?action=delete&&cid=<?php echo $result['classid']; ?>&&tpic=<?php echo $result['teacherPic'];?>" style="color:red;" title="Excluir este registro" onclick="return confirm('Você realmente deseja excluir este registro?');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
 </th>
                  </tr>
         <?php $cnt++;} ?>
             
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Foto da Turma</th>
                    <th>Nome do Professor</th>
                    <th>Nome da Turma</th>
                    <th>Faixa Etária</th>
                    <th>Horário da Turma</th>
                    <th>Capacidade</th>
                    <th>Data de Registro</th>
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
    <!-- /.conteúdo -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>

  <!-- Controle Lateral -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- O conteúdo do controle lateral vai aqui -->
  </aside>
  <!-- /.controle lateral -->
</div>
<!-- ./wrapper -->

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
<!-- App AdminLTE -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE para fins de demonstração -->
<script src="../dist/js/demo.js"></script>
<!-- Script específico para a página -->

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
</script>    -->
</body>
</html>
<?php } ?>
