<?php include_once('includes/config.php');
if(isset($_POST['submit'])){
    $fname = $_POST['fathername'];
    $mname = $_POST['mothername'];
    $pmobno = $_POST['parentmobno'];
    $pemail = $_POST['parentemail'];
    $cname = $_POST['cname'];
    $agegroup = $_POST['agegroup'];
    $erollprogram = $_POST['erollprogram'];
    $message = $_POST['message'];
    $enrollno = mt_rand(100000000, 999999999);

    $query = mysqli_query($con, "INSERT INTO tblenrollment(enrollmentNumber, fatherName, motherName, parentmobNo, parentEmail, childName, childAge, enrollProgram, message) VALUES ('$enrollno', '$fname', '$mname', '$pmobno', '$pemail', '$cname', '$agegroup', '$erollprogram', '$message')");
    
    if ($query) {
        echo "<script>alert('Detalhes de inscrição enviados com sucesso.');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Algo deu errado. Por favor, tente novamente.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Sistema de Inscrição Creche </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Fontes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Folha de Estilos de Ícones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Folhas de Estilo das Bibliotecas -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Folha de Estilo Personalizada do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Folha de Estilo do Template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include_once('includes/header.php');?>

    <!-- Fim do Cabeçalho -->
    <div class="container-xxl py-5 page-header position-relative mb-5">
        <div class="container py-5">
            <h1 class="display-2 text-white animated slideInDown mb-4">Inscrição Infantil</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                    <li class="breadcrumb-item"><a href="#">Páginas</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Inscrição Infantil</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Fim do Cabeçalho da Página -->

    <!-- Início do Formulário de Inscrição -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <h1 class="mb-4">Inicie a Educação Infantil do seu Filho</h1>
                            <form method="post">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="fathername" name="fathername" placeholder="Nome do Pai" required>
                                            <label for="fathername">Nome do Pai</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="mothername" name="mothername" placeholder="Nome da Mãe" required>
                                            <label for="mothername">Nome da Mãe</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="parentmobno" name="parentmobno" placeholder="Telefone dos Pais" required>
                                            <label for="parentmobno">Telefone dos Pais</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" id="parentemail" name="parentemail" placeholder="Email dos Pais" required>
                                            <label for="parentemail">Email dos Pais</label>
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
                                                <option value="18 Meses-2 Anos">18 Meses-2 Anos</option>
                                                <option value="2-3 Anos">2-3 Anos</option>
                                                <option value="3-4 Anos">3-4 Anos</option>
                                                <option value="4-5 Anos">4-5 Anos</option>
                                                <option value="5-6 Anos">5-6 Anos</option>
                                            </select>
                                            <label for="agegroup">Idade da Criança</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                          
                                      <!--  <select class="form-control" id="erollprogram" name="erollprogram" required>
    <option value="">Selecione um Programa*</option>
    <option value="PlayGroup-1.8 a 3 anos">Grupo 1 1,8 a 3 anos</option>
    <option value="Creche-2.5 a 4 anos"> Creche- 2,5 a 4 anos</option>
    <option value="Jardim I-3.5 a 5 anos">grupo2 - 3,5 a 5 anos</option>
    <option value="Jardim II-4.5 a 6 anos">grupo 3  - 4,5 a 6 anos</option>
</select>   -->

                                            <label for="erollprogram">Programa de Inscrição</label>
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
                        <!--    <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
                   --></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Formulário de Inscrição -->

    <!-- Início do Rodapé -->
    <!--?php include_once('includes/footer.php');?>     -->
    <!-- Fim do Rodapé -->

    <!-- Voltar ao Topo -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Bibliotecas JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- JavaScript do Template -->
    <script src="js/main.js"></script>
</body>

</html>
