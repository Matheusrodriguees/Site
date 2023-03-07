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
    case 'enviar':
        
          $id = $_GET['id'];
        $sql = 'SELECT *, Usuario.Email  FROM Contatos inner join Usuario on (Usuario.IdUsuario = Contatos.IdUsuario) WHERE IdContato ='. $id;
        $resultado = mysqli_query($conexao, $sql) or die ("Erro ao retornar dados");
        $registro = mysqli_fetch_array($resultado);
        
        
    $para = $registro['EmailContato'];
    $name = $registro['NomeContato'];
    $email = $registro['Email'];
    $subject = 'Alerta EverSafely';
    $message = $registro['Mensagem'];
    $mensagem = "Nome: $name<br>";
    $mensagem .= "Email: $email<br>";
    $mensagem .= "Assunto: $subject<br>";
    $mensagem .= "Mensagem: $message<br>";
    $headers = 'From: '.$email."\r\n". 'Reply-To: '.$email."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($para, $subject, $mensagem, $headers)){
        echo "<script language='javascript' type='text/javascript'>
            alert('Alerta enviado com sucesso!')
            window.location.href='TelaInicial.html'</script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
            alert('Aconteceu um erro! Tente novamente')
            window.location.href='TelaInicial.html'</script>";
    }
        
        
    default:
    // header("Location:home.php");
    break;
}


?>