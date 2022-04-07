<?php
namespace App\Controllers;
use App\Models\modelo_usuario;
class ctrl_acceso extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function acceder()
    {
        //validaciones
        //puedes personalizar los errores llendo al documento system>lenguage>en>validation.php
        if(!$this->validate(
            [
                //usuario requerimiento y password requerimiento de 5 caracteres minimos
                'usuario'=>'required|min_length[3]',
                'password'=>'required|min_length[5]'
            ]
        )){
            //que me retorne al login pero me muestre los errores
            return redirect()->to(base_url('/'))->with('errors',$this->validator->getErrors());

        }
        $modelo=new modelo_usuario();
        //recuperando datos de login.php, trim es una funcion para anular los espacios vacios
        $usuario=trim($_POST['usuario']);
        $password=trim($_POST['password']);
        //convertir en un arreglo asociativo
        $dato=array(
            'user'=>$usuario,
            'password'=>$password
        );
        //enviar al modelo para que consulte las credenciales
        $consulta=$modelo->ingresar($dato);
        if($consulta==null){
            //nos redirige a la raiz que seria el login de acceso
            return redirect()->to(base_url('/'));
        }else{
            //no hay gran diferencia entre return view(solo puedes enlaxar uno) y echo view(puedes enlazar varias)
            //redirige al archivo panel_control.php que esta en la carpeta views
            echo view("header");
            //ese var dump te muestra el user and password
            //var_dump($consulta);
            echo view("panel_control");
            echo view("footer");
        }
    }
}