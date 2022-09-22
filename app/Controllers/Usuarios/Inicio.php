<?php

namespace App\Controllers\Usuarios;

use App\Controllers\BaseController;
use App\Models\Usuario;

class Inicio extends BaseController
{
    public function login()
    {
        //llama al formulario principal de usuario para pedir credenciales de acceso
        return view('usuarios/login');
    }

    public function validarUsuario()
    {
        //busca usuario a ver si existe o no existe para logearse
        $validacion = $this->validate([
            'usuario' => 'required|min_length[2]|max_length[120]',
            'clave'   => 'required|min_length[5]|max_length[10]'
        ]);
        if(!$validacion){
             $mensaje = "Revise la Informacion de sus campos";
             echo json_encode($mensaje);
             $this->response->setStatusCode(404);
             return;
        }
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $usuario_bd = new Usuario;
        $usuario_find = $usuario_bd->where("(usuario='$usuario' or email='$usuario') and clave='$clave'")->first();        
        if($usuario_find){
            //crear variable de session una vez chequeado  que usuario existe
            session()->set([
                'usuario_logueado' => $usuario_find['usuario'],
                'is_logged' => true
            ]);
            echo json_encode(base_url('/'));
            return;
        }else{
            $mensaje = "Usuario o Clave Errada";
            echo json_encode($mensaje);
            $this->response->setStatusCode(404);
            return;
        }   
    }

    public function salirSession()
    {
        //salir de la session de usuario
        if(!session()->is_logged){
            return redirect()->to('/');
        }
        session()->destroy();
        return redirect()->to('/');
    }
}
