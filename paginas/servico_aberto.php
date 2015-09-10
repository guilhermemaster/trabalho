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
	require('../inverter_data.php');
	

 ?>


 <form action="servico_aberto.php" method="post" >
   <p align="center">NOME DO CLIENTE: <input name="nome_filme_procura" type="text"  /> </p>
  </form>
  
   <table border="1"><tr><th>NÚMERO DA ORDEM DE SERVIÇO</th> <th>NOME DO CLIENTE</th> <th>ENDEREÇO</th> <th>UF</th><th>CEP</th><th>CIDADE</th>
   	<th>BAIRRO</th><th>TELEFONE (1)</th><th>TELEFONE (2)</th><th>DATA DO SERVIÇO</th><th>VALOR</th><th>DESCRIÇÃO DO SERVIÇO</th><th>FINALIZAÇÃO</th><th>IMPRIMIR OR</th></tr>
 
<?php

$procura_filme=strtoupper($_POST['nome_filme_procura']);
	if (empty($procura_filme)){ 
			$sql="select * from ordem_servico where status_servico ='1'";
					}
						else{
							$sql="select * from ordem_servico where nome_cliente like '%".$procura_filme."%'";
								}



						
						
					$resultado1 = mysql_query($sql) or die ("NÃ£o Ã© possivel realiza a consuta");
					if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					
						while($linha1=mysql_fetch_array($resultado1)) {
						
						print"<tr>";
						
						print "<td>".$linha1['idservico']."</td>";
						print "<td>".$linha1['nome_cliente']."</td>";
						print "<td>".$linha1['endereco']."</td>";
						print "<td>".$linha1['uf']."</td>";
						print "<td>".$linha1['cep']."</td>";
						print "<td>".$linha1['municipio']."</td>";
						print "<td>".$linha1['bairro']."</td>";
						print "<td>".$linha1['tele_1']."</td>";
						print "<td>".$linha1['tele_2']."</td>";
						print "<td>".troca_data($linha1['data_servico'])."</td>";
						print "<td>".$linha1['valor']."</td>";
						print "<td>".$linha1['descricao']."</td>";
						print "<td><form action=\"servico_aberto.php\" method=\"post\" >
								<input name=\"filmes_baixados\" type=\"submit\" value=\"ENCERRAR SERVIÇO\" />
								<input name=\"verificar\" type=\"hidden\" value=\"status\"  />
     							<input name=\"id\" type=\"hidden\" value=\"".$linha1['idservico']."\"  />
							



								</form>
								</td>";
						print "<td><form action=\"relatorio_servico.php\" method=\"post\">
								<input name=\"id\" type=\"hidden\" value=\"".$linha1['idservico']."\"  />
    						   <input name=\"relatorio\" type=\"submit\" value=\"IMPRIMIR\" />
    							</form></td>";
					
															

						
						
								
						print"</tr>";	
						
						}
						
						if($_POST['verificar']=='status'){
							$sql="update ordem_servico set status_servico='0' where idservico=".$_POST['id'];
							executa_sql($sql);
							print "<meta http-equiv=\"refresh\" content=\"0;URL=servico_aberto.php\">";
						}
		
						if($_POST['verificar']=='alterar'){
							print "oi";
						}
						
?>
</table>	

<br/>


</body>
</html>