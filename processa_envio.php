<?php


// Import of lib
require "./lib/PHPMailer/Exception.php";
require "./lib/PHPMailer/OAuth.php";
require "./lib/PHPMailer/PHPMailer.php";
require "./lib/PHPMailer/POP3.php";
require "./lib/PHPMailer/SMTP.php";


// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/


class Mensagem {


	private $para = null;
	private $assunto = null;
	private $mensagem = null;
    public $status = array("codigo_status" => null, "descricao_status" => "");



	public function __get($atributo) {

		return $this->$atributo;

	}


	public function __set($atributo, $valor) {

		$this->$atributo = $valor;

	}


	public function mensagemValida() {

		if ( empty($this->para) || empty($this->assunto) || empty($this->mensagem) ) {

			return false;

		}


		return true;

	}


}


$mensagem = new Mensagem();


$mensagem->__set("para", $_POST["para"]);

$mensagem->__set("assunto", $_POST["assunto"]);

$mensagem->__set("mensagem", $_POST["mensagem"]);


/*
echo "<hr>";

print_r($mensagem);
*/


if ( !$mensagem->mensagemValida() ) {

	echo "Mensagem inválida";

    header("Location: index.php");

	// die();

}



$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

try {

    //Server settings
    $mail->CharSet = "utf-8";   
    $mail->SMTPDebug = false; // default $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ksnakedeveloper@gmail.com';        // SMTP username // SEU E-MAIL
    $mail->Password = 'kbrunswicki';                      // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to // 587 for Gmail | 25 for Hotmail

    //Recipients
    $mail->setFrom('ksnakedeveloper@gmail.com', 'App Send Mail');                 // Remetente
    $mail->addAddress($mensagem->__get("para"));                                  // Add a recipient // Destinatario
    // $mail->addAddress('email.destinatario@gmail.com', 'Nome Destinatario');    // Name is optional // Adicionar + destinatario
    // $mail->addReplyTo('info@example.com', 'Information');      // Caso tenha uma terceira pessoa para enviar o e-mail do(addAddress)
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');                          // Copia oculta

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                                // Set email format to HTML
    $mail->Subject = $mensagem->__get("assunto");                       // Assunto do e-mail
    $mail->Body    = $mensagem->__get("mensagem") . ' <br><br><hr> &copy;2019 App Send Mail. Alguns direitos reservados.<br> <a href="https://kallsnake.github.io" class="nav-link"> Kall Snake </a> <br> Rua Alto da Cruz, 51 <br> Alto da Cruz, Camaçari CEP 42807 091';                       // Conteúdo com tags(formatações com tags de HTML)
    $mail->AltBody = "É necessário utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem.";                 // Conteúdo alternativo, ou seja sem tags do HTML

    $mail->send();


    $mensagem->status["codigo_status"] = 1;
    $mensagem->status["descricao_status"] = "E-mail enviado com sucesso.";


    // echo "E-mail enviado com sucesso.";

} catch (Exception $e) {

    $mensagem->status["codigo_status"] = 2;
    $mensagem->status["descricao_status"] = "Não foi possivel enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: " . $mail->ErrorInfo;

    // echo 'Não foi possivel enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ', $mail->ErrorInfo;

}



?>



<<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8" />

    <title> App Send Mail </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="shortcut icon" href="img/logo.png">

</head>

<body>

    
    <div class="container">


        <div class="py-3 text-center">

                <img class="d-block mx-auto mb-2" src="img/logo.png" alt="" width="72" height="72">

                <h2> Send Mail </h2>

                <p class="lead"> Seu app de envio de e-mails particular! </p>

            </div>


            <div class="row">
                

                <div class="col-md-12">

                    

                    <? if ( $mensagem->status["codigo_status"] == 1 ) { ?>


                        <div class="container">
                            
                            <h1 class="display-4 text-success text-center"> Sucesso </h1>

                            <p class="text-center"> <?= $mensagem->status["descricao_status"] ?> </p>

                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-light"> Voltar </a>

                        </div>


                    <? } ?> 



                    <? if ( $mensagem->status["codigo_status"] == 2 ) { ?>


                        <div class="container">
                            
                            <h1 class="display-4 text-danger text-center"> Ops! </h1>

                            <p class="text-center"> <?= $mensagem->status["descricao_status"] ?> </p>

                            <a href="index.php" class="btn btn-danger btn-lg mt-5 text-light"> Voltar </a>

                        </div>


                    <? } ?> 



                </div>


            </div>



        </div>



</body>

</html>