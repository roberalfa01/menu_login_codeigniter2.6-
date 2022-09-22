<?=$this->extend('layout/principal')?>

<?=$this->section('titulo')?>
    Usuario
<?=$this->endsection()?>

<?=$this->section('content')?>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-5 fondo-ventana border border-dark">
                <div class="row justify-content-center">
                    <div class="col-10 p-3 mb-3">
                        <?php 
                            if(!empty(session()->getFlashdata('msg'))) :    ?>
                                <div class="alert alert-<?=session('msg.type')?> text-center" role="alert"><?=session('msg.body')?></div>
                        <?php
                            endif
                        ?>
                        <div id="mensaje"></div>
                        <form action="<?=base_url('/usuario/validarUsuario')?>" name="form_validar_clave_usuario" id="form_validar_clave_usuario" method="POST">
                            <?=csrf_field()?>
                            <div class="mb-3">
                                <label>Correo o Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control" maxlength="120">
                            </div>
                            <div class="mb-4">
                                <label>Clave</label>
                                <input type="password" name="clave" id="clave" class="form-control" maxlength="10">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="form-control btn btn-success">Continuar</button>
                            </div>
                        </form>
                        <a href="<?=base_url('usuario/agregar')?>" class="btn btn-success form-control mb-3">Crear Usuario</a>
                        <a href="" class="btn btn-success form-control">Olvide Clave</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?=$this->endsection()?>