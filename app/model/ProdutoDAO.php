<?php
header("Content-type: text/html; charset=utf-8");
class ProdutoDAO{
    
    private $conn;
    
    public function __construct(){
        $this->conn = Connection::getConn("127.0.0.1", "a6eful", "", "DataBase", 3306);
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
            $st = $this->conn->prepare("SELECT p.title,p.url_imagem, DATE_FORMAT(dt_publicacao,  '%d/%m/%y') , u.nm_Usuario, p.ds_produto FROM Produto as p inner join Usuario as u on p.cd_usuario = u.Cd_Usuario ") or die("1".$conn->error);
            $st->execute() or die("2".$st->error);
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
}
?>