<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">

<?php $sql=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while($data=mysqli_fetch_array($sql)){
?>

            <div class="col-lg-4 col-md-6">
                <h3 class="text-white mb-4">Entre em Contato</h3>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo $data['PageDescription']?></p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo $data['MobileNumber']?></p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo $data['Email']?></p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        <?php } ?>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Links Rápidos</h3>
                <a class="btn btn-link text-white-50" href="about.php">Sobre Nós</a>
                <a class="btn btn-link text-white-50" href="contact.php">Contate-nos</a>
                <a class="btn btn-link text-white-50" href="classes.php">Turmas</a>
                <a class="btn btn-link text-white-50" href="admin/">Admin</a>
                <a class="btn btn-link text-white-50" href="visit.php">Agende uma Visita</a>
                <a class="btn btn-link text-white-50" href="enrollment.php">Inscreva-se Agora</a>
                <a class="btn btn-link text-white-50" href="admin/">Login do Admin</a>
            </div>
            <div class="col-lg-5 col-md-6">
                <h3 class="text-white mb-4">Galeria de Fotos</h3>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-4.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-5.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/classes-6.jpg" alt="">
                    </div>
                </div>
            </div>
        
        </div>
    </div>

</div>
