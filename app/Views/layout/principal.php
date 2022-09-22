<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$this->renderSection('titulo')?></title>
        <link rel="stylesheet" href="<?=base_url('public/layout/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?=base_url('public/layout/css/estilos.css')?>">
        <script src="<?=base_url('public/layout/js/jquery-3.6.1.min.js')?>"></script>
    </head>
    <body>
        <?= $this->include('layout/header') ?>
        
        <?=$this->renderSection('content')?>

        <script src="<?=base_url('public/layout/js/bootstrap.bundle.min.js')?>"></script>
        <script src="<?=base_url('public/layout/js/validacionesAjax.js')?>"></script>
    </body>
</html>