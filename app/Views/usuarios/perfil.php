<?php

use CodeIgniter\Filters\CSRF;
?>
<?=$this->extend('layout/principal')?>

<?=$this->section('titulo')?>
    Perfil
<?=$this->endsection()?>

<?=$this->section('content')?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="text-center fw-bold"><h3>Perfil</h3></div>
            <div class="col-11 col-lg-5 p-5 fondo-ventana">
                <form action="<?=base_url('usuario/grabarModificarPerfil')?>" name="form_modificar_perfil" id="form_modificar_perfil" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" value="<?=$data['usuario']?>" readonly >
                    </div>
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$data['nombre']?>">
                    </div>
                    <div class="mb-3">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="<?=$data['apellido']?>">
                    </div>
                    <div class="mb-3 text-center">
                        <img src="<?=base_url('/public/uploads/usuarios/'.$data['nombre_foto']) ?>" alt="" class="img-fluid">    
                    </div>
                    <div class="mb-4">
                        <input type="file" name="imagen" id="imagen">
                    </div>
                    <p class="text-danger mb-3" role="alert"><?=session('errors.imagen')?></p>
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    <input type="hidden" name="nombre_foto" value="<?=$data['nombre_foto']?>">
                    <div class="mb-3">
                        <button type="button" id="boton_perfil" class="btn btn-success form-control">Grabar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?=$this->endsection()?>

