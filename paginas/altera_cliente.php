<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="../style/style_cliente.css" type="text/css" />
</head>

<body bgcolor="#CCCCCC">
<p align="center"><strong>Dados sobre o cliente</strong></p>
<?php	
	require('../funcao_system.php');
	require('../conexao.php');
	

 ?>


<?php
$sql ="select * from cadastro_cliente where idcliente=".$_POST['id'];

                   $resultado1 = mysql_query($sql) or die ("NÃ£o Ã© possivel realiza a consuta");
					if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					
						while($linha1=mysql_fetch_array($resultado1)) {



print "<form action=\"altera_cliente.php\" method=\"post\">";
print "<p align=\"center\">Nome do cliente:<textarea name=\"nome\" rows=\"1\" cols=\"30\" />".$linha1['nome']."</textarea></p>";
print "<p align=\"center\">CPF/CNPJ: <textarea name=\"cpf\" rows=\"1\" cols=\"30\" onkeypress=\"if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;\"/>".$linha1['cpf']."</textarea></p>";
print "<p align=\"center\">Endereco: <textarea name=\"endereco\" rows=\"1\" cols=\"30\" />".$linha1['endereco']."</textarea></p>";
print "<p align=\"center\">CEP: <textarea name=\"cep\" rows=\"1\" cols=\"30\" onkeypress=\"if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;\"/>".$linha1['cep']."</textarea></p>";
print "<p align=\"center\">Data de nascimento: <input name=\"data_nascimento\" type=\"date\" value=\"".$linha1['data_nascimento']."\" /></p>";
print "<p align=\"center\">UF: <textarea name=\"uf\" rows=\"1\" cols=\"30\" \"/>".$linha1['uf']."</textarea></p>";
print "<p align=\"center\">Estado civil: <textarea name=\"estado_civil\" rows=\"1\" cols=\"30\" />".$linha1['estado_civil']."</textarea></p>";
print "<p align=\"center\">RG: <textarea name=\"rg\" rows=\"1\" cols=\"30\" onkeypress=\"if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;\"/>".$linha1['rg']."</textarea></p>";
print "<p align=\"center\">Municipio: <textarea name=\"municipio\" rows=\"1\" cols=\"30\" />".$linha1['municipio']."</textarea></p>";
print "<p align=\"center\">Bairro: <textarea name=\"bairro\" rows=\"1\" cols=\"30\" />".$linha1['bairro']."</textarea></p>";
print "<p align=\"center\">Tipo de pessoa:  <textarea name=\"tipo_pessoa\" rows=\"1\" cols=\"30\" />".$linha1['tipo_pessoa']."</textarea></p>";
							
print "<p align=\"center\">Telefone(1): <textarea name=\"telefone_1\" rows=\"1\" cols=\"30\" onkeypress=\"if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;\"/>".$linha1['telefone_1']."</textarea></p>";
print "<p align=\"center\">Telefone(2): <textarea name=\"telefone_2\" rows=\"1\" cols=\"30\" onkeypress=\"if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;\"/>".$linha1['telefone_2']."</textarea></p>";
print "<p align=\"center\">Email: <textarea name=\"email\" rows=\"1\" cols=\"30\" />".$linha1['email']."</textarea></p>";
							
print "<p align=\"center\"><strong>Pessoa para referencia</strong></p>";
print "<p align=\"center\">Nome da pessoa: <textarea name=\"nome_vinculo\" rows=\"1\" cols=\"30\" />".$linha1['nome_pessoa_1']."</textarea></p>";
print "<p align=\"center\">Telefone: <textarea name=\"telefone_referencia\" rows=\"1\" cols=\"30\" onkeypress=\"if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;\"/>".$linha1['telefone_pessoa_1']."</textarea></p>";
print "<p align=\"center\">Vinculo: <textarea name=\"vinculo\" rows=\"1\" cols=\"30\" />".$linha1['vinculo_pessoa_1']."</textarea></p>";
print "<input name=\"verificar\" type=\"hidden\" value=\"alterar_ok\"  />";
print "<input name=\"id\" type=\"hidden\" value=".$linha1['idcliente']."  />";
print "<p align=\"center\"><input name=\"enviar\" type=\"submit\" value=\"ALTERAR\" title=\"confirma\"/></p>";
print "</form>";

						}




if($_POST['verificar']=='alterar_ok'){
	
	$passar=strtoupper($_POST['id']);

	$nome=strtoupper($_POST['nome']);
	$cpf=strtoupper($_POST['cpf']);
	$endereco=strtoupper($_POST['endereco']);
	$cep=strtoupper($_POST['cep']);
	$uf=strtoupper($_POST['uf']);
	$estado_civil=strtoupper($_POST['estado_civil']);
	$rg=strtoupper($_POST['rg']);
	$municipio=strtoupper($_POST['municipio']);
	$bairro=strtoupper($_POST['bairro']);
	$tipo_pessoa=strtoupper($_POST['tipo_pessoa']);
	$tele1=strtoupper($_POST['telefone_1']);
	$tele2=strtoupper($_POST['telefone_2']);
	$email=strtoupper($_POST['email']);

	$nome_vinculo=strtoupper($_POST['nome_vinculo']);
	$tele_refe=strtoupper($_POST['telefone_referencia']);
	$vinculo=strtoupper($_POST['vinculo']);




	$sql = "update cadastro_cliente set nome='".$nome."' ,cpf='".$cpf."' ,endereco='".$endereco."' ,
	cep='".$cep."', data_nascimento='".$_POST['data_nascimento']."',uf='".$uf."', 
	estado_civil='".$estado_civil."', rg='".$rg."', municipio='".$municipio."', 
	bairro='".$bairro."', tipo_pessoa='".$tipo_pessoa."', telefone_1='".$tele1."', 
	telefone_2='".$tele2."', email='".$email."', nome_pessoa_1='".$nome_vinculo."', 
	telefone_pessoa_1='".$tele_refe."', vinculo_pessoa_1='".$vinculo."' 
	where idcliente=".$_POST['id']."";
	
	executa_sql($sql);
	unset($nome, $cpf, $endereco, $cep, $uf, $estado_civil, $rg,  $municipio, $bairro, $tipo_pessoa, $tele1, $tele2, 
	$email, $nome_vinculo, $tele_refe, $vinculo );		
	print "<meta http-equiv=\"refresh\" content=\"0;URL=cadastra_cliente.php\">";	
    
}



?>

</body>
</html>