<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>

<?php	
	require('../funcao_system.php');
	require('../conexao.php');
	

 ?>


 <form action="busca_cliente.php" method="post" >
   <p align="center">NOME DO CLIENTE: <input name="nome_filme_procura" type="text"  /> </p>
  </form>
  
   <table border="1"><tr> <th>NOME DO CLIENTE</th> <th>ENDEREÇO</th> <th>CIDADE</th><th>BAIRRO</th><th>TELEFONE (1)</th><th>TELEFONE (2)</th><th>ADICIONAR À ORDEM DE SERVIÇO</th></tr>
 
<?php

$procura_filme=strtoupper($_POST['nome_filme_procura']);
	if (empty($procura_filme)){ 
			$sql="select * from cadastro_cliente";
					}
						else{
							$sql="select * from cadastro_cliente where nome like '%".$procura_filme."%'";
								}



						
						
					$resultado1 = mysql_query($sql) or die ("NÃ£o Ã© possivel realiza a consuta");
					if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					
						while($linha1=mysql_fetch_array($resultado1)) {
						
						print"<tr>";
						
						
						print "<td>".$linha1['nome']."</td>";
						print "<td>".$linha1['endereco']."</td>";
						print "<td>".$linha1['municipio']."</td>";
						print "<td>".$linha1['bairro']."</td>";
						print "<td>".$linha1['telefone_1']."</td>";
						print "<td>".$linha1['telefone_2']."</td>";
						
						print "<td><form action=\"ordem_servico.php\" method=\"post\" >
								<input name=\"filmes_baixados\" type=\"submit\" value=\"ADICIONAR\" />
								<input name=\"verificar\" type=\"hidden\" value=\"deletar\" />
								<input name=\"id\" type=\"hidden\" value=\"".$linha1['idcliente']."\"  />
								<input name=\"nome\" type=\"hidden\" value=\"".$linha1['nome']."\"  />
								<input name=\"endereco\" type=\"hidden\" value=\"".$linha1['endereco']."\"  />
								<input name=\"cep\" type=\"hidden\" value=\"".$linha1['cep']."\"  />
								<input name=\"uf\" type=\"hidden\" value=\"".$linha1['uf']."\"  />
								<input name=\"municipio\" type=\"hidden\" value=\"".$linha1['municipio']."\"  />
								<input name=\"bairro\" type=\"hidden\" value=\"".$linha1['bairro']."\"  />
								<input name=\"tele_1\" type=\"hidden\" value=\"".$linha1['telefone_1']."\"  />
								<input name=\"tele_2\" type=\"hidden\" value=\"".$linha1['telefone_2']."\"  />



								</form>
								</td>";
						
						
								
						print"</tr>";	
						
						}
						
						if($_POST['verificar']=='deletar'){
							$sql="delete from cadastro_cliente where idcliente=".$_POST['id'];
							
							executa_sql($sql);
						}
		
						if($_POST['verificar']=='alterar'){
							print "oi";
						}
						
?>
</table>	

<br/>


</body>
</html>