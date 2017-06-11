<?php
interface UsuarioResource{
    function manipular($id);
    function todos();
} 

class UsuarioResourcePOST implements UsuarioResource{
    
   public function manipular($id=0){
        header("Access-Control-Allow-Origin: *");
        $accept = $_SERVER["CONTENT_TYPE"];
        echo $accept;
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $ndao = new UsuarioDAO();
        $ndao->inserir($obj);
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

class UsuarioResourceGET implements UsuarioResource{
    
    public function manipular($id=1){
        $ndao = new UsuarioDAO();
        echo $ndao->getNome($id);
    }
    
    public function todos(){
        header("Access-Control-Allow-Origin: *");
        $ndao = new UsuarioDAO();
        $ndao->listar();
    }
    
    public function __call($m, $arg){
        echo "$m nao achado para GET";
        http_response_code(404);
    }
}

class UsuarioResourceOPTIONS implements UsuarioResource{
    
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