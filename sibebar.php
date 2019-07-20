<?php
if (!$_SESSION['login']) {
    header('Location: index.php');
}
?>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active" id="paginaInicial">
            <a class="nav-link" href="javascript:void(0);">
                <i class="material-icons">dashboard</i>
                <p>Página Inicial</p>
            </a>
        </li>
        <li class="nav-item" id="">
            <a class="nav-link collapsed" data-toggle="collapse" href="#clientes" aria-expanded="false">
                <i class="material-icons">person</i>
                <p> Clientes
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="clientes" style="">
                <ul class="nav">
                    <li class="nav-item " id="gerenciarCliente">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="sidebar-mini"> <i class="material-icons">dashboard</i> </span>
                            <span class="sidebar-normal"> Gerenciar Clientes</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="">
            <a class="nav-link collapsed" data-toggle="collapse" href="#produtos" aria-expanded="false">
                <i class="material-icons">shopping_basket</i>
                <p> Produtos
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="produtos" style="">
                <ul class="nav">
                    <li class="nav-item " id="adicionarProduto">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="sidebar-mini"> <i class="material-icons">add_circle</i></span>
                            <span class="sidebar-normal"> Adicionar Produtos</span>
                        </a>
                    </li>
                    <li class="nav-item " id="gerenciarProduto">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="sidebar-mini"> <i class="material-icons">dashboard</i></span>
                            <span class="sidebar-normal"> Gerenciar Produtos</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="">
            <a class="nav-link collapsed" data-toggle="collapse" href="#categorias" aria-expanded="false">
                <i class="material-icons">view_list</i>
                <p> Categorias
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="categorias" style="">
                <ul class="nav">
                    <li class="nav-item " id="adicionarCategoria">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="sidebar-mini"> <i class="material-icons">add_circle</i></span>
                            <span class="sidebar-normal"> Adicionar Categorias</span>
                        </a>
                    </li>
                    <li class="nav-item " id="gerenciarCategoria">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="sidebar-mini"> <i class="material-icons">dashboard</i></span>
                            <span class="sidebar-normal"> Gerenciar Categorias</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="">
            <a class="nav-link collapsed" data-toggle="collapse" href="#vendas" aria-expanded="false">
                <i class="material-icons">shopping_cart</i>
                <p> Vendas
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="vendas" style="">
                <ul class="nav">
                    <li class="nav-item " id="gerenciarVenda">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="sidebar-mini"> <i class="material-icons">dashboard</i></span>
                            <span class="sidebar-normal"> Gerenciar Vendas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- <li class="nav-item " id="hello">
            <a class="nav-link" href="javascript:void(0);">
                <i class="material-icons">today</i>
                <p>Hello</p>
            </a>
        </li> -->
        <li class="nav-item" id="">
            <a class="nav-link collapsed" data-toggle="collapse" href="#administradores" aria-expanded="false">
                <i class="material-icons">account_circle</i>
                <p> Administradores
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="administradores" style="">
                <ul class="nav">
                    <li class="nav-item " id="adicionarAdministrador">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="sidebar-mini"> <i class="material-icons">add_circle</i> </span>
                            <span class="sidebar-normal"> Adicionar Administradores</span>
                        </a>
                    </li>
                    <li class="nav-item " id="gerenciarAdministrador">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="sidebar-mini"> <i class="material-icons">dashboard</i> </span>
                            <span class="sidebar-normal"> Gerenciar Administradores</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>