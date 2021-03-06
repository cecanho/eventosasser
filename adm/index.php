<!DOCTYPE html >
<html lang="pt-BR">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Asser Eventos</title>
    <!-- adicionado o suporte para o jquery e thema redmond -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- outros suporte a css da p�gina -->
    <link rel="stylesheet" href="../html/css/menu-styles-v1.0.0.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">
    <!-- outros scripts para o menu-->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/asser-commum.js"></script>
    <script src="../html/scripts/notify.min.js"></script>

</head>
<body>
<div id="corpo">

    <div id="cabecalho">
    </div>

    <br />

    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='../'>Voltar</a></li>
        </ul>
    </div>

    <div id="mmenu"> &nbsp;</div>
    <div id="mmenubar"> &nbsp;</div>
    <div id="mmenusubbar"> &nbsp;</div>
    <div id="mmenusubsubbar"> &nbsp;</div>

    <div style="padding: 50px; margin-bottom: 10px; height: 100px;">
        <form id="register-form"
              name="register-form"
              method="post" action="a_login.php"
              novalidate="novalidate">

            <fieldset style="width: 65%">
                <div>
                    <label for="funcao">Tipo de função</label>
                    <select id="funcao" name="funcao">
                        <option value="professor">Professor Avaliador</option>
                        <option value="secretaria">Secretaria</option>
                        <!--
                            <option value="administrativo">Administrativo</option>
                        -->
                    </select>
                </div>

                <div>
                    <label for="login">Usuário</label><input type="text" id="login" name="login" size="30" maxlength="30" value=""/>
                </div>

                <div>
                    <label for="password">Senha</label><input type="password" id="password" name="password" value=""/>
                </div>

                <div class="text-align-center-btn-access">
                    <input name="acessar" type="submit" id="acessar" value="Acessar" class="button button-center ui-button ui-widget ui-state-default ui-corner-all" role="button">
                </div>
            </fieldset>
        </form>

    </div>

    <br/>
    <br/>
    <div id="rodape">
        <p>Campus Rio Claro: Rua 7, 1193 - Centro - CEP 13500-200 - Fone/ Fax: (19) 3523-2001 © 2006-2013, ASSER - Todos os direitos reservados  <br/> Desenvolvido pelo <a href="http://www.asser.edu.br/rioclaro/graduacao/sistemas/" target="_new"> Curso de Sistemas de Informação </a> </p>
    </div>
</div>
</body>
</html>

