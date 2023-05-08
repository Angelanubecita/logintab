<?php
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
	include('conexion/config.php');
	$emailUser = trim($_REQUEST['emailUser']);
	$passwordUser = trim($_REQUEST['passwordUser']);
	$nameUser = filter_var($_REQUEST['nameUser'], FILTER_SANITIZE_STRING);
	date_default_timezone_set("America/Bogota");
	$createUser = date("Y-m-d H:i:A");
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$captcha = $_POST['g-recaptcha-response'];

	// Verifica si la respuesta del Recaptcha está vacía
	if (!$captcha) {
	    echo "Por favor, verifica que no eres un robot";
	} else {
	    $secretkey = "6LfBidMlAAAAAJwALJcFea2ONJfjGhDumcXAbroh";
	    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

	    $atributos = json_decode($respuesta, TRUE);

	    if(!isset($atributos['success']) || $atributos['success'] !== true) {
	        // El captcha no se ha validado correctamente
	        echo "Por favor, verifica que no eres un robot";
	    } else {
	        // El captcha se ha validado correctamente
	        // Continuar con el código para validar la cuenta de usuario
			function getVisitorIp()
			{
				if (!empty($_SERVER['HTTP_CLIENT_IP']))   
				{
					$ipAdress = $_SERVER['HTTP_CLIENT_IP'];
				}
				elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
				{
					$ipAdress = $_SERVER['HTTP_X_FORWARDED_FOR'];
				}
				else
				{
					$ipAdress = $_SERVER['REMOTE_ADDR'];
				}
				return $ipAdress;
			}
			$ipUser = getVisitorIp();
			 
			function TokenAleatorio($length = 50) {
			    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
			}
			$miToken  = TokenAleatorio();

			$PasswordHash = password_hash($passwordUser, PASSWORD_BCRYPT); 

		 	$SqlVerificandoEmail = ("SELECT emailUser FROM myusers WHERE emailUser COLLATE utf8_bin='$emailUser'");
			$jqueryEmail         = mysqli_query($con, $SqlVerificandoEmail); 
			if(mysqli_num_rows($jqueryEmail) >0){
				
			}else{
				$queryInsertUser  = ("INSERT INTO myusers(emailUser,passwordUser, nameUser,ipUser,createUser) VALUES ('$emailUser','$PasswordHash','$nameUser','$ipUser','$createUser')");
				$resultInsertUser = mysqli_query($con, $queryInsertUser);
				header("location: index.php");
			}
	    }
	}
}
?>

