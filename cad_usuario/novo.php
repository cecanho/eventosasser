<?php
require_once("../cfg/Session.php");
$session = new Session("EventosAsser2016");
require '..\repositorio\models\Curso.php';
require '..\repositorio\facade\EventosAsserFacade.php';
$cursoRepository = EventosAsserFacade::createCursoRepository();


header("Content-Type: text/html; charset=UTF-8", true);

?>

<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>
    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- outros suporte a css da página -->
    <link rel="stylesheet" href="../css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../scripts/asser-main-menu.js"></script>
    <script src="../scripts/asser-commum.js"></script>
    <script>
        $(function() {
            $("#register-form").validate({
                rules: {
                    nome: "required",
                    curso: "required",
                    tipo: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    senha: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    nome: "Escreva o seu nome completo",
                    email: "Escreva seu endereço de email corretamente",
                    tipo: "Escolha um tipo de participação",
                    senha: {
                        required: "Por favor, digite uma senha",
                        minlength: "Sua senha deve ter mais de 5 caracteres"
                    },
                    resenha: {
                        required: "Por favor, digite uma senha",
                        minlength: "Sua senha deve ter mais de 5 caracteres"
                    }
                },

                submitHandler: function(form) {
                    senha = document.getElementById('senha');
                    senhaRepetida = document.getElementById('resenha');
                    if (senha != senhaRepetida){
                        alert("Repita a senha corretamente");
                        document.getElementById('resenha').focus();
                        return false;
                        form.submit();
                    }
                });
        });
    </script>
</head>
<body>
<div id="corpo">

    <div id="cabecalho">
    </div>

    <br />

    <div id='cssmenu'>
        <ul>
            <li><a href='../index.html'>Evento</a></li>
            <li class='active'><a href='../index.html'>Inscrição no evento</a></li>
            <li><a href='../programa.html'>Programação</a></li>
            <li> <a href='../anais'>Edições<br>Anteriores</a></li>
            <li><a href='../contato'>Contato</a></li>
            <li><a href='../creditos.html'>Créditos</a></li>
        </ul>
    </div>

    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>
    <br />

    <br />

    <div id="texto">
        <form id="register-form"
              name="register-form" method="post"
              action="inscr.php"  novalidate="novalidate">

            <fieldset>
                <legend>Inscrição no Evento</legend>
                <div>
                    <label> Nome:</label>
                    <input type="text" id="nome" name="nome" size="50" maxlength="65"  />
                </div>

                <div>
                    <label>E-mail:</label>
                    <input type="text" id="email" name="email" size="50" maxlength="65"/>
                </div>

                <div>
                    <label>Senha:</label>
                    <input type="password" id="senha" name="senha" size="50" maxlength="8" />
                </div>

                <div>
                    <label>Confirme sua Senha:</label>
                    <input type="password" id="resenha" name="resenha" size="50" maxlength="8" />
                </div>

                <div>
                    <label>Curso:</label>
                    <select id="curso" name="curso">
                        <?php
                        $str = "";

                        foreach($cursoRepository->findAll() as $row) {
                            $str .= "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                        }
                        echo $str;
                        ?>
                    </select>
                </div>

            </fieldset>
            <div class="text-align-center">
                <input class="button button-center" name="cadastrar" type="submit" id="cadastrar" value="Enviar" />
                <input class="button button-center" name="limpar" type="reset" id="limpar" value="Limpar" />
            </div>
        </form>
    </div>

    <br />
    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
    </div>
</div>
</body>
</html>