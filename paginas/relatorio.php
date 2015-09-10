
<?php

require('../dompdf/dompdf_config.inc.php');
require('../funcao_system.php');
require('../conexao.php');

date_default_timezone_set('America/Sao_Paulo');
$relatorio="Relatório_de_Clientes_Cadastrados";
$html ="<html><body>";

$html .='
	<h1><img src="../img_por_fora/logo_cliente.jpg" /> Relatório de Clientes Cadastrados</h1><br />
	<table border="1"><tr>
		<th>NOME DO CLIENTE</th> 	<th>ENDEREÇO</th> <th>CIDADE</th> <th>BAIRRO</th> <th>TELEFONE (1)</th> <th>TELEFONE (2)</th>    </tr>';
	
	                 $sql="select * from cadastro_cliente";
		             $resultado1 = mysql_query($sql) or die ("NÃ£o Ã© possivel realiza a consuta");
					 if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					 while($linha1=mysql_fetch_array($resultado1)) {
						
						$html.='
						
						
						
						
<tr><td>'.$linha1['nome'].'</td> 
	<td>'.$linha1['endereco'].'</td>  
	<td>'.$linha1['municipio'].'</td> 
	<td>'.$linha1['bairro'].'</td> 
	<td>'.$linha1['telefone_1'].'</td> 
	<td>'.$linha1['telefone_2'].'</td>
</tr>
						';
						
						
						}
	
	
	$html .='</table>
	<div class="absolute" style="top: 160px; left: 160px; right: 160px; bottom: 160px; ">
 		<p><img  src="../img/logo.jpg"  />  v1.0.0</p>
	</div>
	</body></html>';
	
	$html = utf8_decode($html);
	
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	//$dompdf->set_paper('A4','portrait');
	$dompdf->render();
	$dompdf->stream("$relatorio.pdf");
	
	
?>





