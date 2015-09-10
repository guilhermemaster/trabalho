<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Configurações</title>
<link rel="stylesheet" href="style/style_configuracoes.css" type="text/css" />
</head>

<body>
<?php
	include_once "conexao.php";
	session_start("administracao");
	$pesquisa=$_SESSION["user"];
	
	$sql="SELECT * FROM configuracoes where nome='".$pesquisa."' ";
					$resultado1 = mysql_query($sql) or die ("Não é possivel realiza a consuta");
					if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					
					while($linha1=mysql_fetch_array($resultado1)) {
						$id=$linha1['idConfiguracoes'];
						$nome=$linha1['nome'];
						$email=$linha1['email'];
						$senha=$linha1['senha'];
						
					}
?>
<p title="titulo">Seus Dados Do Cadastro</p>
<form action="configuracoes_modificar.php" method="post">
<p>Nome: <textarea name="nome"  rows="1" cols="20" /><?php print $nome; ?></textarea> </p>
<p>Email: <textarea name="email"  rows="1" cols="40" /><?php print $email; ?></textarea> </p>
<p>Senha: <textarea name="senha"  rows="1" cols="20" /><?php print $senha; ?></textarea> </p>
<input name="ENVIAR" type="submit" />
</form>
</body>
</html>
