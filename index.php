<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
    	<title> App Send Mail </title>

    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<meta name="description" content="App Send Mail">
        <meta name="author" content="KallSnake">

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
  				
					<div class="card-body font-weight-bold">


						<!-- Ínicio formulário -->
						<form action="processa_envio.php" method="post">

							<div class="form-group">

								<label for="para"> Para </label>

								<input name="para" type="email" class="form-control" id="para" placeholder="joao@dominio.com.br">

							</div>


							<div class="form-group">

								<label for="assunto"> Assunto </label>

								<input name="assunto" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail">

							</div>


							<div class="form-group">

								<label for="mensagem"> Mensagem </label>

								<textarea name="mensagem" class="form-control" id="mensagem"></textarea>

							</div>


							<button type="submit" class="btn btn-primary btn-lg"> Enviar Mensagem </button>


						</form>
						<!-- Fim formulário -->


					</div>

				</div>

      		</div>

      	</div>



      	<!-- INICIO FOOTER -->
	    <footer>
	      
	      <div class="container text-center text-dark mt-5">
	        
	        <strong> 

	        <p> &copy;2019. Alguns direitos reservados. <a href="https://kallsnake.github.io" class="nav-link"> Por: Kall Snake </a> </p>

	        </strong>

	      </div>

	    </footer>
	    <!-- FIM FOOTER -->


	</body>

</html>