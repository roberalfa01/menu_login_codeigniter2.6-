<?php

namespace App\Controllers\Usuarios;

use App\Controllers\BaseController;
use App\Models\Usuario;
use CodeIgniter\HTTP\Request;

class Perfil extends BaseController
{
    public function mostrarDatosUsuario()
    {
        //modulo de perfil de usuario sus datos
        if(!session()->is_logged){
        return redirect()->to('/');
        }
        $usuario = session()->usuario_logueado;
        $usuario_datos = new Usuario;
        $usuario_find = $usuario_datos->where("usuario = '$usuario'")->first();
        if(!$usuario_find){
            return redirect()->to('/');
        }else{
            $datos =[
                'data' => $usuario_find,
            ];
            echo view('usuarios/perfil', $datos); 
        }
    }
        
    public function grabarModificarPerfil()
    {
        //modificar perfil datos usuario
        $usuario = $_POST['usuario'];
        $usuario_datos = new Usuario;
        $usuario_find = $usuario_datos->where("usuario = '$usuario' or email = '$usuario' ")->first();
        if(!$usuario_find){
            return redirect()->to('/');
        }else{
            //perfil modifica la informacion del usuario en la tabla
            $validacion1 = $this->validate([
                'imagen' => [
                    'rules' => 'ext_in[imagen,png,jpg,gif]',
                    'errors' => [
                        'ext_in' => "Imagen debe ser jpg, png, gif",
                    ],
                ]
            ]);
            if(!$validacion1){
                return redirect()->back()->with('errors', $this->validator->getErrors());
            }
            
            $validacion = $this->validate([
                'imagen' => [
                    'rules' => 'uploaded[imagen]',
                    'errors' => [
                        'uploaded' => "No cargo la imagen",
                    ],
                    'rules' => 'ext_in[imagen,png,jpg,gif]',
                    'errors' => [
                        'ext_in' => "Imagen debe ser jpg, png, gif",
                    ],
                    'rules' => 'mime_in[imagen,image/jpg,image/jpeg,image/png,image/gif]',
                    'errors' => [
                        'mime_in' => "Imagen debe ser jpg, png, gif",
                    ],
                    'rules' => 'is_image[imagen]',
                    'errors' => [
                        'is_image' => "No es el tipo de imagen requerida",
                    ],
                    'rules' => 'max_dims[imagen,8000,8000]',
                    'errors' => [
                        'max_dims' => "Imagen muy grande se recomienda Ancho < 8000 y alto < 8000 de la imagen no permitidos ",
                    ],
                    'rules' => 'min_dims[imagen,500,300]',
                    'errors' => [
                        'min_dims' => "Imagen muy pequeña se recomienda Ancho > 500  y alto > 300 de la imagen no permitidos ",
                    ],
                ]
            ]);
            if(!$validacion){
                return redirect()->back()->with('errors', $this->validator->getErrors());
               //return redirect()->back();
            }else{
                if($imagenFile = $this->request->getFile('imagen')){
                    if($imagenFile->isValid() && !$imagenFile->hasMoved()){ 
                        $nuevoNombre = $imagenFile->getRandomName();
                        $imagenFile->move('public/uploads/usuarios/',$nuevoNombre);
                    }
                    //borrar la foto vieja
                    $ruta = "public/uploads/usuarios/".$_POST['nombre_foto'];
                    if(is_file($ruta)){
                        unlink($ruta);
                    }
                    //extraer datos informativos de la foto subida para cambiar tamaño de la foto peso y dimensiones
                    $peso_archivo = filesize('public/uploads/usuarios/'.$nuevoNombre);
                    $extension = pathinfo($nuevoNombre, PATHINFO_EXTENSION);
                    $medidas = getimagesize('public/uploads/usuarios/'.$nuevoNombre);    //Sacamos la información general
                    $ancho = $medidas[0];              //Ancho
                    $alto = $medidas[1]; 
                    //cambiar tamaño de imagen
                    if($ancho >= 500)
                    {
                        //Cargar funciones para imagenes 
                        $image = \Config\Services::image()
                        ->withFile('public/uploads/usuarios/'.$nuevoNombre)
                        ->resize(500, 300, true, 'width') //matiene el ancho y proporciona el alto
                        ->reorient()
                        ->save('public/uploads/usuarios/'.$nuevoNombre, 70);	
                    }
                }
                $data = [
                    'nombre'        => $_POST['nombre'],
                    'apellido'      => $_POST['apellido'],
                    'nombre_foto'   => $nuevoNombre,
                ];
                $usuario_datos->update($_POST['id'], $data);
                return redirect()->back();
            }
        }

        
    }
}
