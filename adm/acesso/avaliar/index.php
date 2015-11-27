<?php session_start();
    $user = $_SESSION['email'];
    if($user==null){
       header('Location: ../../../index.html');
       die();
    }

?>
<?php $config = require '../../../cfg/config.php'; ?>
<?php include_once('../../../utils/common.php'); ?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>

<meta charset="utf-8"/>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="cache-control" content="no-store" />
<link rel="shortcut icon" href="../../../favicon.ico">

<title>Asser Eventos</title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- adicionado o suporte para o bootstrap padrão  -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

<script src="../../../scripts/asser-main-menu.js"></script>
<script src="../../../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>



<link rel="stylesheet" href="../../../scripts/tablesorter/blue/style.css" type="text/css" id="" media="print, projection, screen">
<script type="text/javascript" src="../../../scripts/tablesorter/jquery.tablesorter.js"></script>

<script type="application/javascript">
    $(document).ready(function()
        {
            $("#myTable").tablesorter();
        }
    );

</script>


    <style type="text/css">
        #listar-coteudo{
            margin: 5px 5px 5px 50px;
        }

        table{
            width: 95%;
        }

        table caption{
            font-size: 14px;
            text-align: center;
        }

        table, th, td{
            border: 1px solid #CBCDDD;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        tr:nth-child(even){
            background-color: #eee;
        }

        tr:nth-child(odd){
            background-color: #fff;
        }

        th{
            background-color: #1862A1;
            color: white;
        }

        .itemStatus {
            text-align: center;
        }


        fieldset{
            width: auto;
            height: auto;
            margin: 10px;
        }

        table.tablesorter thead tr th{
            background-color: #1862A1;
        }



    </style>

</head>

<body>
	<div id="corpo">
    	
        <div id="cabecalho">
        </div>
        
        <br />

        <!-- inicio do menu da aplicacao -->
          <div id='cssmenu'>
                <ul>
                   <li><a href='../../../index.html'>Sair</a></li>
                </ul>
            </div>

            <!-- adiciona o suporte ao separador gradiente -->
            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
        
        <div id="listar-coteudo">
    		<form id="register-form" name="register-form" method="post" action="av_resumo.php"  >
                    <div>
                        <p align="center">
                            <b>Digite o ID do resumo a avaliar</b>
                        </p>

                        <p align="center">
                            <input type="text" name="id" size="19" maxlength="20" />
                            <input name="avaliar" type="submit" id="avaliar" value="Avaliar" />
                        </p>
                    </div>


				<?php
				// Estabelecendo a conexão com o banco de dados
				try{
                    $link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = 'SELECT DISTINCT  * FROM evento WHERE titulo <> \'\' AND  titulo IS NOT NULL AND
                                                                 nome   <> \'\' AND  nome IS NOT NULL AND
                                                                 curso  <> \'\' AND  curso IS NOT NULL
                                                           ORDER BY curso';

					echo '<table id="myTable" class="tablesorter" >';
                    echo '<caption><strong>Lista de resumos submetidos para avaliação</strong> <br/> clique nas colunas para ordenar</caption>';
                    echo '<thead>';
					echo '<tr><th>ID</th><th>TITULO</th><th>ALUNO</th><th>CURSO</th><th>STATUS</th></tr>';
                    echo '</thead>';
					echo '<tbody>';
                        foreach($link->query($sql) as $row){
                            echo "<tr><td>".$row['id']."</td>";
                            echo '</td><td>'.$row['titulo'].'</td><td>'.$row['nome'].'</td><td>'.$row['curso'].'</td><td class=\'itemStatus\'>'.buildSimpleRowStatus($row['status']).'</td></tr>';
                        }
                    echo '</tbody>';
					echo '</table>';
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
				?>				
                
				<br />
            </form>
        </div>
        
        <br />
        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>
