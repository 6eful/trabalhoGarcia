<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Registrar-se</title>
            <link rel="stylesheet" href="trabalhoGarcia/normalize/normalize.css">
            <link rel="stylesheet" href="trabalhoGarcia/css/uikit.min.css">
            <link rel="stylesheet" href="trabalhoGarcia/css/style.css" type="text/css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="trabalhoGarcia/js/uikit.min.js"></script>
            <script src="trabalhoGarcia/js/uikit-icons.min.js"></script>
            <script type="text/javascript" src="trabalhoGarcia/js/p2p.js"></script>
            <script type="text/javascript" src="trabalhoGarcia/ajax.js"></script>
        </head>
        <body>
            <div class="uk-text-center" uk-grid>
                <header class="uk-width-1@s uk-width-1@m uk-width-1-2@l">
                    <picture>
                        <img src="trabalhoGarcia/img/logo.png" alt=""></img>
                    </picture>
                </header>
                <div class="uk-visible@l uk-width-1-2@l back">
                    
                </div>
            </div>
            
            <div uk-grid style="margin-top:0px;min-height:747px;">
                <aside class="uk-visible@l uk-width-1-2@l">
                    <h1>Bem-Vindo</h1>
                    <h4>Um maneira de conectar as pessoas.</h4>
                    <blockquote>
                        <p>Doar é um dos elos capazes de fortalecer a corrente do bem. Todo mundo pode dar algo de si e ganhar muito com isso. Incentive gestos solidários.</p>
                    </blockquote>
                    <picture>
                        <img src="trabalhoGarcia/img/backgroundCadastro.png" alt="A economia colaborativa conectando as coisas">
                    </picture>
                </aside>
                <main class="uk-width-1@s uk-width-1@m uk-width-1-2@l back">
                    <h2>Registrar-se</h2>
                    <form name="cadastro">
                        
                        <label for="nomeUsuario">Nome de Usuário</label>
                        <input class="nomeUsuario" id="nomeUsuario" type="text" name="nomeUsuario" placeholder="Digite um nome de usuário" accesskey="0" required autocomplete="off">
                        
                        <label for="emailUsuario">Email</label>
                        <input class="emailUsuario" id="emailUsuario" type="email" name="emailUsuario" placeholder="Digite seu Email" accesskey="1" required autocomplete="off">

                        <label for="telefoneUsuario">Telefone</label>
                        <input class="telefoneUsuario" id="telefoneUsuario" type="tel" name="telefoneUsuario" placeholder="Digite seu Telefone de Contato" accesskey="2" required autocomplete="off">
                        
                        <label for="senhaUsuario">Senha</label>
                        <input class="senhaUsuario" id="senhaUsuario" type="password" name="senhaUsuario" placeholder="Digite a senha" accesskey="3" required>
                        
                        <label for="CsenhaUsuario">Repetir Senha</label>
                        <input class="CsenhaUsuario" id="CsenhaUsuario" type="password" name="CsenhaUsuario" placeholder="Repetir a senha" accesskey="4" required>
                        
                        <p>Ao clicar em Cadastra-se, você concorda com nossos Termos e que leu nossa Política de Dados</p>
                        
                    </form>
                     <button id="enviar">Finalizar cadastro</button>
                    <p>Já tem conta? Faça login</p>
                    <a href="/login"><button id="clogar">ENTRE</button></a>
                </main>
            </div>
            <footer class="" uk-grid>
                    <p class="uk-width-1@s uk-width-1@m uk-width-1@l footer">&copy; Economia Colaborativa</p>
            </footer>
        </body>
    </html>