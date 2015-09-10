<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>G_Index System</title>
</head>
<body>
<p align="center"><img src="img/carregando_azul.gif" alt="" /></p>

<?php
include_once "conexao.php";
$nome =strtoupper($_POST['login']);
$senha =strtoupper( $_POST['senha']);
/*strtoupper( $_POST['login']);*/
					
					$sql="SELECT * FROM configuracoes";
					$resultado = mysql_query($sql) or die ("Não é possivel realiza a consuta");
					if(@mysql_num_rows($resultado)==0) die ("Nenhum registro encontrado");
					
					while($linha=mysql_fetch_array($resultado)) {
						if( $nome == $linha['nome'] && $senha == $linha['senha']){
							$nomesessao=$linha['nome'];
							$validador="valido";
						}
 		
 		
					
					
					}
if( $validador=="valido"){
	session_start("administracao");
	$_SESSION["user"]=$nomesessao;
	
	print "<meta http-equiv=\"refresh\" content=\"3;url=menu.php\">";
	
}else{
print "<meta http-equiv=\"refresh\" content=\"3;url=acesso_negado.php\">";
}
?>
</body>
</html>