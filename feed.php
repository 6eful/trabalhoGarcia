<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Feed</title>
            <link rel="stylesheet" href="trabalhoGarcia/normalize/normalize.css">
            <link rel="stylesheet" href="trabalhoGarcia/css/uikit.min.css">
            <link rel="stylesheet" href="trabalhoGarcia/css/style.css" type="text/css">
            <link rel="stylesheet" href="trabalhoGarcia/css/style2.css" type="text/css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="trabalhoGarcia/js/uikit.min.js"></script>
            <script src="trabalhoGarcia/js/uikit-icons.min.js"></script>
            <script type="text/javascript" src="trabalhoGarcia/js/p2p.js"></script>
            <script type="text/javascript" src="trabalhoGarcia/ajax.js"></script>
            <style>
                ul.tabs{ margin: 0px;padding: 0px;list-style: none;}
        		ul.tabs li{background: none;color: #222;display: inline-block;padding: 10px 15px;cursor: pointer;}
        		ul.tabs li.current{border-bottom: 1px solid black;color: #222;}
        		.tab-content{display: none;color:black;padding: 15px;}
                .tab-content.current{display: inherit;}
        		nav.toggle { width:100%; }
        		ul.tabs { margin: 0 auto; }
        		main.view { width: 80%; }
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
            <div class="uk-text-center" uk-grid>
                <header class="uk-width-1@s uk-width-1@m uk-width-1@l">
                    <picture>
                        <img src="trabalhoGarcia/img/logo.png" alt=""></img>
                    </picture>
                </header>
            </div>
            <nav uk-grid class="uk-width-1@s uk-width-1@m uk-width-1@l toggle">
                <ul class="tabs">
            		<li class="tab-link" data-tab="tab-1" id="todos" onclick="mostrarTodos()">TODOS</li>
            		<li class="tab-link" data-tab="tab-2" id="Livro" onclick="mostrarLivro()">LIVROS</li>
            		<li class="tab-link" data-tab="tab-3" id="Uniforme" onclick="mostrarUniforme()">UNIFORMES</li>
            		<li class="tab-link" data-tab="tab-4" id="MaterialEscolar" onclick="mostrarMaterialEscolar()">MATERIAL ESCOLAR</li>
            	</ul>
            </nav>
            <main uk-grid class="uk-width-1@s uk-width-1@m uk-width-1@l view" style="margin-left: 0px;margin:0 auto;">
                <section id="tab-1" class="tab-content">1</section>
	            <section id="tab-2" class="tab-content">2</section>
	            <section id="tab-3" class="tab-content">3</section>
	            <section id="tab-4" class="tab-content">4</section>
            </main>
            <footer class="" uk-grid>
                    <p class="uk-width-1@s uk-width-1@m uk-width-1@l footer">&copy; Economia Colaborativa</p>
            </footer>
        </body>
    </html>