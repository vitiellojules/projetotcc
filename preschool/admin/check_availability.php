<?php 
require_once("includes/config.php");
// código de verificação de disponibilidade do nome de usuário
if(!empty($_POST["username"])) {
	$uname = $_POST["username"];
	$query = mysqli_query($con,"select AdminuserName from tbladmin where AdminuserName='$uname'");		
	$row = mysqli_num_rows($query);
	if($row > 0){
		echo "<span style='color:red'> Nome de usuário já existe. Tente outro nome de usuário.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {
		echo "<span style='color:green'> Nome de usuário disponível para registro.</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
?>
