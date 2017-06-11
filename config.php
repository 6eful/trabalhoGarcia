<!DOCTYPE html>
    <html>
        <head>
        	<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Configuração de Conta</title>
            <link rel="stylesheet" href="../trabalhoGarcia/normalize/normalize.css">
            <link rel="stylesheet" href="../trabalhoGarcia/css/uikit.min.css">
            <!--<link rel="stylesheet" href="trabalhoGarcia/css/style.css" type="text/css">-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="../trabalhoGarcia/js/uikit.min.js"></script>
            <script src="../trabalhoGarcia/js/uikit-icons.min.js"></script>
            <script type="text/javascript" src="../trabalhoGarcia/ajax.js"></script>
            <style>
				.container{ width: 100%; margin: 0 auto; padding:5px;}
				ul.tabs{ margin: 0px; padding: 0px; list-style: none; float:left; }
				ul.tabs li{ background: none; color: #222; display: block; padding: 10px 15px; cursor: pointer; text-transform:uppercase;}
				ul.tabs li.current{ color: #222; border-bottom: 1px solid red; }
				.tab-content{ display: none;padding:5px; }
				.tab-content.current{ display: inherit;}
				footer {bottom:0; position:absolute;} 
				form label{ text-align:left; display:block;}
				input {box-sizing: border-box;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;outline: none;border: none;border-bottom: 1px solid #ddd;padding-bottom:10px;width:100%;}
				button {background-color: #3b5999;border:none;color: #fff;font-family: 'Dosis','Slabo 27px','Open Sans Condensed', sans-serif;font-size: 18px;padding: 14px 18px;text-decoration: none;text-transform: uppercase;display: block;}
				@media screen and (max-width: 768px) {
				  ul.tabs{ width:100%; }
				  ul.tabs li{ text-align:center;}
				  article{width:100%;}
				  form {width:80%;margin:0 10%;}
				  button {margin-left: 10%;margin-right: 10%;width:80%;}
				  select {width:80%;}
				}
            </style>
            <script type="text/javascript">
                $(document).ready(function(){
					$('ul.tabs li').click(function(){
						var tab_id = $(this).attr('data-tab');
						$('ul.tabs li').removeClass('current');
						$('.tab-content').removeClass('current');
						$(this).addClass('current');
						$("#"+tab_id).addClass('current');
					})
				})
            </script>
        </head>
        <body>
        	<header uk-grid>
        		<!-- header com logo da pagina e voltar para a pagina de produtos-->
        		<picture class="uk-width-1@s uk-width-1@m uk-width-1@l">
                        <img src="../trabalhoGarcia/img/logo.png" alt=""></img>
                        <p style="text-align:right;">
                			<a href="/feed">Voltar para o Inicio</a>
                		</p>
                </picture>
        	</header>
        	<main uk-grid>
        		<aside class="uk-width-1-4@l uk-visible@l"></aside>
        		<nav class="uk-width-1-4@l uk-width-1-2@m uk-width-1@s">
        			<div class="container">
						<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1">Configuração</li>
							<li class="tab-link" data-tab="tab-2">Produtos</li>
							<li class="tab-link" data-tab="tab-3">Inserir Produtos</li>
						</ul>
					</div>
        		</nav>
        		<section class="uk-width-2-4@l uk-width-1-2@m uk-width-1@s">
        			<div class="container">
	        			<article id="tab-1" class="tab-content current">
						
						</article>
						<article id="tab-2" class="tab-content">
							<button id="meus" onclick="meusProdutos(<?php 
							if (!isset($_SESSION)) session_start();
                		echo $_SESSION['UsuarioID'];?>)">Visualizar meus Produtos</button>
								<table class="uk-table uk-table-responsive uk-table-divider">
								    <thead>
								        <tr>
								            <th>Codigo</th>
								            <th>Nome</th>
								            <th>Categoria</th>
								            <th>Descrição</th>
								        </tr>
								    </thead>
								    <tbody id="body">
								        
								    </tbody>
								</table>
						</article>
						<article id="tab-3" class="tab-content">
							<div class="uk-width-1@l">
								<form name="new">
									<label for="nomeProduto">Nome do produto:</label>
									<input type="text" id="nomeProduto" name="nomeProduto" value="">
									
									<label for="categoriaProduto">Categoria: </label>
									<select id="categoriaProduto" name="categoriaProduto">
										<option value="livro">Livro</option>
										<option value="uniforme">Uniforme</option>
										<option value="materialEscolar">Material Escolar</option>
									</select>
									<fieldset>
										<legend>Descrição</legend>
										<label for ="descricaoProduto"></label>
										Descrição do Produto:<br>
										<textarea cols=35 id="descricaoProduto" rows="auto" name="descricaoProduto" maxlength="140" wrap="hard"></textarea>
									</fieldset>
									<label for="urlProdutoEditar">Imagem: </label>
									<input type="file" id="urlProdutoEditar" name="urlProdutoEditar" accept="image/jpg,image/png,image/jpeg">
								</form>
								<button id="criar" onclick="CriarProduto()">Salvar produto e anunciar</button>
							</div>
							<div class="uk-width-1@l">
								
							</div>
						</article>
					</div>
        		</section>
        	</main>
        	<footer>
        		<p class="uk-width-1@s uk-width-1@m uk-width-1@l footer">&copy; Economia Colaborativa</p>
        	</footer>
        </body>
    </html>