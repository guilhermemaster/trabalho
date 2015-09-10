<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem t&iacute;tulo</title>
<script src="../scripts/mini_tela.js"></script>
<link rel="stylesheet" href="../style/style_cliente.css" type="text/css" />

</head>

<body>
<?php	
	require('../funcao_system.php');
	require('../conexao.php');
	

 ?>


 <form action="clientes_cadastros.php" method="post" >
   <p align="center">NOME DO CLIENTE: <input name="nome_filme_procura" type="text"  /> </p>
  </form>
  
   <table border="1"><tr> <th>NOME DO CLIENTE</th> <th>ENDEREÇO</th> <th>CIDADE</th><th>BAIRRO</th><th>TELEFONE (1)</th><th>TELEFONE (2)</th><th>DELETAR</th><th>ALTERAR DADOS</th></tr>
 
<?php

$procura_filme=strtoupper($_POST['nome_filme_procura']);
	if (empty($procura_filme)){ 
			$sql="select * from cadastro_cliente limit 10";
					}
						else{
							$sql="select * from cadastro_cliente where nome like '%".$procura_filme."%' limit 10 ";
								}



						
						
					$resultado1 = mysql_query($sql) or die ("NÃ£o Ã© possivel realiza a consuta");
					if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					
						while($linha1=mysql_fetch_array($resultado1)) {
						
						print"<tr>";
						
						
						print "<td><a href=\"javascript:abrir('mostra_usuario.php?id=".$linha1['idcliente']."');\">".$linha1['nome']."</a></td>";
						print "<td>".$linha1['endereco']."</td>";
						print "<td>".$linha1['municipio']."</td>";
						print "<td>".$linha1['bairro']."</td>";
						print "<td>".$linha1['telefone_1']."</td>";
						print "<td>".$linha1['telefone_2']."</td>";
						
						print "<td><form action=\"clientes_cadastros.php\" method=\"post\" >
								<input name=\"filmes_baixados\" type=\"submit\"  value=\"DELETAR\" />
								<input name=\"verificar\" type=\"hidden\" value=\"deletar\" />
								<input name=\"id\" type=\"hidden\" value=\"".$linha1['idcliente']."\"  />
								</form>
								</td>";
						print "<td><form action=\"altera_cliente.php\" method=\"post\" >
								<input name=\"filmes_baixados\" type=\"submit\"  value=\"ALTERAR\" />
								<input name=\"verificar\" type=\"hidden\" value=\"alterar\" />
								<input name=\"id\" type=\"hidden\" value=\"".$linha1['idcliente']."\"  />
								</form>
								</td>";
								
						
								
						print"</tr>";	
						
						}
						
						if($_POST['verificar']=='deletar'){
							$sql="delete from cadastro_cliente where idcliente=".$_POST['id'];
							
							try {
						    executa_sql($sql);
							} catch (Exception $e) {
							echo "Exceção pega: ",  $e->getMessage(), "\n";
							}

							print "<meta http-equiv=\"refresh\" content=\"0;URL=clientes_cadastros.php\">";							
						}
		
						
?>
</table>	

<br/>
						<div class="menu">
							<form action="altera_cliente.php" method="post">
								<input name="filmes_baixados" type="submit"  value="VOLTA" />
								<input name="verificar" type="hidden" value="alterar" />
							</form>
						</div>
						<div class="direita">
							<form action="altera_cliente.php" method="post" >
								<input name="filmes_baixados" type="submit"  value="PRÓXIMO" />
								<input name="verificar" type="hidden" value="alterar" />
							</form>
 						</div>

</body>
</html>