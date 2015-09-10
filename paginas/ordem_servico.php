<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link rel="stylesheet" href="../style/style_cliente.css" type="text/css" />




</head>

<body>
<?php	
	require('../funcao_system.php');
	require('../conexao.php');
	

 ?>
<div class="menu">
<form action="ordem_servico.php" method="post">
<input name="novo" value="Nova Ordem de Serviço" type="submit"	title="submenu"/> 
</form>
</div>

<div class="menu">
<form action="servico_aberto.php" method="post">
<input name="novo" value="Ordens de Serviço Abertas" type="submit"	title="submenu"/> 
</form>
</div>

<div class="menu">
<form action="servico_fechado.php" method="post">
<input name="novo" value="Ordens de Serviço Enceradas" type="submit"	title="submenu"/> 
</form>
</div>

<br />
<p>
<form action="busca_cliente.php" method="post">
<input name="buscar" type="submit" VALUE="BUSCAR CLIENTE " title="busca"/> 
 </form>
 </p>
 <form action="ordem_servico.php" method="post">
<?php
	if (! empty($_POST['id'])){
            
            $id_cliente=$_POST['id'];
			$nome=$_POST['nome'];
			$endereco=$_POST['endereco'];
			$cep=$_POST['cep'];
			$uf=$_POST['uf'];
			$municipio=$_POST['municipio'];
            $bairro=$_POST['bairro'];
            $tele_1=$_POST['tele_1'];
            $tele_2=$_POST['tele_2'];



			print "<p>Nome: $nome </p>";
			print "<p>Endereço: $endereco </p>";
			print "<p>CEP: $cep </p>";
			print "<p>UF: $uf </p>";
			print "<p>Município: $municipio </p>";
			print "<p>Bairro: $bairro </p>";
			print "<p>Telefone (1): $tele_1 </p>";
			print "<p>Telefone (2): $tele_2 </p>";

			print "
			<input name=\"id_cliente\" type=\"hidden\" value=\"$id_cliente\"  />
			<input name=\"nome\" type=\"hidden\" value=\"$nome\"  />
			<input name=\"endereco\" type=\"hidden\" value=\"$endereco\"  />
			<input name=\"cep\" type=\"hidden\" value=\"$cep\"  />
			<input name=\"uf\" type=\"hidden\" value=\"$uf\"  />
			<input name=\"municipio\" type=\"hidden\" value=\"$municipio\"  />
			<input name=\"bairro\" type=\"hidden\" value=\"$bairro\"  />
			<input name=\"tele_1\" type=\"hidden\" value=\"$tele_1\"  />
			<input name=\"tele_2\" type=\"hidden\" value=\"$tele_2\"  />
					";
          
	}
?>


<p>Data do Serviço: <input name="data_servico" type="date" /></p>
<p>Valor: <input name="valor" type="text" placeholder="Valor do Serviço (ex.: 99.78)" /></p>
<p>Descriçõa do Serviço: <textarea name="desc_servico" rows="10" cols="30" /></textarea></p>
<input name="verifica" type="hidden" value="insert"  />
<p><input name="enviar" type="submit" value="ENVIAR" title="confirma"/></p> 
</form>
<?php

if ($_POST['verifica']=='insert'){
	
	$sql = "insert into ordem_servico (id_cliente, nome_cliente, endereco, cep, uf, municipio, bairro, tele_1, tele_2, data_servico, descricao, status_servico, valor)
	     values (".$_POST['id_cliente'].", '".$_POST['nome']."','".$_POST['endereco']."', '".$_POST['cep']."', '".$_POST['uf']."', '".$_POST['municipio']."',
	     '".$_POST['bairro']."','".$_POST['tele_1']."', '".$_POST['tele_2']."', '".$_POST['data_servico']."', '".$_POST['desc_servico']."', '1', ".$_POST['valor'].")
     ";
 
     
     $data_atual= date('Y-m-d');
     if(strtotime($data_atual) > strtotime($_POST['data_servico'])){
	 print "<script type=\"text/javascript\">alert(\"Data do Cadastro menor que a data da Ordem de Serviço!\");</script>";
		}else{
		executa_sql($sql);
		}    

}

?>



</body>
</html>