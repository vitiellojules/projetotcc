<?php session_start();
error_reporting(0);
// Conexão com o Banco de Dados
include('includes/config.php');
// Validando Sessão
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Código para excluir o subadministrador
if($_GET['action']=='delete'){
$subadminid=intval($_GET['said']);
$query=mysqli_query($con,"delete from tbladmin where ID='$subadminid'");
if($query){
echo "<script>alert('Registro do subadministrador excluído com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'gerenciar-subadmins.php'; </script>";
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
  <title>Sistema de Matrícula da Creche | Gerenciar Subadministradores</title>

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
  <!-- Barra de Navegação -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Conteúdo Principal. Contém o conteúdo da página -->
  <div class="content-wrapper">
    <!-- Cabeçalho do Conteúdo (Cabeçalho da página) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gerenciar Subadministradores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Início</a></li>
              <li class="breadcrumb-item active">Gerenciar Subadministradores</li>
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
                <h3 class="card-title">Detalhes do Subadministrador</h3>
              </div>
              <!-- Cabeçalho do Cartão -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome de Usuário</th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Data de Registro</th>
                    <th>Ação</th>
                  </tr>
                  </thead>
                  <tbody>
<?php $query=mysqli_query($con,"select * from tbladmin where UserType=0");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $result['AdminuserName']?></td>
                    <td><?php echo $result['AdminName']?></td>
                   <td><?php echo $result['Email']?></td>
                    <td><?php echo $result['MobileNumber']?></td>
                    <td><?php echo $result['AdminRegdate']?></td>
                    <th>
     <a href="editar-subadmin.php?said=<?php echo $result['ID'];?>" title="Editar Detalhes do Subadministrador"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
     <a href="gerenciar-subadmins.php?action=delete&&said=<?php echo $result['ID']; ?>" style="color:red;" title="Excluir este registro" onclick="return confirm('Tem certeza que deseja excluir este registro?');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
     <a href="resetar-senha-subadmin.php?said=<?php echo $result['ID']; ?>" title="Redefinir Senha do Subadministrador"> <i class="fa fa-key" aria-hidden="true"></i></a></th>
                  </tr>
         <?php } ?>
             
                  </tbody>
                  <tfoot>
                <tr>
                  <th>#</th>
                    <th>Nome de Usuário</th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Data de Registro</th>
                    <th>Ação</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.corpo do cartão -->
            </div>
            <!-- /.cartão -->
          </div>
          <!-- /.coluna -->
        </div>
        <!-- /.linha -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.conteúdo -->
  </div>
  <!-- /.conteúdo principal -->
<?php include_once('includes/footer.php');?>

  <!-- Barra de Controle -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- O conteúdo da barra de controle vai aqui -->
  </aside>
  <!-- /.barra de controle -->
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
