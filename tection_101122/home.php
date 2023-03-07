<!DOCTYPE html>
<html lang="pt_br">
<head>
    <link href="Senha.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Rota</title>
</head>
<body>
<div class="container" id="container">
		<form method='post' action='maps_crud.php?acao=salvar' name='dados' onSubmit='return enviardados();'>
			<h1>Calcular Rota</h1>
			<table>
			 <tr>
			<td><input id="OrinLat" name="OrinLat" type="OrinLat" placeholder="Latitude Origem" /></td>
			<td><input id="OrinLon" name="OrinLon" type="OrinLon" placeholder="Longitude Origem" /></td>
			</tr>
			<tr>
			<td><input id="DestLat" name="DestLat" type="DestLat" placeholder="Latitude Destino" /></td>
			<td><input id="DestLon" name="DestLon" type="DestLon" placeholder="Longitude Destino" /></td>
			<tr><input id="Endereco" name="Endereco" type="Endereco" placeholder="Nome da Rota" /></tr>
		    </tr>
		    </table>
		    <button name="Submit" type="submit"  value="Salvar">Salvar</Button><br>
		    <button type="submit" name="action" formaction="maps_crud.php?acao=calcular">Calcular Rota</button><br>
		    <button type="submit" name="action" formaction="maps_crud.php?acao=selecionar">Rotas Cadastradas</button><br>
		    <button type="submit" name="action" formaction="TelaInicial.html">Inicio</button>
		     <!--<button type="submit" name="action" formaction="Enviar.php">Alerta EverSafely</button>-->
		    
		</form>
	
		
</div>
<p  id="demo">Clique no botão para receber sua localização em Latitude e Longitude:</p>
<button onchange="getLocation()" onclick="getLocation()">Clique Aqui</button>

<input type="hidden" id="latitude">
<input type="hidden" id="longitude">

<script>
var x=document.getElementById("demo");
function getLocation()
{
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
    }else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
}
function showPosition(position)
{
    x.innerHTML="Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude; 

    document.getElementById('latitude').value = position.coords.latitude;
    document.getElementById('longitude').value = position.coords.longitude;
}
</script>

</body>
</html>