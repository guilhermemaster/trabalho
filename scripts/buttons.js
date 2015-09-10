// JavaScript Document
(function(){
	
	//configurações básicas
	
	document.getElementById("button1").onclick=function(){
		var mainContent = document.getElementById("mainContent");
		mainContent.innerHTML="<object type='text/html' data='home.php' width='800' ></object>";
		
	};
	
	document.getElementById("button2").onclick=function(){
		var mainContent = document.getElementById("mainContent");
		mainContent.innerHTML="<object type='text/html' data='confiracoes.php' width='800' height='400' ></object>";
		
	};
	
		document.getElementById("cadastra_cliente").onclick=function(){
		var mainContent = document.getElementById("mainContent");
		mainContent.innerHTML="<object type='text/html' data='paginas/cadastra_cliente.php' width='800' height='400' ></object>";
		
	};
	
		document.getElementById("ordem_servico").onclick=function(){
		var mainContent = document.getElementById("mainContent");
		mainContent.innerHTML="<object type='text/html' data='paginas/ordem_servico.php' width='800' height='400' ></object>";
		
	};
	

	
	
})();