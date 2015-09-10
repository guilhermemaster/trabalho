
<?php

require('../dompdf/dompdf_config.inc.php');
require('../funcao_system.php');
require('../conexao.php');


date_default_timezone_set('America/Sao_Paulo');
$relatorio="Relatório_de_Clientes_Cadastrados";
$html ="<html><body>";

$html .='
	<h1><img src="../img_por_fora/logo_cliente.jpg" /> Ordem de Serviço</h1><br />';
	
	                 $sql="select * from ordem_servico where status_servico ='1' and idservico=".$_POST['id']."";
		             $resultado1 = mysql_query($sql) or die ("NÃ£o Ã© possivel realiza a consuta");
					 if(@mysql_num_rows($resultado1)==0) die ("Nenhum registro encontrado");
					 while($linha1=mysql_fetch_array($resultado1)) {
						$html.='
						<p>Número da Ordem de Serviço: '.$linha1['idservico'].'</p> 
						<p>Nome do cliente: '.$linha1['nome_cliente'].'</p> 
						<p>Endereço: '.$linha1['endereco'].'</p> 
						<p>CEP: '.$linha1['cep'].'</p> 
						<p>UF: '.$linha1['uf'].'</p> 
						<p>Município: '.$linha1['municipio'].'</p> 
						<p>Bairro: '.$linha1['bairro'].'</p> 
						<p>Telefone (1): '.$linha1['tele_1'].'</p> 
						<p>Telefone (2): '.$linha1['tele_2'].'</p> 
						<p>Data da realização do Serviço: '.$linha1['data_servico'].'</p>
						<p>Valor do Serviço (R$): '.$linha1['valor'].'</p>  
						<p>Descrição do Serviço: '.$linha1['descricao'].'</p>';
					}
	
	
	$html .='
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





