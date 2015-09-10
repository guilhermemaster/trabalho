<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cliente</title>
</head>

<body bgcolor="#CCCCCC">
<p align="center"><strong>Dados sobre o cliente</strong></p>
<?php	
	require('../funcao_system.php');
	require('../inverter_data.php');
	require('../conexao.php');
	

 ?>
<?php
$sql ="select * from cadastro_cliente where idcliente=".$_GET['id'];

                   $resultado1 = mysql_query($sql) or die ("Não é possivel realiza a consuta");
					if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					
						while($linha1=mysql_fetch_array($resultado1)) {
							
							print "<p align=\"center\">Nome do cliente: ".$linha1['nome']."</p>";
							print "<p align=\"center\">CPF/CNPJ: ".$linha1['cpf']."</p>";
							print "<p align=\"center\">Endereco: ".$linha1['endereco']."</p>";
							print "<p align=\"center\">CEP: ".$linha1['cep']."</p>";
							print "<p align=\"center\">Data de nascimento: ".$linha1['data_nascimento']."</p>";
							print "<p align=\"center\">UF: ".$linha1['uf']."</p>";
							print "<p align=\"center\">Data do cadastro: ".troca_data($linha1['data_cadastro'])."</p>";
							print "<p align=\"center\">Estado civil: ".$linha1['estado_civil']."</p>";
							print "<p align=\"center\">RG: ".$linha1['rg']."</p>";
							print "<p align=\"center\">Municipio: ".$linha1['municipio']."</p>";
							print "<p align=\"center\">Bairro: ".$linha1['bairro']."</p>";
							print "<p align=\"center\">Tipo de pessoa: ".$linha1['tipo_pessoa']."</p>";
							
							print "<p align=\"center\">Telefone(1): ".$linha1['telefone_1']."</p>";
							print "<p align=\"center\">Telefone(2): ".$linha1['telefone_2']."</p>";
							print "<p align=\"center\">Email: ".$linha1['email']."</p>";
							
							print "<p align=\"center\"><strong>Pessoa para referencia</strong></p>";
							print "<p align=\"center\">Nome da pessoa: ".$linha1['nome_pessoa_1']."</p>";
							print "<p align=\"center\">Telefone: ".$linha1['telefone_pessoa_1']."</p>";
							print "<p align=\"center\">Vinculo: ".$linha1['vinculo_pessoa_1']."</p>";
							
							
							
							
						}



?>

</body>
</html>