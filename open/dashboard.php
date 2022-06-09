<?php
    if(!isset($_SESSION)){session_start();}
    include '../PHP/validaSessao.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewPort" content="width=device-width,initial-scale=1.0">
        <title>SAVE THE DATE</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://kit.fontawesome.com/85ac2fb599.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../scripts/libs/jquery.js"></script>
        <script type="text/javascript" src="../scripts/libs/jquery.mask.min.js"></script>
        <script type="text/javascript" src="../scripts/libs/jquery.mask.js"></script>
        <script type="text/javascript" src="../scripts/libs/crypto-js.min.js"></script>
        <script type="text/javascript" src="../scripts/scriptMenu.js"></script>
        <script type="text/javascript" src="../scripts/scriptautenticarUser.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/style.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="menu_mobile">
                    <a id="logo" href="./index.html"><img src="../img/SavetheDateLogo.png" width="180px" alt="logo"></a>
                    <button id="btn-mobile" onclick="toggleMenu()" >&#9776;</button>
                </div>
                <div id="navBarMobile">
                    <div class="menu">
                        <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                            <li>
                                <a href="./index.html" class="nav-link px-2 link-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207l-5-5-5 5V13.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7.207Zm-5-.225C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"/>
                                    </svg>
                                    Home
                                </a>   
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link px-2 link-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-nested" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                    Serviços
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16" style="margin-top: -2px; margin-left: -5px;">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                </a>
                                <ul>
                                    <li><a href="#" class="link-dark">Beleza</a></li>
                                    <li><a href="#" class="link-dark">Vestimenta</a></li>
                                    <li><a href="#" class="link-dark">Noivo</a></li>
                                    <li><a href="#" class="link-dark">Noiva</a></li>
                                    <li><a href="#" class="link-dark">Música</a></li>
                                </ul> 
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link px-2 link-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>
                                    Espaços
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16" style="margin-top: -2px; margin-left: -5px;">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                </a>
                                <ul>
                                    <li><a href="#" class="link-dark">Fazendas</a></li>
                                    <li><a href="#" class="link-dark">Hoteis</a></li>
                                    <li><a href="#" class="link-dark">Chacarás</a></li>
                                    <li><a href="#" class="link-dark">Salão de Festas</a></li>
                                    <li><a href="#" class="link-dark">Casas</a></li>
                                    <li><a href="#" class="link-dark">Exclusivos</a></li>
                                </ul> 
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link px-2 link-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                    </svg>
                                    Meu Casamento
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link px-2 link-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                    Minha conta
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16" style="margin-top: -2px; margin-left: -5px;">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                </a>
                                <ul>
                                    <li><a href="#" class="link-dark">Perfil</a></li>
                                    <li><a href="#" class="link-dark">Alterar Senha</a></li>
                                    <li><a href="#" onclick="sair();" class="link-dark">Sair</a></li>
                                </ul> 
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
        </div>
            <!--Listas-->
            <article class="lista_convidados">
                <div class="card">
                    <div class="card-header">
                    AJUDAMOS A ORGANIZAR O SEU CASAMENTO
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">Monte, organize e gerêncie seu casamento aqui! </h5>
                    <p class="card-text">Agora você pode ser conctar com todo a nossa rede de clientes e fornecedores!</p>
                    <a href="#" class="btn btn-primary" style="background-color: purple; border: purple;" >Consultar serviços!</a>
                    </div>
                </div>
            </article>
         <!--Formulario de cadastro-->
         <section>
            <article class="lista_convidados"> 
                <div class="card mb-3" >
                    <div class="card-header">
                    MEU CASAMENTO
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-2">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#" style="color: purple; text-decoration: none;">Meus Orçamentos</a></li>
                            <li class="list-group-item"><a>Meu Perfil</a></li>
                            <li class="list-group-item"><a>Alterar Senha</a></li>
                        </ul>
                        </div>
                        <div class="col-md-10 myForm myAccount">
                            <div class="card-body">
                                <form id="formulario_cadastro">
                                    <div id="messages"></div>
                                    <br>
                                    <h5 class="card-title text-center">Meus Orçamentos</h5>
                                    <br>
                                    <div class="meusOrcamentos"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                
            </article>
        </section>

        

    </body>
</html>