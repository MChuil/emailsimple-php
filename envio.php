<?php
	ini_set("SMTP","mail.escuelactec.com");
	ini_set("smtp_port","localhost");
	ini_set('sendmail_from', 'info@escuelactec.com');
	
	$name = strip_tags($_POST["nombre"]);
	$apellido = strip_tags( $_POST["apellidos"]);
	$tel = strip_tags($_POST["telefono"]);
	$mail = strip_tags($_POST["correo"]);
	$mensaje = strip_tags($_POST["comentario"]);
	$fecha= time();
	$fechaFormato = date("j/n/Y",$fecha);
	
	/*From: Datos del emisor
	  To: datos del receptor
	  Date: Fecha/hora
	  Subject: Contenido*/
	
	$cabecera = "MIME-VERSION: 1.0";
	$cabecera .= "Content-type: text/html; Charset=UTF-8";
	$cabecera .= "From: Formulario enviado desde Escuela CTEC";

	$correoDestino = "info@escuelactec.com";
	//Formato del asunto del correo
	$asunto = "Enviado por " . $name . " ". $apellido;
	
	//Formato del cuerpo del correo
	$cuerpo = "Correo enviado por: " . $name . " ". $apellido;
	$cuerpo .= " con fecha: " . $fechaFormato;
	$cuerpo .= "Telefono: " . $tel;
	$cuerpo .= "Email: " . $mail;
	$cuerpo .= "Mensaje: " . $mensaje;
	
	//Enviar el correo
	if(mail($correoDestino, $asunto, $cuerpo, $cabecera)){
		echo "Correo enviado";
	}else{
		echo "Error de envio";
	}
	
?>