<?php

namespace App\Models;

use CodeIgniter\Model;

class modelo_usuario extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $returnType     = 'array';

    protected $allowedFields = ['usuario', 'password'];

    /*protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;*/
    public function ingresar($credenciales)
    {
        //mostrar todo de la bd
        $this->select('*');
        //que el usuario de la bd sea igual al user que traemos del controlador(ctrl_acceso)
        $this->where('usuario',$credenciales['user']);
        $this->where('password',$credenciales['password']);
        //quiero que me devuelva una linea de resultado por eso el first
        $resultado=$this->first();
        return $resultado;
        /*se usa para saber si se reciben los datos del input
        echo "estas son las credenciales";
        //var_dump imprime el arreglo
        var_dump($credenciales);*/
    }
}