<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Menu System</title>
<link rel="shortcut icon" href="img/icone.ico">
<link rel="stylesheet" href="style/style_menu.css" type="text/css" />
</head>
<body><p align="center">


<div id="center">
	<div id="heder">
    <p title="log">
    <?php
session_start("administracao");
print "Bem vindo:";
print  $_SESSION["user"];
print "<br />"
?>
</p>
<p title="logomarca"><img src="img/logo.png"/></p>
<?php
if($_SESSION["user"]==null){
	print "Acesso negado!!!!!!";
 print "<meta http-equiv=\"refresh\" content=\"0.001;url=acesso_negado.php\">";
}

?>
    </div>


    <div id="left">
    	<ul>
        	<a id="button1"><li>Home</li></a>
            <a id="button2"><li>Configurações</li></a>
            <a id="cadastra_cliente"><li><font size="-1">Cadastra Cliente</font></li></a>
            <a id="ordem_servico"><li><font size="-1">Ordem de Serviço</font></li></a>
            <a href="destoy.php"><li>Sair</li></a>
                   	
           
        </ul>
         <script src="scripts/buttons.js"></script>
    </div>
    
    <div id="reight">
    	<main id="mainContent">
	<object type='text/html' data="Home.php" width='800'  ></object>
</main>
    </div>
    
    <div id="footer">
    	<p title="responsavel">Copyright © G_Index. All rights reserved.</p>
    </div>
    
</div>
</p>
</body>
</html>
