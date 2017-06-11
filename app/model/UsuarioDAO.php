<?php

class UsuarioDAO{
    
    private $conn;
    public function __construct(){
        $this->conn = Connection::getConn("127.0.0.1", "a6eful", "", "DataBase", 3306);
    }
    
    public function inserir($obj){
        $senha = $obj->senha;
        $custo = '11';
        $salt = 'Cg6f1aePArKlKUomE0F0aJ';
        $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
        $stmt = $this->conn->prepare("INSERT INTO Usuario(nm_Usuario, ds_Email, ds_Senha, cd_Telefone) VALUES(?,?,?,?)") or die("2".$conn->error);
        $stmt->bind_param("sssi",$obj->nome,$obj->email,$hash,$obj->telefone) or die("3".$stmt->error);
        $stmt->execute() or die("4".$stmt->error);
    }
    
    public function remover($obj){
        var_dump($obj);
        $st = $this->conn->prepare("DELETE FROM Usuario WHERE ds_Email = ?") or die("1".$conn->error);
        $st->bind_param("s",$obj->email) or die("2".$st->error);
        $st->execute() or die("3".$st->error);
    }
}

?>