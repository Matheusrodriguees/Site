<?php
        date_default_timezone_set('America/Sao_Paulo');
       
        include_once "conexao.php";
               echo "
        <!DOCTYPE html>
                <html lang='pt_br'>
    <head>
    <link href='index.css' rel='stylesheet'>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Enviar EverSafely</title>
</head>
<body>
<div class='container' id='container'>";
        echo "<form method='post' action='TelaInicial.html' name='dados' onSubmit='return enviardados();'>";
        echo "<CENTER><h2>CONTATOS CADASTRADOS</H2>";
        echo "<meta charset='UTF-8'>";
        echo "<center><table border=1>";
        echo "<tr>";
        echo "<th>NOME</th>";
        echo "<th>EMAIL</th>";
        echo "<th>TELEFONE</th>";
        echo "<th>MENSAGEM</th>";
        echo "<th>AÇÃO</th>";
        echo "</tr>";
        
        $sqlSelect = "SELECT * FROM Contatos";
        $resultado = mysqli_query($conexao, $sqlSelect) or die ("Erro ao retornar dados");
        
       
        echo "</br>";
        
        while ($registro = mysqli_fetch_array($resultado)){
            $id = $registro['IdContato'];
            $NomeContato = $registro['NomeContato'];
            $Email = $registro['EmailContato'];
            $Telefone = $registro['Telefone'];
            $Mensagem = $registro['Mensagem'];
            
            echo "<tr>";
            echo "<td>". $NomeContato . "</td>";
            echo "<td>". $Email . "</td>";
            echo "<td>". $Telefone . "</td>";
            echo "<td>". $Mensagem . "</td>";
            echo "<td><a href='Enviar_Email.php?acao=enviar&id=$id'>Enviar Alerta</a>
       
            ";
            
            echo "</tr>";
           
           
        }
         echo"</table>";
         echo"<br>";
         echo "<button>Inicio</button><br>";
         echo "<br>
         
</body>
</html>";
        
        mysqli_close($conexao);
        

        
        
?>