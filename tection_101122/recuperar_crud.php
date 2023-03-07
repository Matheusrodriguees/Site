<?php
#Chamando o arquivo conexao.php
include_once"conexao.php";
// #pegando o valor da ação via URL
 $acao = $_GET['acao'];
// #Comparando se o valor da URL é do tipo GET
// if(isset($_GET['Email'])){
//     #Criando uma variavel para armazenar o valor obtido no GET
//     $id = $_GET['Email'];
// }

switch($acao){


        case 'recuperar':
            
        include_once "conexao.php";
        $codigo = $_POST['Email'];
    
    
            echo "<!DOCTYPE html>
                <html lang='pt_br'>
    <head>
    <link href='index.css' rel='stylesheet'>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Recuperar Senha</title>
</head>
<body>
<div class='container' id='container'>
		<form method='post' action='recuperar_crud.php?acao=mostrar' name='dados' onSubmit='return enviardados();'>
			<h1>Recupere sua senha</h1>";
			
		$sqlSelect = "SELECT * FROM Usuario WHERE Email = '".$codigo."' ";
        $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");

        
         while ($registro = mysqli_fetch_array($resultado)){
             $Email = $registro['Email'];
             $PerguntaSeguranca = $registro['PerguntaSeguranca'];
			
			echo "
			Email <input name='email' type='email' id='email' value='  $Email  '>
			Pergunta de Segurança<input value=' $PerguntaSeguranca  '>
            Resposta de Segurança<input name='RespostaSeguranca'  rows='1' >
            <button>Recuperar</button>
			
			";
         }
            mysqli_close($conexao);
        
        
             break;
             
        case 'mostrar':
            
        include_once "conexao.php";
       
        $resposta = $_POST['RespostaSeguranca'];
        $email = $_POST['email'];
    
        $sqlSelect = "SELECT * FROM Usuario WHERE Email = '".$email."' ";
         $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");
         $registro = mysqli_fetch_array($resultado);
        
        
             $Email = $registro['Email'];
             $Senha = $registro['Senha'];
             $Nome = $registro['Nome'];
             $RespostaSeguranca = $registro['RespostaSeguranca'];
            
             if ($resposta == $RespostaSeguranca && $Email == $email){
    
            echo "<!DOCTYPE html>
                <html lang='pt_br'>
    <head>
    <link href='index.css' rel='stylesheet'>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Recuperar Senha</title>
</head>
<body>
<div class='container' id='container'>
		<form method='post' action='index.html' name='dados' onSubmit='return enviardados();'>
			<h1>Recupere sua senha</h1>
			
			Email <input name='Email' type='Email' id='Email' value='  $Email  'readonly>
			Nome <input name='Nome' type='Nome' id='Nome' value='  $Nome  'readonly>
            Senha <input name='Senha' type='Senha' id='Senha' value='  $Senha  'readonly>
            <button>Fazer Login</button>
			
			";
         }else{
                         echo "<!DOCTYPE html>
                <html lang='pt_br'>
    <head>
    <link href='index.css' rel='stylesheet'>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Recuperar Senha</title>
</head>
<body>
<div class='container' id='container'>
		<form method='post' action='recuperar_page.php' name='dados' onSubmit='return enviardados();'>
			<h1>Recupere sua senha</h1>
           <p style='color: #ff0000'>Erro: Resposta de Segurança não confere!</p>
           <button>Voltar</button>";
        }

         
            mysqli_close($conexao);
        
        
             break;
        
      
    default:
       // header("Location:index.html");
        break;
}


?>