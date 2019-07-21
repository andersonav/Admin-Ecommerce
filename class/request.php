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




    case 'queryRelatorio':
        $de = $_POST['de'];
        $ate = $_POST['ate'];
        date_default_timezone_set('America/Sao_Paulo');
        $diaHoje = $de;
        $diaAmanha = date('Y-m-d', strtotime('+1 day'));
        $sql = "SELECT agendar_clientes.*,agendar_horarios.*, agendar_servicos.descricao,
            agendar_servicos.tempo_estimado, agendar_servicos.id_servico
            FROM agendar_clientes
            INNER JOIN agendar_horarios
            ON agendar_clientes.id_horario=agendar_horarios.id_horario 
            INNER JOIN agendar_horarios_servicos
            ON agendar_horarios_servicos.id_horario = agendar_horarios.id_horario
            INNER JOIN agendar_servicos
            ON agendar_servicos.id_servico = agendar_horarios_servicos.id_servico 
            WHERE (agendar_horarios.data >= '$diaHoje' AND agendar_horarios.data <= '$ate') ORDER BY agendar_horarios.id_horario";
        $get = $conn->prepare($sql);
        $get->execute();

        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);

        foreach ($response as $key => $value) {
            $id = $response[$key]['id_categoria'];
            $get = $conn->prepare("SELECT nome FROM agendar_categorias WHERE id_categoria = '$id' ");
            $get->execute();
            $nameBarb = $get->fetch(PDO::FETCH_ASSOC);

            $response[$key]['barbeiro'] = $nameBarb['nome'];
        }
        echo json_encode($response);

        break;


    case 'atualizar-contas-clientes':
        $response = array();
        // Cadastro de clientes
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $nasci = $_POST['nascimento'];
        $observacoes = $_POST['observacoes'];

        $sql = "UPDATE clientes_user SET nome_cliente_user=?,telefone_cliente_user=?,nascimento_cliente_user=?,cpf_cliente_user=?,observacoes_cliente_user=? WHERE id_cliente_user=?";

        $get = $conn->prepare($sql);

        if ($get->execute(array($nome, $telefone, $nasci, $cpf, $observacoes, $id))) {
            $response['status'] = 'Sucesso';
            $response['mensagem'] = "Dados do cliente atualizados com sucesso.";
        } else {
            $response['status'] = 'Error';
            $response['mensagem'] = "Tente novamente.";
        }

        echo json_encode($response);
        break;

    case 'atualizar-data-clientes':
        $response = array();
        // Cadastro de clientes
        $id = $_POST['id'];
        $nv_data = $_POST['date'];

        $sql = "UPDATE clientes_user SET ult_ativacao_cliente_user=? WHERE id_cliente_user=?";
        $get = $conn->prepare($sql);

        if ($get->execute(array($nv_data, $id))) {
            $response['status'] = 'Sucesso';
            $response['mensagem'] = "Data de processo atualizada.";
        } else {
            $response['status'] = 'Error';
            $response['mensagem'] = "Tente novamente.";
        }

        echo json_encode($response);
        break;

    case 'deletar-clientes-contas':
        $response = array();
        $id = $_POST['alvo'];
        $sql = "DELETE FROM clientes_user WHERE id_cliente_user = ?";
        $get = $conn->prepare($sql);

        if ($get->execute(array($id))) {
            $response['status'] = 'Sucesso';
            $response['mensagem'] = "Conta de cliente excluida.";
        } else {
            $response['status'] = 'Error';
            $response['mensagem'] = "Erro ao deletar conta de cliente.";
        }

        echo json_encode($response);
        break;


    case 'visualizar-clientes-contas':
        $response = array();
        $sql = "SELECT * FROM clientes_user";
        $get = $conn->prepare($sql);
        $get->execute();
        $response = $get->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($response);
        break;


        // ============================== FUNCIONÁRIOS ==============================
    case 'adicionar-funcionario':
        @header('Content-Type: application/json; charset=UTF8');
        $response = array();
        try {
            $nome = $_POST['nome'];
            $cor = $_POST['cor'];
            $uploaddir = '../../agendamento/';
            $img = "img/" . @date("YmdHis") . $_FILES['arquivo']['name'];
            $upload = $uploaddir . $img;
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $upload)) {
                $response[] = "Arquivo Enviado $img";
            } else {
                $response[] = "Erro ao enviar o arquivo";
            }
            $sql = "INSERT INTO agendar_categorias (nome, imagem, ativa, cor) VALUES (?,?,?,?)";
            $get = $conn->prepare($sql);
            $data['status'] = 'success';
            $get->execute(array($nome, $img, "1", $cor));
        } catch (Exception $ex) {
            $data['status'] = 'error';
            echo json_encode($data);
            exit();
        }
        $data['status'] = 'success';
        echo json_encode($data);
        break;



    case 'editar-funcionario':
        @header('Content-Type: application/json; charset=UTF8');
        $response = array();
        try {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cor = $_POST['cor'];
            $uploaddir = '../../agendamento/';
            $img = "img/" . @date("YmdHis") . $_FILES['arquivo']['name'];
            $upload = $uploaddir . $img;
            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $upload)) {
                $response[] = "Arquivo Enviado $img";
            } else {
                $response[] = "Erro ao enviar o arquivo";
            }
            $sql = "UPDATE agendar_categorias SET nome=?, imagem=?, cor=? WHERE id_categoria=?";
            $get = $conn->prepare($sql);
            $get->execute(array($nome, $img, $cor, $id));
        } catch (Exception $ex) {
            $data['status'] = 'error';
            echo json_encode($data);
            exit();
        }
        $data['status'] = 'success';
        echo json_encode($data);
        break;

    case 'deletar-funcionario':
        @header('Content-Type: application/json; charset=UTF8');
        $response = array();
        try {
            $id = $_POST['id'];
            $sql = "UPDATE agendar_categorias SET ativa=0 WHERE id_categoria=?";
            $get = $conn->prepare($sql);
            $get->execute(array($id));
        } catch (Exception $ex) {
            $data['status'] = 'error';
            echo json_encode($data);
            exit();
        }
        $data['status'] = 'success';
        echo json_encode($data);
        break;


        // ============================== PRODUTO ==============================
    case 'adicionar-produto':
        $response = array();
        $especie = $_POST['especie'];
        $categoria = $_POST['categoria'];
        $produto = $_POST['produto'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $descricao = $_POST['descricao'];
        $uploaddir = '../../ecommerce/img/';
        $img = date("d-m-Y-H:i:s-") . rand(2000, 200000) . $_FILES['arquivo']['name'];
        $uploadfile = $uploaddir . $img;
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
            $response[] = "Arquivo Enviado $img";
        } else {
            $response[] = "Erro ao enviar o arquivo";
        }

        $sql = "INSERT INTO ecommerce_produtos (id_especie, id_categoria, produto, preco, quantidade,descricao, img,ativo) VALUES (?, ?, ?, ?, ?, ? ,?,1)";
        $get = $conn->prepare($sql);
        $get->execute(array($especie, $categoria, $produto, $preco, $quantidade, $descricao, $img));

        echo json_encode($response);

        break;

    case 'visualizar-produtos':
        $response = array();
        $sql = "SELECT * FROM ecommerce_produtos WHERE ativo = 1 ORDER BY produto";
        $get = $conn->prepare($sql);
        $get->execute();
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;

    case 'informacao-produto':
        $id = $_POST['id'];
        $response = array();
        $sql = "SELECT * FROM ecommerce_produtos WHERE id_produto = ?";
        $get = $conn->prepare($sql);
        $get->execute(array($id));
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;

    case 'editar-produto':
        $id = $_POST['id_produto'];
        $produto = $_POST['produto'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $especie = $_POST['especie'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $response = array();
        $sql = "UPDATE ecommerce_produtos SET produto=?,preco=?,quantidade=?, id_especie=?,id_categoria=?,descricao=? WHERE id_produto=?";
        $get = $conn->prepare($sql);
        $get->execute(array($produto, $preco, $quantidade, $especie, $categoria, $descricao, $id));
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;

    case 'deletar-produto':
        $id = $_POST['id'];

        $response = array();
        $sql = "UPDATE ecommerce_produtos SET ativo=0 WHERE id_produto=?";
        $get = $conn->prepare($sql);
        $get->execute(array($id));
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;

        // ============================== CATEGORIA ============================
    case 'adicionar-categoria':
        $response = array();
        $nome = $_POST['nome'];
        try {
            $sql = "INSERT INTO ecommerce_categorias (nome,ativo)VALUES (?, ?)";
            $get = $conn->prepare($sql);
            $get->execute(array($nome, '1'));
        } catch (Exception $e) {
            $response[] = $e->getMessage();
        }
        echo json_encode($response);
        break;

    case 'visualizar-categorias':
        $response = array();
        $sql = "SELECT * FROM ecommerce_categorias WHERE habilitado = 1 ORDER BY nome";
        $get = $conn->prepare($sql);
        $get->execute();
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;

    case 'editar-categoria':
        $response = array();
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $check = $_POST['check'];
        $sql = "UPDATE ecommerce_categorias SET nome=?,ativo=? WHERE id_categoria=?";
        $get = $conn->prepare($sql);
        $get->execute(array($nome, $check, $id));
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;

    case 'drop-categoria':
        $response = array();
        $id = $_POST['id'];
        $sql = "UPDATE ecommerce_categorias SET ativo=0,habilitado=0 WHERE id_categoria=?";
        $get = $conn->prepare($sql);
        $get->execute(array($id));
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;


        // ============================== COMPRAS ==============================
    case 'visualizar-comprador':

        $response = array();
        $sql = "SELECT ecommerce_vendas.*, ecommerce_clientes.*
    FROM ecommerce_vendas
    INNER JOIN ecommerce_clientes ON ecommerce_vendas.id_cliente = ecommerce_clientes.id_cliente
    ORDER BY ecommerce_vendas.data desc";
        $get = $conn->prepare($sql);
        $get->execute();
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;

    case 'visualizar-vendas':
        $response = array();
        $id = $_POST['id'];
        $sql = "SELECT ecommerce_produtos_vendidos.*, ecommerce_produtos.produto, ecommerce_produtos.preco, ecommerce_produtos.id_produto
    FROM ecommerce_produtos_vendidos
    INNER JOIN ecommerce_produtos ON ecommerce_produtos_vendidos.id_produto = ecommerce_produtos.id_produto
    WHERE ecommerce_produtos_vendidos.id_venda = 1";
        $get = $conn->prepare($sql);
        $get->execute(array($id));
        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);
        break;

    case 'visualizar-compradorPesquisa':

        $pesquisa = $_POST['pesquisa'];

        $response = array();

        $sql = "SELECT ecommerce_vendas.*, ecommerce_clientes.*
    FROM ecommerce_vendas
    INNER JOIN ecommerce_clientes ON ecommerce_vendas.id_cliente = ecommerce_clientes.id_cliente
    WHERE ecommerce_clientes.nome LIKE '%" . "$pesquisa" . "%' ORDER BY ecommerce_vendas.data desc";
        $get = $conn->prepare($sql);
        $get->execute();

        foreach ($get as $dados) {
            $response[] = $dados;
        }
        echo json_encode($response);

        break;

        //=========== Logout ====================\\
    case 'sairLogout':
        $response = array();
        //Destruindo a sessão
        session_destroy();

        $response['status'] = session_status();
        echo json_encode($response);
        break;

    default:
        echo json_encode(array('message' => 'Alguma coisa deu errado! Default: Message'));
        break;
}
$conn = null;
