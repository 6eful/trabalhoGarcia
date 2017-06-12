<?php
header("Content-type: text/html; charset=utf-8");
class ProdutoDAO{
    
    private $conn;
    
    public function __construct(){
        $this->conn = Connection::getConn("127.0.0.1", "a6eful", "", "DataBase", 3306);
    }
    
    public function inserir($id,$obj){
        echo $id;
        $stmt = $this->conn->prepare("INSERT INTO Produto(title,nm_categoria, ds_produto, dt_publicacao, cd_usuario) VALUES(?,?,?,?,?)") or die("2".$conn->error);
        $stmt->bind_param("sssdi",$obj->nome,$obj->cat,$obj->descricao,date('Y-m-d h:i:s'),$id) or die("3".$stmt->error);
        $stmt->execute() or die("4".$stmt->error);
    }
    public function meus($id){
        $st = $this->conn->prepare("SELECT p.cd_Produto, p.title, p.nm_categoria, p.ds_produto FROM Produto as p inner join Usuario as u on p.cd_usuario = u.Cd_Usuario and p.cd_Usuario = ?") or die("1".$conn->error);
            $st->bind_param("i",$id) or die("2".$st->error);
            $st->execute() or die("3".$filtro);
            $st->bind_result($col0,$col1,$col2,$col4);
            $arrMaior = array();
            $arrMeio = array();
            $novo;
            while($st->fetch()){
                $arrMeio[] = array(
                                    "id"      =>  $col0,
                                    "nome"       =>  $col1,
                                    "categoria"      =>  $col2,
                                    "descricao"       =>  $col4);
            }
            $arrMaior["resp"] = $arrMeio;
            echo json_encode($arrMaior);
    }
    
    public function remover($id){
        $st = $this->conn->prepare("DELETE FROM Produto WHERE cd_Produto = ?") or die("2".$conn->error);
        $st->bind_param("i",$id) or die("3".$st->error);
        $st->execute() or die("4".$st->error);
    }
    
    public function buscar($filtro){
            $st = $this->conn->prepare("SELECT p.title,p.url_imagem, DATE_FORMAT(dt_publicacao,  '%d/%m/%y') , u.nm_Usuario, p.ds_produto FROM Produto as p inner join Usuario as u on p.cd_usuario = u.Cd_Usuario and nm_categoria = ?") or die("1".$conn->error);
            $st->bind_param("s",$filtro) or die("2".$st->error);
            $st->execute() or die("3".$filtro);
            $st->bind_result($col0,$col1,$col2,$col4,$col5);
            $arrMaior = array();
            $arrMeio = array();
            $novo;
            while($st->fetch()){
                $arrMeio[] = array(
                                    "nome"      =>  $col0,
                                    "url"       =>  $col1,
                                    "data"      =>  $col2,
                                    "por"       =>  $col4,
                                    "descricao" =>  $col5);
            }
            $arrMaior["resp"] = $arrMeio;
            echo json_encode($arrMaior);
    }
    public function listar(){
            $st = $this->conn->prepare("SELECT p.title,p.url_imagem, DATE_FORMAT(dt_publicacao,  '%d/%m/%y') , u.nm_Usuario, p.ds_produto, u.cd_Telefone FROM Produto as p inner join Usuario as u on p.cd_usuario = u.Cd_Usuario ") or die("1".$conn->error);
            $st->execute() or die("2".$st->error);
            $st->bind_result($col0,$col1,$col2,$col4,$col5,$col6);
            $arrMaior = array();
            $arrMeio = array();
            $novo;
            while($st->fetch()){
                $arrMeio[] = array(
                                    "nome"      =>  $col0,
                                    "url"       =>  $col1,
                                    "data"      =>  $col2,
                                    "por"       =>  $col4,
                                    "descricao" =>  $col5,
                                    "contato"   =>  $col6);
            }
            $arrMaior["resp"] = $arrMeio;
            echo json_encode($arrMaior);
    }
}
?>