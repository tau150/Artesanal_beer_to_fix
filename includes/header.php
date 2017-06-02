<?php
    require_once("./support.php"); 
    
    // checkCookie();
        $session_user = 'Invitado';

        if( isset($auth->loggedIn)){
            $session_user = $_SESSION['username'];
        
        }
?>

 

<header>

<!--Container start-->
<div class="container">

    <!--Sub - container start-->
    <div class="sub_container">
        <div class="header_logo">
            <img src="images/logo-header.png" alt="logo sitio">
        </div>

        <div class="container-icons-bar">
            <ul class="icons-bar">
                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
            </ul>
        </div>

        <nav class='main-menu'>
            <ul>
                <li><a <?php if ($activo == "home") echo "class=\"nav_activa_menu_lateral\""; ?> href="index.php"><i class="ion-home"></i>Home</a></li>
                <li><a <?php if ($activo == "faq") echo "class=\"nav_activa_menu_lateral\""; ?> href="faq.php"><i class="ion-help"></i>Faqs</a></li>
                <?php if (!isset($_SESSION['username']) ) { ?>
                <li><a <?php if ($activo == "register") echo "class=\"nav_activa_menu_lateral\""; ?> href="register.php"><i class="ion-clipboard"></i>Registrate</a></li>
                <li><a <?php if ($activo == "login") echo "class=\"nav_activa_menu_lateral\""; ?> href="login.php"><i class="ion-person"></i>Login</a></li>
                <?php }else {?>
                <li><a <?php if ($activo == "logout") echo "class=\"nav_activa_menu_lateral\""; ?> href="logout.php"><i class="ion-log-out"></i>Logout</a></li>
                <?php } ?>
                <li><a <?php if ($activo == "carrito") echo "class=\"nav_activa_menu_lateral\""; ?> href="#"><i class="ion-android-cart"></i>Mi Carrito</a></li>
                <li><a <?php if ($activo == "contacto") echo "class=\"nav_activa_menu_lateral\""; ?> href="#"><i class="ion-email"></i>Contacto</a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">
                        <i class="ion-folder"></i>
                        Categorias
                        <i class="ion-ios-arrow-forward"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Rubias</a>
                            <a href="#">Rojas</a>
                            <a href="#">Negras</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">
                        <i class="ion-settings"></i>
                        Servicios
                        <i class="ion-ios-arrow-forward"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Equipamiento</a>
                            <a href="#">Eventos</a>
                            <a href="#">Insumos</a>
                        </div>
                </div>
                </li>
                <li><a href="#"><i class="ion-social-facebook"></i>Facebook</a></li>
                <li><a href="#"><i class="ion-social-twitter"></i>Twitter</a></li>
                <li><a href="#"><i class="ion-social-instagram"></i>Instagram</a></li>
                <li><a href="#"><i class="ion-social-pinterest"></i>Pinterest</a></li>
                
            </ul>
        </nav>


        <div class="container-menu-bar"> 
            <a href="#" class='main-menu-button'><i class="ion-navicon-round"></i></a>
            <nav class="secondary-menu">
                <ul>
                    <li><a <?php if ($activo == "home") echo "class=\"nav_activa\""; ?> href="index.php">Home</a></li>
                    <li><a <?php if ($activo == "faq") echo "class=\"nav_activa\""; ?> href="faq.php">Faqs</a></li>
                    <?php if (!isset($_SESSION['username'])) { ?>
                    <li><a <?php if ($activo == "register") echo "class=\"nav_activa\""; ?> href="register.php">Registrate</a></li>
                    <?php } ?>
                    <li><a <?php if ($activo == "contacto") echo "class=\"nav_activa\""; ?> href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>

    </div>
    <!--Sub - container end-->

</div>
<!--Container end-->


<!--Fondo gris full width start-->
<div class="header_fondo_gris">

    <!--Container start-->
    <div class="container">

        <!--Sub - container start-->
        <div class="sub_container">

            <div class="container-search-bar">
                <form action="" method="get">
                    <input class="text_search" type="text" placeholder="Ingresa tu busqueda" name="search" value="">
                    <input class="submit_search" type="submit" name="search_header" value="Buscar">
                </form>
                <div class="cuenta">
                    <p class='user-name'>Hola, <?=  $session_user ?></p>
                    <?php if (isset($_SESSION['username']) ) { ?>
                        <a href="profile.php" class='home-icon'><i class="ion-ios-home"></i></a>
                        <a href="logout.php" class='logout' >Logout</a>
                    <?php }else { ?>
                        <a href="login.php" class='home-icon'><i class="ion-ios-home"></i></a>
                        
                    <?php } ?>
                    
                </div>
            </div>

        </div>
        <!--Sub - container end-->

    </div>
    <!--Container end-->

</div>
<!--Fondo gris full width end-->


    <!--Fondo amarillo full width start-->
    <div class="header_fondo_amarillo">

        <!--Container start-->
        <div class="container">

            <!--Sub - container start-->
            <div class="sub_container">

            <div class="container-product-menu-bar">
                <div class="dropdown">
                    <button class="dropbtn">Categorias</button>
                    <div class="dropdown-content">
                        <a href="#">Rubias</a>
                        <a href="#">Rojas</a>
                        <a href="#">Negras</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Servicios</button>
                    <div class="dropdown-content">
                        <a href="#">Equipamiento</a>
                        <a href="#">Eventos</a>
                        <a href="#">Insumos</a>
                    </div>
                </div>
            </div>
            <a class='carro-icon' href="#"><i class="ion-ios-cart"></i> </a>

            </div>
            <!--Sub - container end-->

        </div>
        <!--Container end-->

    </div>
    <!--Fondo amarillo full width end-->

</header>