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
        $stmt->bind_param("ssss",$obj->nome,$obj->email,$hash,$obj->telefone) or die("3".$stmt->error);
        $stmt->execute() or die("4".$stmt->error);
    }
    public function autenticarUsuario($obj){
        $senha = $obj->senha;
        $custo = '11';
        $salt = 'Cg6f1aePArKlKUomE0F0aJ';
        $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
        echo $hash;
        $st = $this->conn->prepare("SELECT Cd_Usuario, nm_Usuario FROM Usuario where ds_Email = ? and ds_Senha = ?") or die("1".$conn->error);
        $st->bind_param("ss",$obj->nome,$hash) or die("2".$st->error);
        $st->execute() or die("3".$st->error);
        $st->bind_result($id, $nomeLogin);
        // $qt_registro = 0;
        while ($st->fetch()) {
            $qt_registro++;
            $registros['id'] = $id;
            $registros['login'] = $nomeLogin;
        }
        if ($qt_registro != 1){
            //echo "<script>window.location.href='/login';</script>";
        }else{
            if (!isset($_SESSION)) session_start();
            $_SESSION['UsuarioID'] = $registros['id'];
            $_SESSION['Username'] = $registros['login'];
            $_SESSION['Logado'] = true;
            // $_SESSION['qt'] = $qt_registro;
        }
    }
    public function sair(){
        session_start();
        session_destroy();
    }
    
    public function remover($obj){
        $st = $this->conn->prepare("DELETE FROM Usuario WHERE ds_Email = ?") or die("1".$conn->error);
        $st->bind_param("s",$obj->email) or die("2".$st->error);
        $st->execute() or die("3".$st->error);
    }
}

?>