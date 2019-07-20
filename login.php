<?php


include_once 'class/bdConexao.class.php';

try {
    $bd = new bdConexao;
} catch (PDOException $i) {
    //se houver exceção, exibe
    print "Ocorreu um erro!";
    die();
}


$login = $_POST['login'];
$senha = md5($_POST['senha']);
$verifica = $bd->listar("SELECT * FROM administradores WHERE email = '$login' AND password = '$senha'");
$response = array();
if ($verifica) {

    //Iniciando a sessão
    session_start();
    $_SESSION["login"] = $login;
    $_SESSION['tipo'] = 'administrador';
    $response = [
        "data" => "success"
    ];
} else {
    $response = [
        "data" => "error"
    ];
}
echo json_encode($response);
