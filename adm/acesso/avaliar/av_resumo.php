<?php $config = require '../../../cfg/config.php'; ?>
<?php require_once('../../../utils/common.php'); ?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<title>Asser Eventos - Cadastro realizado com sucesso</title>
<!-- adicionado o suporte para o jquery e thema redmond -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- outros suporte a css da página -->
<link rel="stylesheet" href="../../../css/menu-styles.css" type="text/css">
<link rel="stylesheet" href="../../../css/estilo.css" type="text/css">

<!-- outros scripts para o menu-->
<script src="../../../scripts/asser-main-menu.js"></script>
<script src="../../../scripts/asser-commum.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
</head>

<script>
  $(function() {
    $("#register-form").validate({
        rules: {
            comentarios: "required",
            tipo: "required",
            email: {
                required: true,
                email: true
            },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  </script>
  
<body>
	<div id="corpo">
    	
		<div id="cabecalho">
        </div>
        
        <br />
        
          <div id='cssmenu'>
              <ul>
                  <li><a href='../avaliar/index.php'>Voltar</a></li>
              </ul>
            </div>

            <div id="mmenu"> &nbsp;</div>
            <div id="mmenubar"> &nbsp;</div>
            <div id="mmenusubbar"> &nbsp;</div>
            <div id="mmenusubsubbar"> &nbsp;</div>
            <br /> 
        
        
		<form id="register-form" 
                  name="register-form" method="post" 
                  action="confirma.php"  novalidate="novalidate">
          <fieldset>	
			<legend>Avaliar Resumo</legend>
			<?php
				$id = $_POST['id'];
				try{
                        $link = new PDO($config['dsn'], $config['dbuser'], $config['dbpass']);
						$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
						$sql = "SELECT * FROM evento WHERE id='$id'";
								
						foreach($link->query($sql) as $row){
							echo "<p align='center'><b>".$row['id']."</b></p>";
							echo "<p align='center'><b>".$row['titulo']."</b></p>";

							if( !isEmpty($row['autores']) ) {
                                echo "<p align='right'>" . $row['autores'] . "</p>";
                            }else {
                                echo "<p align='right'>" . $row['nome']. " - " . $row['email'] . "</p>";
                            }

                            echo "<p align='right'>".$row['curso']."</p>";
							echo "<p align='right'>Orientador(a): ".$row['orientador']."</p>";
							echo "<p align='justify'>".$row['resumo']."</p>";
							echo "<p align='left'>".$row['keyword']."</p>";
						}
					
				}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
				}
			?>
				<div>
                            <label>Comentários</label>
                            <textArea name="comentarios" rows="8" cols="80" value="<?php $row['comentarios'];?>" /></textArea>
                    </div>
					
				<div>
                            <label>Status do trabalho</label>
                            <select id="status" name="status"  />
							<option value="1">Aprovado</option>
							<option value="2">Reenvio</option>
							<option value="3">Reprovado</option>
						</select>
                    </div>
					
			     <input type="hidden" name="id" value="<?php echo $id; ?>" />			
                	
					<div class="button">
                           <input name="cadastrar" style="width:30%;" type="submit" id="cadastrar" value="Enviar" />
                           <input name="limpar" style="width:30%;" type="reset" id="limpar" value="Limpar" />
					</div>					
                </fieldset>
            </form>        
        <br />        
        <div id="rodape">
    	<p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  Visualização: 800 x 600 - Desenvolvido pelo Curso de Sistemas de Informação. </p>
    	</div>
    </div>
</body>
</html>