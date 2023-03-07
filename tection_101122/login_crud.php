<?php
#Chamando o arquivo conexao.php
include_once"conexao.php";
#pegando o valor da ação via URL
$acao = $_GET['acao'];
#Comparando se o valor da URL é do tipo GET
if(isset($_GET['id'])){
    #Criando uma variavel para armazenar o valor obtido no GET
    $id = $_GET['id'];
}

switch($acao){

    //Cadastrar
    case 'cadastrar':
    $Nome = $_POST['Nome'];
  //  $Telefone = $_POST['Telefone'];
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
    $PerguntaSeguranca = $_POST['PerguntaSeguranca'];
    $RespostaSeguranca = $_POST['RespostaSeguranca'];

            $sqlInsert = "INSERT INTO Usuario (Nome, Email, Senha, PerguntaSeguranca, RespostaSeguranca) 
            values ('$Nome', '$Email', '$Senha', '$PerguntaSeguranca', '$RespostaSeguranca')";

    if (!mysqli_query($conexao,$sqlInsert)) {
        die("Erro ao cadastrar usuário: ".mysqli_error($conexao));
    }else{
    echo "<script language='javascript' type='text/javascript'>
    alert('usuário cadastrado com sucesso!')
    window.location.href='index.html'</script>";
    }
    break;

    //Login
    case 'logar':
    $id = $_POST['id'];
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
      
      
    if (isset($_POST['Email']) || isset($_POST['Senha'])){
        if(strlen($_POST['Email']) == 0){
                echo "<script language='javascript' type='text/javascript'>
                alert('Digite o email!')
                window.location.href='index.html'</script>";
        }else if(strlen($_POST['Senha']) == 0){
                echo "<script language='javascript' type='text/javascript'>
                alert('Digite a senha!')
                window.location.href='index.html'</script>";
        } else {

            $sql_code = "SELECT * FROM Usuario WHERE Email = '$Email' AND Senha = '$Senha'";
            $resultado = mysqli_query($conexao, $sql_code) or die ("Erro ao retornar dados");

            $quantidade = $resultado->num_rows;

            if($quantidade == 1) {
                echo "<script language='javascript' type='text/javascript'>
                alert('Login realizado com sucesso!')
                window.location.href='TelaInicial.html'</script>";
                
            } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Falha ao logar! Senha ou Email incorreto.')
            window.location.href='index.html'</script>";
            }
        }
    }
    mysqli_close($conexao);
        
        
    break;
    
  
        
        
    default:
        header("Location:index.html");
        break;
}


?>