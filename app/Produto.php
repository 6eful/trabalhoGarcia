<?php

interface ProdutoResource{
    function manipular($id);
    function todos();
} 

class ProdutoResourcePOST implements ProdutoResource{
    
   public function manipular($id=0){
        header("Access-Control-Allow-Origin: *");
        $accept = $_SERVER["CONTENT_TYPE"];
        echo $accept;
        // if($accept === "application/json"){
            $json = file_get_contents('php://input');
            $obj = json_decode($json);
            $ndao = new ProdutoDAO();
            $ndao->inserir($obj);
        // }else{
        //     echo "Headers inválidos";
        //     http_response_code(400);
        // }
    }
    
    public function todos(){
        //Todos eh GET e nao POST
        echo "Error";
        http_response_code(405);
    }
    
    public function __call($m, $arg){
        echo "$m nao achado para POST";
        http_response_code(404);
    }
}

class ProdutoResourceGET implements ProdutoResource{
    
    public function manipular($filtro){
        $ndao = new ProdutoDAO();
        echo $ndao->buscar($filtro);
    }
    
    public function meus($id){
        $ndao = new ProdutoDAO();
        echo $ndao->meus($id);
    }
    
    public function todos(){
        //header("Access-Control-Allow-Origin: *");
        $ndao = new ProdutoDAO();
        echo $ndao->listar();
    }
    
    public function __call($m, $arg){
        echo "$m nao achado para GET";
        http_response_code(404);
    }
}

class ProdutoResourceDELETE implements ProdutoResource{
    
    public function manipular($id){
        $ndao = new ProdutoDAO();
        echo $ndao->remover($id);
    }
    
    public function todos(){
        echo "Error";
        http_response_code(405);
    }
    
    public function __call($m, $arg){
        echo "$m nao achado para DELETE";
        http_response_code(404);
    }
}

class ProdutoResourceOPTIONS implements ProdutoResource{
    
    public function __call($m, $arg){
        header("Access-Control-Allow-Origin: *");
        echo "$m nao achado para OPTIONS";
        http_response_code(404);
    }
    
    public function manipular($id=1){
        header("Access-Control-Allow-Origin: *");
        header('Allow: OPTIONS, GET, POST, DELETE, PUT');
        header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');
    }
    
    public function todos(){
        //COLOCAR OS METODOS QUE RETORNAM RESPONSES POSITIVOS (NAO-ERRO)
        header('Allow: OPTIONS, GET, POST, DELETE, PUT');
        header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');
    }
}

?>