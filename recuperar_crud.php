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

    //Recuperar
    case 'recuperar':
        include_once "conexao.php";
        $codigo = $_POST['Email'];
        
        echo "<form method='post' name='dados' action='recuperar_crud.php?acao=mostrar' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center' >";

        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>EMAIL</th>";
        echo "<th>PERGUNTA DE SEGURANÇA</th>";
        echo "<th>RESPOSTA DE SEGURANÇA</th>";
        echo "<th>AÇÃO</th>";
        echo "</tr>";
        
        $sqlSelect = "SELECT * FROM Usuario WHERE Email = '".$codigo."' ";
        $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");

        
        while ($registro = mysqli_fetch_array($resultado)){
            $Email = $registro['Email'];
            $PerguntaSeguranca = $registro['PerguntaSeguranca'];
            
            
            echo "<td><input name='email' type='text' class='formbutton' id='email' size='52' maxlenght='150' value=" . $Email . " </td>";
            echo "<td>". $PerguntaSeguranca . "</td>";
            echo "<td><textarea name='RespostaSeguranca' cols='50' rows='1' class='formbutton'> </textarea></td>";
            echo "<td><input name='Submit' type='submit' class='formobjects' value='Recuperar Senha'></td>";
            
            echo "</tr>";
        }
        
        mysqli_close($conexao);
        
        
        break;

    //Mostrar
    case 'mostrar':
        include_once "conexao.php";
        $resposta = $_POST['RespostaSeguranca'];
        $email = $_POST['email'];
    

       echo "<form method='post' name='dados' action='index.html' onSubmit='return enviardados();'>";
        echo "<table width='588' border='0' align='center' >";

        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>EMAIL</th>";
        echo "<th>SENHA</th>";
        echo "<th>NOME</th>";
        echo "<th>AÇÃO</th>";
        echo "</tr>";
        
        $sqlSelect = "SELECT * FROM Usuario WHERE Email = '".$email."' ";
        $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");
        $registro = mysqli_fetch_array($resultado);
        
        
            $Email = $registro['Email'];
            $Senha = $registro['Senha'];
            $Nome = $registro['Nome'];
            $RespostaSeguranca = $registro['RespostaSeguranca'];
            
            if ($resposta = $RespostaSeguranca && $Email = $email){
            
            echo "<td>". $Email . "</td>";
            echo "<td>". $Senha . "</td>";
            echo "<td>". $Nome . "</td>";
            echo "<td><input name='Submit' type='submit' class='formobjects' value='Fazer Login'></td>";
            
            echo "</tr>";
        }else{
            echo  "<p style='color: #ff0000'>Erro: Resposta de Segurança não confere!</p>";
        }
        
        mysqli_close($conexao);
        
        
        break;
        
      
    default:
        header("Location:index.html");
        break;
}


?>