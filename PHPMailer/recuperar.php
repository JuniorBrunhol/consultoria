<?php
session_start();
//unset($_SESSION['face_access_token']);
include_once '..\conexao/conexao.php';
?>
<html>
<head><link href="..\css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="..\js/bootstrap.min.js"></script>
<script src="..\js/jquery.min.js"></script>
<link href="..\css/index.css" rel="stylesheet" id="indexcss">
<!------ Include the above in your HEAD tag ---------->
<link href="..\css/font-awesome.css" rel="stylesheet">
<title>Sistema Integrado de Consultoria</title>
</head>
<body>
<div class="container">


    <div class="omb_login">
	<br><br><br><br><h1 class="omb_authTitle"><img width=400 src="..\images/imagem.png"></h1>
    <h3 class="omb_authTitle"> Recuperação de senha:</H3>


		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">	
			    <form class="omb_loginForm" action="envio_recuperar.php" autocomplete="off" method="POST">
                    <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" required class="form-control" id="usuarioemail" name="usuarioemail" placeholder="Digite o seu e-mail">
					</div>
					<span class="help-block"></span>
						<br>				
					<button name="btnLogin" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</form>
			</div>
    	</div>
		 	
	</div>



        </div>

        </body>
        </html>