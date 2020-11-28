<?php
include("includes/conecta.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$pagina = $_POST['pagina'];
$msj = $_POST['mensaje'];


 include_once('class.phpmailer.php');
 include_once('class.smtp.php');
    //Este bloque es importante
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    //Nuestra cuenta
    $mail->Username = '';
    $mail->Password = '';
    $para='eliecer0523@gmail.com';
    $asunto = $_POST['asunto'];
    $html=$html.'<br/>'
            . 'Nombre y Apellido: '.$nombre.' '.$apellido.'<br/>'
            . 'Correo: '.$correo.'<br/>'
            . 'Sitio Web: '.$pagina.'<br/>'
            . 'Mensaje: '.$msj;
    

        $mensaje=$html;
        $send = false; 
       //Agregar destinatario
        $mail->AddAddress($para);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        //Para adjuntar archivo
       //$mail->AddAttachment('adjuntos/'.$filename);
        $mail->MsgHTML($mensaje);

        if($mail->Send()){
            echo "<script language='JavaScript' type='text/javascript'>alert('Mensaje Enviado Correctamente')</script>";
            echo "<script language='JavaScript' type='text/javascript'>location.href='index.html';</script>";
        }else{
            echo "<script language='JavaScript' type='text/javascript'>alert('Mensaje No Enviado...')</script>";
            echo "<script language='JavaScript' type='text/javascript'>location.href='index.html';</script>";
        }  
  



