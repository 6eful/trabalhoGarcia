function cadastrarUsuario() {
    var varNome = document.forms.cadastro.nomeUsuario.value;
    var varEmail = document.forms.cadastro.emailUsuario.value;
    var varSenha = document.forms.cadastro.telefoneUsuario.value;
    var varTelefone = document.forms.cadastro.senhaUsuario.value;
    var data = {nome:varNome,email:varEmail,senha:varSenha,telefone:varTelefone};
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "https://php-a6eful.c9users.io/usuario/manipular");
    //xhr.setRequestHeader("content-type","application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE &&  xhr.status == 200) {
            //alert("Funcionou");
        }
    }
    xhr.send(JSON.stringify(data));
}

function meusProdutos(id){
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "https://php-a6eful.c9users.io/produto/meus/2");
    xhr.responseType = "application/json";
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE &&  xhr.status == 200) {
            var resposta = xhr.responseText;
            var obj = JSON.parse(resposta);
            montarPagina(obj);
        }
    }
    xhr.send();
}

function montarPagina(roxo){
    var verde = roxo["resp"];
    var tbody = document.getElementById("body");
    verde.forEach(function(vermelho){
        var tr = document.createElement("tr");
        var tdId = document.createElement("td");
        var tdNome = document.createElement("td");
        var tdCategoria = document.createElement("td");
        var tdDescricao = document.createElement("td");
        tdId.innerHTML = vermelho["id"];
        tdNome.innerHTML = vermelho["nome"];
        tdCategoria.innerHTML = vermelho["categoria"];
        tdDescricao.innerHTML = vermelho["descricao"];
        tr.appendChild(tdId);
        tr.appendChild(tdNome);
        tr.appendChild(tdCategoria);
        tr.appendChild(tdDescricao);
        tbody.appendChild(tr);
    });
}

