<?php
	include_once('../dao/conecta.php');
	include_once('../dao/daoProduto.php');
	include_once('../modelo/produto.php');
	class ControleProduto{
		private $dao;
		function executa($comando){
			$this->dao=new DaoProduto();
			if($comando=="cadastraProduto"){
				$this->cadastraProduto();
			}
		}
		function cadastraProduto(){ //Cadastrar o produto no sistema
			$nome=$_REQUEST['nome'];
			$codigo=$this->dao->cadastraProduto($nome);
			
			$produto=new Produto();
			$produto->setCodigo($codigo);
			$produto->setNome($nome);
			
			echo $produto->getCodigo();
		}
	}
	
	if(isset($_REQUEST['comando'])){
		$cd=new ControleProduto(); //Inicia a classe de controle
		
		$comando=$_REQUEST['comando'];
				
		$cd->executa($comando);
	}
?>