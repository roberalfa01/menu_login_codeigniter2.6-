<?php

namespace App\Controllers\Usuarios;

use App\Controllers\BaseController;
use App\Models\Usuario;

class AgregarUsuario extends BaseController
{
  
    public function index()
    {
        //inicio de agregar usuario envia a formulario de adicionar
        echo view('usuarios/agregarUsuario');
    }

    public function grabarUsuario()
    {
        //verificar usuario agrabar a ver si existe y si no grabarlo
        $validacion = $this->validate([
            'usuario'   => [
                'rules'=> 'required|min_length[2]|max_length[25]',
                'errors'=>[
                    'required'=>"Debe Escribir el Nombre del Usuario",
					'min_length'=>"Usuario no puede ser menor a 2 digitos",
					'max_length'=>"Usuario no puede ser mayor a 120 digitos"
                ]
            ],
            'clave1'    => [
                'rules'=> 'required|min_length[5]|max_length[10]',
                'errors'=>[
                    'required'=>"Debe Escribir el Nombre del Usuario",
					'min_length'=>"Usuario no puede ser menor a 5 digitos",
					'max_length'=>"Usuario no puede ser mayor a 10 digitos"
                ]
            ],
            'clave2'    => [
                'rules'=> 'required|matches[clave1]',
                'errors'=>[
                    'required'=>"Debe Escribir el Nombre del Usuario",
					'matches'=>"Las claves no coinciden",
                ]
            ],
            'email'    => [
                'rules'=> 'required|valid_email|min_length[5]|max_length[120]',
                'errors'=>[
                    'required'=>"Debe Escribir el Nombre del Usuario",
					'min_length'=>"Email no puede ser menor a 5 digitos",
					'max_length'=>"Email no puede ser mayor a 120 digitos"
                ]
            ],
            'nombre'    => [
                'rules'=> 'max_length[25]',
                'errors'=>[
					'max_length'=>"El Nombre no puede ser mayor a 25 digitos"
                ]
            ],
            'apellido'    => [
                'rules'=> 'max_length[25]',
                'errors'=>[
					'max_length'=>"El Apellido no puede ser mayor a 25 digitos"
                ]
            ],
        ]);
        if(!$validacion){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }else{
            //buscar en la tabla  usuarios
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave1'];
            $email = $_POST['email'];
            helper('limpiarVariable');
            $usuario = limpiarVariable($usuario);
            $usuario_datos = new Usuario;
            $usuario_find = $usuario_datos->where("usuario = '$usuario' or email = '$email'")->first();
            if($usuario_find){
                session()->setFlashdata('msg', [
                    'type' => 'danger',
                    'body' => 'Usuario o Email ya existen'
                ]);
                return redirect()->back()->withInput();
            }else{
                //no encontro usuario se va a agragar aca
                $usuario_datos->insert([
                    'usuario'               => $usuario,
                    'clave'                 => $clave,
                    'fecha_incorporacion'   => date('Y-m-d H:i:s'),
                    'email'                 => $email,
                    'nombre'                => $_POST['nombre'],
                    'apellido'              => $_POST['apellido'],
                    'nivel'                 => '3',
                    'estatus'               => 'p',
                ]);
                session()->setFlashdata('msg', [
                    'type' => 'success',
                    'body' => 'Su Registro Fue Exitoso, Revise Su Correo Para Validar Usuario, Si No Llega Revise Correo No Deseados'
                ]);
               return redirect()->to('usuario/login');
            }
        }
    }
}
