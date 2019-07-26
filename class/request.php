<?php

session_start();
//include_once '../../../pass/con.php';
$action = (isset($_POST['action'])) ? $_POST['action'] : '';
// $action = (isset($_GET['action'])) ? $_GET['action'] : '';

/* ===== Host ===== */
//$conn = new PDO('mysql:host=sql311.epizy.com;dbname=epiz_23000167_test;charset=utf8;', 'epiz_23000167', 'jakDB1cO');
/* ===== Sandbox ===== */
$conn = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8;', 'root', '');

switch ($action) {
        // ============================== PÁGINA INICIAL ==============================
    case 'qtd-clientes':
        $response = array();
        $sql = "SELECT count(usuario_id) as qtdCliente FROM usuario WHERE ativo = 1";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);

        break;
    case 'qtd-vendas-aprovadas':
        $response = array();
        $sql = "SELECT count(pedido_id) as qtdVendasAprovadas FROM pedido WHERE status LIKE 'Aprovado'";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);

        break;
    case 'qtd-vendas-pendentes':
        $response = array();
        $sql = "SELECT count(pedido_id) as qtdVendasPendentes FROM pedido WHERE status LIKE 'Pendente'";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);

        break;
    case 'qtd-produtos':
        $response = array();
        $sql = "SELECT count(produto_id) as qtdProdutos FROM produto WHERE ativo = 1";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);

        break;

        // ============================== CLIENTES ==============================

    case 'get-clientes':
        $response = array();
        $sql = "SELECT * FROM usuario WHERE ativo = 1";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
        break;
    case 'editar-cliente':
        $response = array();
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];

        $sql = "UPDATE usuario SET nome=?,email=?,telefone=?,cpf=?,cep=?,endereco=?,numero=?,cidade=?,bairro=? WHERE usuario_id=?";

        $get = $conn->prepare($sql);

        if ($get->execute(array($nome, $email, $telefone, $cpf, $cep, $endereco, $numero, $cidade, $bairro, $id))) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }
        echo json_encode($response);
        break;
    case 'deletar-cliente':
        $response = array();
        $id = $_POST['id'];

        $sql = "UPDATE usuario SET ativo=0 WHERE usuario_id=?";

        $get = $conn->prepare($sql);

        if ($get->execute(array($id))) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }
        echo json_encode($response);
        break;
        // ============================== PRODUTOS ==============================
    case 'get-categorias':
        $response = array();
        $sql = "SELECT * FROM categoria WHERE ativo = 1";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
        break;
    case 'adicionar-produto':
        $response = array();
        try {
            $nome = $_POST['nome'];
            $categoriaId = $_POST['categoria'];
            $quantidade = $_POST['quantidade'];
            $valor = $_POST['valor'];
            $descricao = $_POST['descricao'];
            $uploaddir = '../../ecommerceLaravel/public/img/images/';
            $img =  "produtos/" . @date("YmdHis") . $_FILES['arquivo']['name'];
            $upload = $uploaddir . $img;
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $upload)) {
                $response[] = "Arquivo Enviado $img";
            } else {
                $response[] = "Erro ao enviar o arquivo";
            }
            $sql = "INSERT INTO produto (nome, descricao, valor, imagem, quantidade, categoria_id_fk) VALUES (?,?,?,?,?,?)";
            $get = $conn->prepare($sql);
            $data['status'] = 'success';
            $get->execute(array($nome, $descricao, $valor, $img, $quantidade, $categoriaId));
        } catch (Exception $ex) {
            $data['status'] = 'error';
            echo json_encode($data);
            exit();
        }
        $data['status'] = 'success';
        echo json_encode($data);
        break;

    case 'get-produtos':
        $response = array();
        $sql = "SELECT produto.*,categoria.nome as categoriaNome FROM produto INNER JOIN categoria ON categoria.categoria_id = produto.categoria_id_fk WHERE produto.ativo = 1 AND categoria.ativo = 1";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
        break;

    case 'editar-produto':
        $response = array();
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $categoriaId = $_POST['categoria'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];

        if ($_FILES['arquivo']['name'] == "") {
            $sql = "UPDATE produto SET nome=?,descricao=?,valor=?,quantidade=?,categoria_id_fk=? WHERE produto_id=?";
            $get = $conn->prepare($sql);

            if ($get->execute(array($nome, $descricao, $valor, $quantidade, $categoriaId, $id))) {
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
            }
            echo json_encode($response);
        } else {
            $uploaddir = '../../ecommerceLaravel/public/img/images/';
            $img =  "produtos/" . @date("YmdHis") . $_FILES['arquivo']['name'];
            $upload = $uploaddir . $img;
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $upload)) {
                $response[] = "Arquivo Enviado $img";
            } else {
                $response[] = "Erro ao enviar o arquivo";
            }
            $sql = "UPDATE produto SET nome=?,descricao=?,valor=?,quantidade=?,categoria_id_fk=?,imagem=? WHERE produto_id=?";
            $get = $conn->prepare($sql);

            if ($get->execute(array($nome, $descricao, $valor, $quantidade, $categoriaId, $img, $id))) {
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
            }
            echo json_encode($response);
        }

        break;

    case 'deletar-produto':
        $response = array();
        $id = $_POST['id'];

        $sql = "UPDATE produto SET ativo=0 WHERE produto_id=?";

        $get = $conn->prepare($sql);

        if ($get->execute(array($id))) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }
        echo json_encode($response);
        break;

        // ============================== CATEGORIAS ==============================
    case 'adicionar-categoria':
        $response = array();
        try {
            $nome = $_POST['nome'];
            $sql = "INSERT INTO categoria (nome) VALUES (?)";
            $get = $conn->prepare($sql);
            $data['status'] = 'success';
            $get->execute(array($nome));
        } catch (Exception $ex) {
            $data['status'] = 'error';
            echo json_encode($data);
            exit();
        }
        $data['status'] = 'success';
        echo json_encode($data);
        break;
    case 'editar-categoria':
        $response = array();
        $id = $_POST['id'];
        $nome = $_POST['nome'];

        $sql = "UPDATE categoria SET nome=? WHERE categoria_id=?";

        $get = $conn->prepare($sql);

        if ($get->execute(array($nome, $id))) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }
        echo json_encode($response);
        break;
    case 'deletar-categoria':
        $response = array();
        $id = $_POST['id'];

        $sql = "UPDATE categoria SET ativo=0 WHERE categoria_id=?";

        $get = $conn->prepare($sql);

        if ($get->execute(array($id))) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }
        echo json_encode($response);
        break;

        // ============================== ADMINISTRADORES ==============================
    case 'get-administradores':
        $response = array();
        $sql = "SELECT * FROM administradores WHERE ativo = 1";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
        break;
    case 'adicionar-administrador':
        $response = array();
        try {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $confirmSenha = $_POST['confirmSenha'];
            if ($senha != $confirmSenha) {
                $data['status'] = 'error';
                echo json_encode($data);
            } else {
                $senhaMd5 = md5($senha);
                $sql = "INSERT INTO administradores (nome, email, password) VALUES (?,?,?)";
                $get = $conn->prepare($sql);
                $get->execute(array($nome, $email, $senhaMd5));
                $data['status'] = 'success';
                echo json_encode($data);
            }
        } catch (Exception $ex) {
            $data['status'] = 'error';
            echo json_encode($data);
            exit();
        }

        break;
    case 'editar-administrador':
        $response = array();
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $sql = "UPDATE administradores SET nome=?,email=? WHERE admin_id=?";

        $get = $conn->prepare($sql);

        if ($get->execute(array($nome, $email, $id))) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }
        echo json_encode($response);
        break;
    case 'editar-administrador-senha':
        $response = array();
        $id = $_POST['idToPass'];
        $senha = $_POST['senha'];
        $confirmSenha = $_POST['confirmSenha'];
        if ($senha != $confirmSenha) {
            $data['status'] = 'error';
            echo json_encode($data);
        } else {
            $senhaMD5 = md5($senha);
            $sql = "UPDATE administradores SET password=? WHERE admin_id=?";
            $get = $conn->prepare($sql);
            if ($get->execute(array($senhaMD5, $id))) {
                $response['status'] = 'success';
            } else {
                $response['status'] = 'error';
            }
            echo json_encode($response);
        }

        break;
    case 'deletar-administrador':
        $response = array();
        $id = $_POST['id'];

        $sql = "UPDATE administradores SET ativo=0 WHERE admin_id=?";

        $get = $conn->prepare($sql);

        if ($get->execute(array($id))) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }
        echo json_encode($response);
        break;

        // ============================== VENDAS ==============================
    case 'get-vendas':
        $response = array();
        $sql = "SELECT * FROM pedido INNER JOIN usuario ON usuario_id = usuario_id_fk WHERE status like 'Aprovado'";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
        break;
    case 'get-produto-by-pedido':
        $response = array();
        $id = $_POST['id'];
        $sql = "SELECT produto.nome, carrinho.quantidade_produto_carrinho, (valor*quantidade_produto_carrinho) as valorMult FROM carrinho INNER JOIN pedido ON pedido_id = pedido_id_fk INNER JOIN produto ON produto_id = produto_id_fk WHERE pedido_id = ?";
        $get = $conn->prepare($sql);
        $get->execute(array($id));
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
        break;

    default:
        echo json_encode(array('message' => 'Alguma coisa deu errado! Default: Message'));
        break;
}
$conn = null;
