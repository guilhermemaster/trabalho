<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link rel="stylesheet" href="../style/style_cliente.css" type="text/css" />

</head>

<body>
<?php
require "../conexao.php";
require "../funcao_system.php";

?>

<div class="menu">
    <form action="clientes_cadastros.php" method="post">
    <input name="clientes_cadastrados" type="submit" value="CLIENTES CADASTRADOS" title="submenu"/>
    </form>
</div>
<div class="menu">
    <form action="relatorio.php" method="post">
    <input name="relatorio" type="submit" value="RELATÓRIO" title="submenu"/>
    </form>
</div>
<br />

<p>Cadastro de Clientes</p>
<i>campos com * são de carater obrigatório</i>

<form action="cadastra_cliente.php" method="post">
<p>Nome Completo: * <input name="nome" type="text" placeholder="Nome Completo" /></p>
<p>Tipo de pessoa: * <select name="tipo_pessoa" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
    					<option>FÍSICA</option>
    					<option>JURÍDICA</option>
 					 </select></p>
<p>CPF/CNPJ do cliente: * <input name="cpf" placeholder="CPF/CNPJ sem ponto ou traço" type="text" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" /></p>

<p>RG: *<input name="rg" type="text" placeholder="RG sem ponto ou traço" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;"/></p>
<p>Data de nascimento: <input name="data_nascimento" type="date" /></p>
<p>Município: <input name="municipio" type="text" placeholder="Nome do Município" /></p>
<p>Bairro: <input name="bairro" type="text" placeholder="Nome do Bairro"/> </p>
<p>Endereço: * <input name="endereco" type="text" placeholder="Endereço completo com número"/></p>
<p>CEP: <input name="cep" type="text" placeholder="CEP sem ponto ou traço" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;"/></p>
<div class="formulario2">
<p>UF:  
  <select name="uf" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
  <?php
    			$sql="select * from estados";
					$resultado1 = mysql_query($sql) or die ("Não é possivel realiza a consuta");
					if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
						while($linha1=mysql_fetch_array($resultado1)) {
							print "<option>".strtoupper($linha1['estado_sigla'])."</option>";
							
						}
	?>					
  </select>
  </p>
  <p>Estado cívil:  <select name="estado_civil" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
    <option>SOLTEIRO(A)</option>
    <option>CASADO(A)</option>
    <option>SEPARADO(A)</option>
    <option>DESQUITADO(A)</option>
    <option>DIVORCIADO(A)</option>
    <option>VIÚVO(A)</option>
    <option>OUTRO</option>
  </select></p>
<P>Telefone (1): * <input name="telefone1" type="text" placeholder="Telefone com o DDD" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;"/></P>
<p>Telefone (2): * <input name="telefone2" type="text" placeholder="Telefone com o DDD" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" /></p>
<p>Email: <input name="email" type="text" placeholder="Email completo" /></p>
<br />


<p>Pessoas para entra em contato</p>
<p>Nome completo: <input name="nome_pessoa" type="text" placeholder="Nome Completo" /></p>
<p>Telefone: <input name="telefone_pessoa" type="text" placeholder="Telefone com o DDD" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;"/></p>
<p>Tipo de vínculo: <input name="vinculo_pessoa" type="text" placeholder="Vínculo (ex.:Mãe, Pai...)" /></p>
<input name="verificar" type="hidden" value="cadastro_ok" />
<p><input name="enviar" type="submit" value="CADASTRA" title="confirma"/>  
<input name="limpar" type="reset" value="LIMPAR CAMPOS" title="confirma"/></p>
 </div> 
</form>

<?php 



if (!empty($_POST['verificar'])){
	if($_POST['verificar']=='cadastro_ok'){
		$nome=strtoupper($_POST['nome']);
		$cpf=strtoupper($_POST['cpf']);
		$rg=strtoupper($_POST['rg']);
		$data_nascimento=strtoupper($_POST['data_nascimento']);
		$municipio=strtoupper($_POST['municipio']);
		$bairro=strtoupper($_POST['bairro']);
		$endereco=strtoupper($_POST['endereco']);
		$cep=strtoupper($_POST['cep']);
		$tele1=strtoupper($_POST['telefone1']);
		$tele2=strtoupper($_POST['telefone2']);
		$email=strtoupper($_POST['email']);
		$nome_pessoa=strtoupper($_POST['nome_pessoa']);
		$tele_pessoa=strtoupper($_POST['telefone_pessoa']);
		$vinculo=strtoupper($_POST['vinculo_pessoa']);

		insert($nome, $_POST['tipo_pessoa'], $cpf, $rg, $data_nascimento, $municipio, 
		$bairro, $endereco, $cep, $_POST['uf'],
		$_POST['estado_civil'], $tele1, $tele2, $email, $nome_pessoa, $tele_pessoa, $vinculo); 
	
		unset($nome, $cpf, $rg, $data_nascimento, $municipio,
 		$bairro, $endereco, $cep, $tele1, $tele2, $email, $nome_pessoa, $tele_pessoa, $vinculo );		

			}
			
	}


?>
</body>
</html>