function CriarProduto(){
    var varNome = document.forms.new.nomeProduto.value;
    var varCat = document.forms.new.categoriaProduto.value;
    var varDes = document.forms.new.descricaoProduto.value;
    var data = {nome:varNome,cat:varCat,descricao:varDes};
    const xhr = new XMLHttpRequest();
    xhr.open("POST","https://php-a6eful.c9users.io/produto/manipular")
    xhr.onreadystatechange = function(){
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
            
        }
    }
    xhr.send(JSON.stringify(data));
    document.forms.new.nomeProduto.value = "";
    document.forms.new.descricaoProduto.value = "";
    
}
function logar(){
    var vnome = document.forms.form.emailUsuario.value;
    var vsenha = document.forms.form.senhaUsuario.value;
    var data = {nome:vnome,senha:vsenha};
    const xhr = new XMLHttpRequest();
    xhr.open("POST","https://php-a6eful.c9users.io/usuario/autenticar");
    xhr.onreadystatechange = function(){
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200){
            
        }
    }
    xhr.send(JSON.stringify(data));
    //window.location.replace("https://php-a6eful.c9users.io/feed");
}
function viewAll(roxo,x){
    var verde = roxo["resp"];
    var i = 1;
    var tbody = document.getElementById("tab-"+x);
    verde.forEach(function(vermelho){
        var article = document.createElement("article");
        var picture = document.createElement("picture");
        var div1 = document.createElement("div");
        div1.className = "uk-inline-clip uk-transition-toggle uk-light";
        var a1 = document.createElement("a");
        a1.setAttribute("href","#t"+i);
        a1.setAttribute("uk-toggle","");
        var img1 = document.createElement("img");
        img1.setAttribute("src","trabalhoGarcia/img/produtos/"+vermelho['url']+".png");
        img1.setAttribute("alt",vermelho['categoria']);
        a1.appendChild(img1);
        var div2 = document.createElement("div");
        div2.className = "uk-position-center";
        var span1 = document.createElement("span");
        span1.className = "uk-transition-fade";
        span1.setAttribute("uk-icon","icon: plus; ratio: 2");
        div2.appendChild(span1);
        div1.appendChild(div2);
        div1.appendChild(a1);
        picture.appendChild(div1);
        article.appendChild(picture);
        
        //MODAL
        var div3 = document.createElement("div");
        div3.setAttribute("id","t"+i);
        div3.setAttribute("uk-modal","center: true");
        var div4 = document.createElement("div");
        div4.className="uk-modal-dialog";
        var b1 = document.createElement("button");
        b1.setAttribute("class","uk-modal-close-default");
        b1.setAttribute("type","button");
        b1.setAttribute("uk-close","");
        div4.appendChild(b1);
        var div5 = document.createElement("div");
        div5.className = "uk-modal-header";
        var h2_1 = document.createElement("h2");
        h2_1.className ="uk-modal-title";
        h2_1.innerHTML = vermelho["nome"];
        div5.appendChild(h2_1);
        div4.appendChild(div5);
        div3.appendChild(div4);
        var div6 = document.createElement("div");
        div6.className = "view";
        var pc1 = document.createElement("picture");
        var img2 = document.createElement("img");
        img2.setAttribute("src","trabalhoGarcia/img/produtos/"+vermelho['url']+".png")
        img2.setAttribute("alt",vermelho['categoria']);
        pc1.appendChild(img2);
        div6.appendChild(pc1);
        div4.appendChild(div6);
        var p1 = document.createElement("p");
        p1.className = "uk-modal-body";
        p1.setAttribute("Display","block");
        var h4_1 = document.createElement("h4");
        h4_1.innerHTML = "Data de Publicação: " + vermelho["data"];
        h4_1.setAttribute("style","display:block")
        var h4_2 = document.createElement("h4");
        h4_2.innerHTML = "Publicado por: " + vermelho["por"];
        var h4_3 = document.createElement("h4");
        h4_3.innerHTML = "Descrição: ";
        var p2 = document.createElement("p");
        p2.innerHTML = vermelho["descricao"];
        var h4_4 = document.createElement("h4");
        h4_4.innerHTML = "Estado do Produto: Conservado";
        p1.appendChild(h4_1);
        p1.appendChild(h4_2);
        p1.appendChild(h4_3);
        p1.appendChild(p2);
        p1.appendChild(h4_4);
        div4.appendChild(p1);
        var nav = document.createElement("nav");
        nav.className = "uk-modal-footer uk-text-right";
        var b2 = document.createElement("button");
        b2.className = "uk-button uk-button-default uk-modal-close";
        b2.setAttribute("type","button");
        b2.innerHTML = "Fechar";
        nav.appendChild(b2);
        div4.appendChild(nav);
        div3.appendChild(div4);
        article.appendChild(div3);
        tbody.appendChild(article);
        i++;
    });
}
function mostrarTodos(){
    var tbody = document.getElementById("tab-1");
    tbody.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "https://php-a6eful.c9users.io/produto/todos");
    xhr.responseType = "application/json";
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE &&  xhr.status == 200) {
            var resposta = xhr.responseText;
            var obj = JSON.parse(resposta);
            viewAll(obj,1);
        }
    }
    xhr.send();
}
function mostrarLivro(){
    var tbody = document.getElementById("tab-2");
    tbody.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "https://php-a6eful.c9users.io/produto/manipular/livro");
    xhr.responseType = "application/json";
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE &&  xhr.status == 200) {
            var resposta = xhr.responseText;
            var obj = JSON.parse(resposta);
            viewAll(obj,2);
        }
    }
    xhr.send();
}
function mostrarUniforme(){
    var tbody = document.getElementById("tab-3");
    tbody.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "https://php-a6eful.c9users.io/produto/manipular/uniforme");
    xhr.responseType = "application/json";
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE &&  xhr.status == 200) {
            var resposta = xhr.responseText;
            var obj = JSON.parse(resposta);
            viewAll(obj,3);
        }
    }
    xhr.send();
}
function mostrarMaterialEscolar(){
    var tbody = document.getElementById("tab-4");
    tbody.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "https://php-a6eful.c9users.io/produto/manipular/materialescolar");
    xhr.responseType = "application/json";
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE &&  xhr.status == 200) {
            var resposta = xhr.responseText;
            var obj = JSON.parse(resposta);
            viewAll(obj,4);
        }
    }
    xhr.send();
}
function removerProduto(){
    const xhr = new XMLHttpRequest();
    var varId = document.forms.deletar.deletar.value;
    var url = "https://php-a6eful.c9users.io/produto/manipular/"+varId;
    alert(url);
    xhr.open("DELETE",url);
    // xhr.responseType = "application/json";
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
        }
    }
    xhr.send();
    document.forms.deletar.deletar.value = "";
}
function apagarConta(){
    const xhr = new XMLHttpRequest();
    var varEmail = document.forms.conta.removeConta.value;
    var data = {email:varEmail};
    alert(data['email']);
    xhr.open("DELETE","https://php-a6eful.c9users.io/usuario/manipular/1");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            
        }
    }
    xhr.send(JSON.stringify(data));
    document.forms.conta.removeConta.value = "";
}
function main(){
    document.getElementById("enviar").addEventListener("click",function(){
        cadastrarUsuario();
    });
    document.getElementById("logout").addEventListener("click", function(){
        sair();
    });
}

window.onload = main;