<?php 
	require_once("../../../cfg/Session.php");	
	$session = new Session("EventosAsser2016");
	error_reporting(0);
	header("Content-Type: text/html; charset=UTF-8", true);
	require_once("BD.php");
	$bd = new BD();
	include_once('../../../utils/common.php');
	
    if(!strcmp($session->get('login'),null)){
       header('Location: ../../');
       die();
    }	
	$session->set('autor',$_POST['autor']);
	$session->set('titulo',$_POST['titulo']);
	$session->set('tipo',$_POST['tipo']);
	$session->set('pago',$_POST['pago']);
	$bd->atualizaInsc();
 ?>
<!DOCTYPE html >
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-store" />
	<link rel="shortcut icon" href="../../../favicon.ico">
	<title>Asser Eventos</title>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
	<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

	<script src="../../../scripts/asser-main-menu.js"></script>
	<script src="../../../scripts/asser-commum.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
</head>
<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />

          <div id='cssmenu'>
                <ul>
                   <li class='active'><a href='../'>Voltar</a></li>
                   <li><a href='../../../'>Sair</a></li>
                </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 

        <br />
        
        <div id="texto">
		    <form id="cad_resumo" name="resumo" method="post" action="comprovante.php" >
				<input type="hidden" name="codigo" value="<?php echo $codigo; ?>" />
				<input type="hidden" name="autor" value="<?php echo $autor; ?>" />
				<input type="hidden" name="titulo" value="<?php echo $titulo; ?>" />
				<input type="hidden" name="tipo" value="<?php echo $tipo; ?>" />
				<input type="hidden" name="pago" value="<?php echo $pago; ?>" />
            	<fieldset>	
				<legend>Pagamento realizado com sucesso!</legend>
			
				<div id="effect" class="ui-corner-all">O que deseja fazer?</div><br />				
				<p align="center"><a href="index.php">Novo Pagamento</a> </p>
				<p align="center"><input name="comprovante" type="submit" id="comprovante" value="Imprimir Comprovante" /></p>
            </form>
		</div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2016, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>