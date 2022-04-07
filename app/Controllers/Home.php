<?php
//aqui se define lo primero que se ve en la pagina web que estamos haciendo, el profesor dice que podemos cambiar el controlador que usaremos llendonos a app>Config>Routes.php. Tambien decirte que el nombre del archivo y de la clase deben ser los mismos sino el codigo no te va a correr 
//namespace declara que este archivo es del tipo controlador
namespace App\Controllers;
//la funcion index por default hace que veamos primero el mensaje de bienvenida de codeignater4, pero si la cambiamos por otro archivo que sea .php abrira ese otro, si le pedimos que abra un archivo html debemos llamarlo con .html pero con php no es necesario eso y obviamente los archivcos deben estar en Views
//extends nos permite llamar a otra clase para poder usar sus recursos
class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
