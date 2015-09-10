<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<p align="center"><img src="img/carregando_azul.gif" width="80" height="80" /></p>
<?php


 
 
 include_once "conexao.php";
 
    session_start("administracao");
	$pesquisa=$_SESSION["user"];

$nome=strtoupper( $_POST['nome']);
$senha=strtoupper( $_POST['senha']);
$email=strtoupper( $_POST['email']);
	
	$sql="SELECT * FROM configuracoes where nome='".$pesquisa."' ";
					$resultado1 = mysql_query($sql) or die ("Não é possivel realiza a consuta");
					if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					
					while($linha1=mysql_fetch_array($resultado1)) {
						$id=$linha1['idConfiguracoes'];
						
						
					}

 $sql="UPDATE configuracoes SET nome = '".$nome."',senha='".$senha."', email='".$email."' 
WHERE  idConfiguracoes='".$id."'";
					mysql_query($sql);
					session_start("administracao");
					$_SESSION["user"]=$_POST['nome'];
?>
<meta http-equiv="refresh" content="3;url=home.php">
</body>
</html>