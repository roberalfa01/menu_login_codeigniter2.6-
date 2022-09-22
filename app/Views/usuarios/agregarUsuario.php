<?php

use App\Models\Usuario;
?>
<?=$this->extend('layout/principal')?>

<?=$this->section('titulo')?>
    Agregar usuario
<?=$this->endsection()?>

<?=$this->section('content')?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="text-center fw-bold"><h3>Agregar Usuario</h3></div>
            <div class="col-11 col-lg-5 p-5 fondo-ventana">
                <?php 
                    if(!empty(session()->getFlashdata('msg'))) :    ?>
                        <div class="alert alert-<?=session('msg.type')?> text-center" role="alert"><?=session('msg.body')?></div>
                <?php
                    endif
                ?>
                <form action="<?=base_url('usuario/grabarUsuario')?>" name="form_agregar_usuario" id="form_agregar_usuario" method="POST">
                    <?=csrf_field()?>
                    <div>
                        <label>Usuario *</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" maxlength="25" value="<?=old('usuario')?>">
                    </div>
                    <p class="text-danger mb-3" role="alert"><?=session('errors.usuario')?></p>
                    <div>
                        <label>Clave *</label>
                        <input type="password" class="form-control" name="clave1" id="clave1" maxlength="10" value="<?=old('clave1')?>">
                    </div>
                    <p class="text-danger mb-3" role="alert"><?=session('errors.clave1')?></p>
                    <div>
                        <label>Confirmar Clave*</label>
                        <input type="password" class="form-control" name="clave2" id="clave2" maxlength="10" value="<?=old('clave2')?>">
                    </div>
                    <p class="text-danger mb-3" role="alert"><?=session('errors.clave2')?></p>
                    <div>
                        <label>Email*</label>
                        <input type="email" class="form-control" name="email" id="email" maxlength="120" value="<?=old('email')?>">
                    </div>
                    <p class="text-danger mb-3" role="alert"><?=session('errors.email')?></p>
                    <div>
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="120" value="<?=old('nombre')?>">
                    </div>
                    <p class="text-danger mb-3" role="alert"><?=session('errors.nombre')?></p>
                    <div class="mb-4">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" maxlength="120"value="<?=old('apellido')?>">
                    </div>
                    <p class="text-danger mb-3" role="alert"><?=session('errors.apellido')?></p>
                    <div>
                        <input type="submit" class="btn btn-success form-control" value="Grabar" >
                    </div>
                </form>
            </div>
        </div>
    </div>
<?=$this->endsection()?>