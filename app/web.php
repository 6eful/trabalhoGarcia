<?php

require_once "model/UsuarioDAO.php";
require_once "model/ProdutoDAO.php";
require_once "Produto.php";
require_once "Usuario.php";
require_once "model/Fabrica.php";

$classe = $_GET["classe"];//user
$met = $_GET["met"];//manipular
$arg0 = $_GET["arg0"];
$httpM = $_SERVER["REQUEST_METHOD"];

$nomeClasse = ucfirst($classe . "Resource" . $httpM);
$chamador = new $nomeClasse();
if(isset($arg0))
    $chamador->$met($arg0);
else
    $chamador->$met();

?>