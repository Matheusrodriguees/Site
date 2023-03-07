
<!--<!DOCTYPE html>-->
<!--<html lang="pt-br">-->
<!--<head>-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">-->
<!--    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> -->
<!--    <link rel="stylesheet" type="text/css" href="index.css" media="screen" />-->
<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Recuperar Senha</title>-->
  
<!--</head>-->
<!--<body>-->
  
<!--<div class="container" id="container">-->
<!--	<div class="form-container cadastrar-container">-->

<!--	</div>-->
<!--	<div class="form-container entrar-container">-->
<!--		<form method="post" action="recuperar_crud.php?acao=recuperar" name="dados" onSubmit="return enviardados();">-->
<!--			<h1>Recuperar Senha</h1>-->
<!--			<br>-->

<!--			<input type="text" name="Email" id="Email" placeholder="Digite o Email"><br>-->
			
<!--			<button  type="submit" >Recuperar Senha</button><br>-->
			
<!--			<button  formaction="index.html">Voltar</button>-->
			
<!--		</form>-->
<!--	</div>-->
<!--	<div class="overlay-container">-->
<!--		<div class="overlay">-->

<!--			<div class="overlay-panel overlay-right">-->
<!--				<h1>Olá amigo!</h1>-->
<!--				<p>Insira seu email para recuperar a senha</p>-->
				
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->


<!--<script>-->
<!--    const entrarButton = document.getElementById('entrar');-->
<!--    const container = document.getElementById('container');-->

<!--    cadastrarButton.addEventListener('click', () => {-->
<!--	    container.classList.add("right-panel-active");-->
<!--});-->

<!--    entrarButton.addEventListener('click', () => {-->
<!--	    container.classList.remove("right-panel-active");-->
<!--});-->
<!--</script>-->
<!--</body>-->
<!--</html>-->


<!--/////////////////////////////////////////////////////////////////////////////////////////////-->

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <link href="index.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container" id="container">
		<form method="post" action="recuperar_crud.php?acao=recuperar" name="dados" onSubmit="return enviardados();">
			<h1>Recupere sua senha</h1>
			<input type="Email" name='Email' placeholder="Email" />
          
		    <button>Recuperar</button>      
		</form>
</div>


</body>
</html>