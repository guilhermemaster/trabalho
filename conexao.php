
<?php
error_reporting(E_WARNING);
ini_set(“display_errors”, 1 );


	//$conexao = mysql_connect('localhost:3306', 'root', '')	 or die ("Erro na conexão com o bd");

	$conexao = mysql_connect('localhost:3306', 'root', 'leticia')	 or die ("Erro na conexão com o bd");

$db = mysql_select_db('willianecia') or die ("Erro na seleção da base de dados"); 






?>