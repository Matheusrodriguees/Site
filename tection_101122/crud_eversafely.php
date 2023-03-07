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
    case 'preencher':
        echo "
        <!DOCTYPE html>
    <html lang='pt_br'>
<head>
    <link href='index.css' rel='stylesheet'>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Cadastrar Contato</title>
</head>
<body>
<div class='container' id='container'>

		<form method='post' action='crud_eversafely.php?acao=cadastrar' name='dados' onSubmit='return enviardados();'>
			<h1>Cadastro de Contatos</h1>
			<input type='EmailUsuario' name='EmailUsuario' placeholder='Email do usuário' />
			<input type='NomeContato' name='NomeContato' placeholder='Nome do Contato'  />
			<input type='EmailContato' name='EmailContato' placeholder='Email do Contato' />
			<input type='TelefoneContato' name='TelefoneContato' placeholder='Telefone do Contato' />
			<input type='Mensagem' name='Mensagem' placeholder='Mensagem' />
          
		    <button>Cadastrar</button>      
		    <br>
		    <button type='submit' name='action' formaction='cad_eversafely_page.php'>Contatos Cadastrados</button>
		    <br>
		    <button type='submit' name='action' formaction='TelaInicial.html'>Inicio</button>
		</form>
</div>




</body>
</html>

";
break;

    case 'cadastrar':
    $EmailUsuario = $_POST['EmailUsuario'];
    $NomeContato = $_POST['NomeContato'];
    $EmailContato = $_POST['EmailContato'];
    $TelefoneContato = $_POST['TelefoneContato'];
    $Mensagem = $_POST['Mensagem'];
    
        if (isset($_POST['EmailUsuario']) || isset($_POST['NomeContato']) || isset($_POST['EmailContato'])|| isset($_POST['TelefoneContato']) || isset($_POST['Mensagem'])){
        if(strlen($_POST['EmailUsuario']) == 0){
                echo "<script language='javascript' type='text/javascript'>
                alert('Digite todos os campos!')
                window.location.href='crud_eversafely.php?acao=preencher'</script>";
        }else if(strlen($_POST['EmailContato']) == 0){
                echo "<script language='javascript' type='text/javascript'>
                alert('Digite todos os campos!')
                window.location.href='crud_eversafely.php?acao=preencher'</script>";
        } else {

    

    $sqlSelect = "SELECT * FROM Usuario WHERE Email = '".$EmailUsuario."' ";
        $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");
        $registro = mysqli_fetch_array($resultado);
        $IdUsuario = $registro['IdUsuario'];

            $sqlInsert = "INSERT INTO Contatos (NomeContato, EmailContato, Telefone, Mensagem, IdUsuario) 
            values ('$NomeContato', '$EmailContato', '$TelefoneContato', '$Mensagem', '$IdUsuario')";

    if (!mysqli_query($conexao,$sqlInsert)) {
        die("Erro ao cadastrar contato: ".mysqli_error($conexao));
    }else{
    echo "<script language='javascript' type='text/javascript'>
    alert('Contato cadastrado com sucesso!')
    window.location.href='cad_eversafely_page.php'</script>";
    }
        
    break;
        }}



//Alterar

    case 'montar':
    echo "
    <html lang='pt_br'>
<head>
    <link href='index.css' rel='stylesheet'>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Atualizar Contato</title>
</head>
<body>
<div class='container' id='container'>";
        $id = $_GET['id'];
        $sql = 'SELECT * FROM Contatos WHERE IdContato ='. $id;
        $resultado = mysqli_query($conexao, $sql) or die ("Erro ao retornar dados");
        
        //Montando o formulário 
        echo "<form method='post' name='dados' action='crud_eversafely.php?acao=atualizar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center' >";
        
         while ($registro = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='118'><font size'1' face='Verdana, Arial, Helvetica, sans=serif'> Código: </font></td>";
            echo "<td width='460'>";
            echo "<input name='id' type='text' class='formbutton' id='id' size='5' maxlenght='10' value=" . $id . " readonly>";
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size'1' face='Verdana, Arial, Helvetica, sans=serif'> Nome do Contato: </font></td>";
            echo "<td width='460'>";
            echo "<input name='NomeContato' type='text' class='formbutton' id='NomeContato' size='52' maxlenght='150' value=" . $registro['NomeContato'] . " ";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size'1' face='Verdana, Arial, Helvetica, sans=serif'> Email: </font></td>";
            echo "<td width='460'>";
            echo "<input name='Email' type='text' class='formbutton' id='Email' size='52' maxlenght='150' value=" . $registro['EmailContato'] . " ";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size'1' face='Verdana, Arial, Helvetica, sans=serif'> Telefone: </font></td>";
            echo "<td width='460'>";
            echo "<input name='Telefone' type='text' class='formbutton' id='Telefone' size='52' maxlenght='150' value=" . $registro['Telefone'] . " ";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<tr>";
            echo "<td width='118'><font size'1' face='Verdana, Arial, Helvetica, sans=serif'> Mensagem: </font></td>";
            echo "<td width='460'>";
            echo "<input name='Mensagem' type='text' class='formbutton' id='Mensagem' size='52' maxlenght='250'  value=" . $registro['Mensagem'] . " ";
            echo "</td>";
            echo "</tr>";
            



        }
        
        echo "</table>";
        echo "<Button name='Submit' type='submit' class='formobjects' value='Atualizar'>Atualizar</button>";
        echo "<br>";
        echo "<button type='submit' name='action' formaction='cad_eversafely_page.php'>Inicio</button>";
        echo "</form>";
        
        

        
        mysqli_close($conexao);
        
        break;
        
    case 'atualizar':
        $id = $_POST['id'];
        $NomeContato = $_POST['NomeContato'];
        $Email = $_POST['Email'];
        $Telefone = $_POST['Telefone'];
        $Mensagem = $_POST['Mensagem'];
        
        $sqlUpdate = "UPDATE Contatos SET NomeContato = '" . $NomeContato . "', EmailContato = '" . $Email . "', Telefone = '" . $Telefone . "', Mensagem = '" . $Mensagem . "' WHERE IdContato = '" . $id . "'";
        
        if (!mysqli_query($conexao, $sqlUpdate)){
            die('</br> Erro no comando SQL UPDATE: ' . mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados Atualizados com Sucesso!')
            window.location.href='cad_eversafely_page.php'</script>";
        }
        
        mysqli_close($conexao);
        
        
        break;


//Deletar
case 'deletar':
        date_default_timezone_set('America/Sao_Paulo');
        #header("Content-type: text/html;charset=utf-8");
        include_once "conexao.php";
        
        
         $sqlDelete = "DELETE FROM Contatos WHERE IdContato = '" . $id . "'";
        
        if (!mysqli_query($conexao, $sqlDelete)){
            die ('Error: '.mysqli_error($conexao));
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Contato excluído com sucesso!')
            window.location.href='cad_eversafely_page.php'</script>";
        }
        mysqli_close($conexao);
        header("Location:cad_eversafely_page.php");


        default:
        header("Location:TelaInicial.html");
        break;
}

?>