<nav class="navbar navbar-expand-lg navbar-dark fondo-menu">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="<?=base_url('public/layout/imagenes/logo.svg')?>" width="60" height="60" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=base_url('/')?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Operaciones
                    </a>
                    <ul class="dropdown-menu fondo-menu">
                        <li><a class="dropdown-item" href="#">Eliminar</a></li>
                        <li><a class="dropdown-item" href="#">Crear</a></li>
                        <li><a class="dropdown-item" href="#">Editar</a></li>
                    </ul>
                </li>
                <?php
                    if(!session()->is_logged)
                    {
                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url('/usuario/login')?>">Usuario</a>
                        </li>
                <?php
                    }
                ?>
                <?php
                    if(session()->is_logged)
                    {
                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url('/usuario/perfil')?>">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url('/usuario/salirSession')?>">Salir</a>
                        </li>
                <?php
                    }
                ?>

            </ul>
        </div>
    </div>
</nav>
<div>
    <?php 
        if(session()->is_logged)
        {
            echo '<div class="text-end me-5">'.$_SESSION['usuario_logueado'].'</div>';
        }
    ?>
</div>
