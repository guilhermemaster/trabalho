<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<?php

function executa_sql($sql){
	     if (mysql_query($sql)){
		 print "<script type=\"text/javascript\">alert(\"Operação realizada com sucesso!\");</script>";							
		 }else{
		
		 print "<script type=\"text/javascript\">alert(\"Ocrorreu um erro ao gravar os dados!\");</script>";

		 }
}

	function insert($nome, $tipo_pessoa, $cpf, $rg, $data_nascimento, $municipio, $bairro,
	 $endereco, $cep, $uf, $estado_civil, $telefone1, $telefone2, $email, $nome_pessoa, $telefone_pessoa, 
	 $vinculo){
  
    $data_atual= date('Y-m-d');
    $sql="insert into cadastro_cliente (nome, cpf, endereco, cep, data_nascimento, uf, data_cadastro, estado_civil, rg, 
    municipio, bairro, tipo_pessoa, telefone_1, telefone_2, email, nome_pessoa_1, telefone_pessoa_1, vinculo_pessoa_1)
    values('$nome', '$cpf','$endereco', '$cep', '$data_nascimento', '$uf', '$data_atual', '$estado_civil', '$rg', '$municipio', 
    '$bairro', '$tipo_pessoa', '$telefone1', '$telefone2', '$email', '$nome_pessoa', '$telefone_pessoa', '$vinculo')";

	validar($nome, $cpf, $rg, $endereco, $telefone1, $telefone2, $data_atual, $data_nascimento, $sql);


	}


	function validar($nome, $cpf, $rg, $endereco, $telefone1, $telefone2, $data_atual, $data_nascimento, $sql){
		if(empty($nome)  || empty($cpf) || empty($endereco) || empty($telefone1) || empty($telefone2) ){
				print "<script type=\"text/javascript\">alert(\"Campos Obrigatórios não foram preenchidos!\");</script>";
				}else 
					if(strtotime($data_atual) < strtotime($data_nascimento)){
						print "<script type=\"text/javascript\">alert(\"Data do cadastro maior que a data do nascimento!\");</script>";
						}else{

							if (mysql_query($sql)){
							print "<script type=\"text/javascript\">alert(\"Operação realizada com sucesso!\");</script>";							
							}else{
							print "<script type=\"text/javascript\">alert(\"Ocrorreu um erro ao gravar os dados!\");</script>";
							}

						}
	}
	
	
	
	class pega{
	  var $passa;
	  public function set_puxa($varia){
	     $this->passa=$varia;
	  }
	  
	  public function get_puxa(){
	   return $this->passa;
	  }
	  
	}

?>
</body>
</html>