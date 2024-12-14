<?php include_once('includes/config.php');
 if(isset($_POST['submit'])){
$gname=$_POST['gname'];
$emailid=$_POST['emailid'];
$cname=$_POST['cname'];
$cage=$_POST['agegroup'];
$vtime=$_POST['visittime'];
$message=$_POST['message'];

$query=mysqli_query($con,"insert into tblvisitor(gurdianName,gurdianEmail,childName,childAge,message,visitTime) values('$gname','$emailid','$cname','$cage','$message','$vtime')");
if($query){
echo "<script>alert('Detalhes enviados com sucesso.');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else {
echo "<script>alert('Algo deu errado. Por favor, tente novamente.');</script>";
}

 }

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <title>Sistema de Inscrição Creche </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos Personalizados -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include_once('includes/header.php');?>

        <!-- Início do Carrossel -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">A Melhor Escola Infantil Para Seu Filho</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Crie Um Futuro Brilhante Para Seu Filho</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim do Carrossel -->


        <!-- Início das Instalações -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Instalações da Escola</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="facility-item">
                            <div class="facility-icon bg-primary">
                                <span class="bg-primary"></span>
                                <i class="fa fa-bus-alt fa-3x text-primary"></i>
                                <span class="bg-primary"></span>
                            </div>
                            <div class="facility-text bg-primary">
                                <h3 class="text-primary mb-3">Ônibus Escolar</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="facility-item">
                            <div class="facility-icon bg-success">
                                <span class="bg-success"></span>
                                <i class="fa fa-futbol fa-3x text-success"></i>
                                <span class="bg-success"></span>
                            </div>
                            <div class="facility-text bg-success">
                                <h3 class="text-success mb-3">Parque Infantil</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="facility-item">
                            <div class="facility-icon bg-warning">
                                <span class="bg-warning"></span>
                                <i class="fa fa-home fa-3x text-warning"></i>
                                <span class="bg-warning"></span>
                            </div>
                            <div class="facility-text bg-warning">
                                <h3 class="text-warning mb-3">Cantina Saudável</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="facility-item">
                            <div class="facility-icon bg-info">
                                <span class="bg-info"></span>
                                <i class="fa fa-chalkboard-teacher fa-3x text-info"></i>
                                <span class="bg-info"></span>
                            </div>
                            <div class="facility-text bg-info">
                                <h3 class="text-info mb-3">Aprendizado Positivo</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim das Instalações -->



        




        <!-- Início das Turmas -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Turmas da Escola</h1>
        </div>
        <div class="row g-4">

<?php $query=mysqli_query($con,"select tblteachers.fullName,tblteachers.teacherPic,tblclasses.*,tblclasses.id as classid from tblclasses
join tblteachers on tblteachers.id=tblclasses.teacherId");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="classes-item">
                    <div class="bg-light rounded-circle w-75 mx-auto p-3">
                        <img class="img-fluid rounded-circle" src="admin/classpic/<?php echo $result['feacturePic']?>" alt="<?php echo $result['className']?>">
                    </div>
                    <div class="bg-light rounded p-4 pt-5 mt-n5">
                        <a class="d-block text-center h3 mt-3 mb-4" href=""><?php echo $result['className']?></a>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle flex-shrink-0" src="admin/teacherspic/<?php echo $result['teacherPic']?>" alt="" style="width: 45px; height: 45px;">
                                <div class="ms-3">
                                    <h6 class="text-primary mb-1"><?php echo $result['fullName']?></h6>
                                    <small>Professor</small>
                                </div>
                            </div>
                        </div>
                        <div class="row g-1">
                            <div class="col-4">
                                <div class="border-top border-3 border-primary pt-2">
                                    <h6 class="text-primary mb-1">Idade:</h6>
                                    <small><?php echo $result['ageGroup']?></small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border-top border-3 border-success pt-2">
                                    <h6 class="text-success mb-1">Horário:</h6>
                                    <small><?php echo $result['classTiming']?></small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border-top border-3 border-warning pt-2">
                                    <h6 class="text-warning mb-1">Capacidade:</h6>
                                    <small><?php echo $result['capacity']?> Crianças</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>

        </div>
    </div>
</div>
<!-- Fim das Turmas -->

<!-- Início do Agendamento -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded">
            <div class="row g-0">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 d-flex flex-column justify-content-center p-5">
                        <h1 class="mb-4">Agende uma Visita</h1>
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="gname" name="gname" placeholder="Nome do Responsável" required>
                                        <label for="gname">Nome do Responsável</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="emailid" name="emailid" placeholder="Email do Responsável" required>
                                        <label for="gmail">Email do Responsável</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="cname" name="cname" placeholder="Nome da Criança" required>
                                        <label for="cname">Nome da Criança</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="agegroup" name="agegroup" required>
                                            <option value="">Selecione</option>
                                            <option value="18 Month-3 Year">18 Meses-3 Anos</option>
                                            <option value="2-3 Year">2-3 Anos</option>
                                            <option value="3-4 Year">3-4 Anos</option>
                                            <option value="4-5 Year">4-5 Anos</option>
                                            <option value="5-6 Year">5-6 Anos</option>
                                        </select>
                                        <label for="cage">Idade da Criança</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="cage">Horário da Visita</label>
                                </div>                        

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="datetime-local" id="visittime" name="visittime" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Deixe uma mensagem aqui" id="message" style="height: 100px" name="message" required></textarea>
                                        <label for="message">Mensagem</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                       <!-- <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
                         --></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fim do Agendamento -->

<!-- Início da Equipe -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Professores</h1>
        </div>
        <div class="row g-4">
<?php $ret=mysqli_query($con,"select * from tblteachers");
$cnt=1;
while($row=mysqli_fetch_array($ret)){
?>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <img class="img-fluid rounded-circle w-75" src="admin/teacherspic/<?php echo $row['teacherPic']?>" alt="">
                    <div class="team-text">
                        <h3><?php echo $row['fullName']?></h3>
                        <p><?php echo $row['teacherSubject']?></p>
                    </div>
                </div>
            </div>
<?php } ?>

        </div>
    </div>
</div>
<!-- Fim da Equipe -->

<!-- Início do Rodapé -->
<!--?php include_once('includes/footer.php');?> -->
<!-- Fim do Rodapé -->

<!-- Voltar ao Topo -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- Bibliotecas JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Javascript do Template -->
<script src="js/main.js"></script>
</body>

</html>
